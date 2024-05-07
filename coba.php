<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include_once "fungsi/kelola_kuis.php";
include 'layouts/header.php';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

    <div class="main-wrapper">

        <?php
        include 'layouts/navbar.php';
        include 'layouts/sidebar.php';
        ?>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="page-title mb-0">Lihat Pertanyaan</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="kuis_saya.php"><i class="fas fa-home"></i> Kuisioner saya</a></li>
                                <li class="breadcrumb-item"><span>Lihat Pertanyaan</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="col-md-9 mx-auto">
                        <?php
                        $quiz_id = $_GET['id'];
                        $user_id = $_SESSION['id'];

                        // Mendapatkan daftar pertanyaan
                        $stmt = $con->prepare("SELECT qq.id, qq.quiz_id, qq.question, qq.option1, qq.option2, qq.option3, qq.option4, qq.option5 FROM quiz_and_ques qq WHERE qq.quiz_id = ?");
                        $stmt->bind_param("i", $quiz_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            $question_id = $row['id'];

                            // Mengambil data opsi yang dipilih oleh user untuk pertanyaan tertentu
                            $response_query = "SELECT choosen_option FROM response_table WHERE quiz_id = ? AND question_id = ?";
                            $response_stmt = $con->prepare($response_query);
                            $response_stmt->bind_param("ii", $quiz_id, $question_id);
                            $response_stmt->execute();
                            $response_result = $response_stmt->get_result();

                            // Inisialisasi array untuk menghitung jumlah opsi yang dipilih
                            $option_counts = array(
                                'Option1' => 0,
                                'Option2' => 0,
                                'Option3' => 0,
                                'Option4' => 0,
                                'Option5' => 0
                            );

                            while ($response_row = $response_result->fetch_assoc()) {
                                $chosen_option = $response_row['choosen_option'];
                                if (!empty($chosen_option)) {
                                    $option_counts[$chosen_option]++;
                                }
                            }
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pertanyaan: <?php echo $row['question']; ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <a href="#" data-toggle="modal" data-target="#chartModal<?php echo $question_id; ?>" class="btn btn-info btn-sm mb-1 btn-block">
                                            <i class="fas fa-plus"> Lihat Data</i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal untuk setiap pertanyaan -->
                            <div class="modal custom-modal fade" id="chartModal<?php echo $question_id; ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Data Diagram</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mx-auto" style="width:250px; height:auto">
                                                <canvas id="myChart<?php echo $question_id; ?>"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function showChart<?php echo $question_id; ?>(datavalues) {
                                    const data = {
                                        labels: ['Option1', 'Option2', 'Option3', 'Option4', 'Option5'],
                                        datasets: [{
                                            label: 'Jumlah Opsi Dipilih',
                                            data: datavalues,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)',
                                                'rgb(87, 205, 86)',
                                                'rgb(255, 205, 212)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    };

                                    const config = {
                                        type: 'pie',
                                        data: data,
                                    };

                                    const myChart = new Chart(
                                        document.getElementById('myChart<?php echo $question_id; ?>'),
                                        config
                                    );
                                }

                                document.addEventListener('DOMContentLoaded', function() {
                                    $('#chartModal<?php echo $question_id; ?>').on('shown.bs.modal', function() {
                                        showChart<?php echo $question_id; ?>([<?php echo implode(',', array_values($option_counts)); ?>]);
                                    });
                                });
                            </script>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'layouts/footer.php'; ?>
</body>

</html>
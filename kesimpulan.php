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
                            <h3 class="page-title mb-0">Lihat Pernyataan</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="kuis_saya.php"><i class="fas fa-home"></i> Kuisioner saya</a></li>
                                <li class="breadcrumb-item"><span>Lihat Pernyataan</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="col-md-9 mx-auto">
                        <?php
                        $quiz_id = $_GET['id'];
                        $user_id = $_SESSION['id'];
                        $i = 1;
                        ?>
                        <div class="card">
                            <div class="card-header">

                                <h6 class="card-title text-bold"> Nama Kuisioner :
                                    <?php
                                    // Mengambil nama quiz dari database
                                    $quizNameQuery = "SELECT quiz_name FROM person_and_quiz WHERE id = $quiz_id";
                                    $quizNameResult = mysqli_query($con, $quizNameQuery);
                                    $quizName = mysqli_fetch_assoc($quizNameResult)['quiz_name'];
                                    echo $quizName;
                                    ?>

                                </h6>

                            </div>

                        </div>
                        <?php

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
                            $total_responses = 0;

                            while ($response_row = $response_result->fetch_assoc()) {
                                $chosen_option = $response_row['choosen_option'];
                                if (!empty($chosen_option)) {
                                    $option_counts[$chosen_option]++;
                                    $total_responses++;
                                }
                            }

                            // Menghitung persentase untuk setiap opsi
                            $percentage_values = array();
                            foreach ($option_counts as $option => $count) {
                                $percentage = ($count > 0 && $total_responses > 0) ? round(($count / $total_responses) * 100, 2) : 0;
                                array_push($percentage_values, $percentage);
                            }
                        ?>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $i . '. ' . $row['question']; ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form action="" method="get" class="ml-4">

                                            <div class=" row ">
                                                <div class="col">
                                                    <label>
                                                        Option 1 : <?php echo  $row['option1']; ?> (<?php echo $percentage_values[0]; ?>%)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" row ">
                                                <div class="col">
                                                    <label>
                                                        Option 2 : <?php echo  $row['option2']; ?> (<?php echo $percentage_values[1]; ?>%)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" row ">
                                                <div class="col">
                                                    <label>
                                                        Option 3 : <?php echo  $row['option3']; ?> (<?php echo $percentage_values[2]; ?>%)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" row ">
                                                <div class="col">
                                                    <label>
                                                        Option 4 : <?php echo  $row['option4']; ?> (<?php echo $percentage_values[3]; ?>%)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" row ">
                                                <div class="col">
                                                    <label>
                                                        Option 5 : <?php echo  $row['option5']; ?> (<?php echo $percentage_values[4]; ?>%)
                                                    </label>
                                                </div>
                                            </div>

                                        </form>
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
                                            <div class="mx-auto" style="width:300px; height:auto">
                                                <canvas id="myChart<?php echo $question_id; ?>"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function showChart<?php echo $question_id; ?>(datavalues, percentages) {
                                    const data = {
                                        labels: ['Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 5'],
                                        datasets: [{
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
                                        options: {
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'right',
                                                },
                                                tooltip: {
                                                    callbacks: {
                                                        label: function(context) {
                                                            let label = data.labels[context.dataIndex] || '';
                                                            if (label) {
                                                                label += ': ';
                                                            }
                                                            if (context.parsed) {
                                                                label += percentages[context.dataIndex] + '%';
                                                            }
                                                            return label;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    };

                                    const myChart = new Chart(
                                        document.getElementById('myChart<?php echo $question_id; ?>'),
                                        config
                                    );
                                }

                                document.addEventListener('DOMContentLoaded', function() {
                                    $('#chartModal<?php echo $question_id; ?>').on('shown.bs.modal', function() {
                                        showChart<?php echo $question_id; ?>([<?php echo implode(',', array_values($option_counts)); ?>], [<?php echo implode(',', $percentage_values); ?>]);
                                    });
                                });
                            </script>


                        <?php
                            $i++;
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
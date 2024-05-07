<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include 'layouts/header.php';

//$quiz_id = $_SESSION['quiz_id'];
// $select_query = "select password from person_and_quiz where id=$quiz_id";
// $result = mysqli_query($con, $select_query);
// $row = mysqli_fetch_array($result);
// $nama_kuis = $row['quiz_name'];


?>

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
                            <h3 class="page-title mb-0">Detail Kuisioner</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="menu_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Detail Kuisioner</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-5 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Terima Kasih Telah Menjawab</h4>
                            </div>
                            <div class="card-body">
                                <div class="container">

                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="">Nama Kuisioner :</div>
                                        <div class="btn-warning"><?php
                                                                    // Mengambil nama quiz dari database
                                                                    $quiz_id = $_SESSION['quiz_id']; // Pastikan nilai quiz_id sudah di-set di sesi sebelumnya

                                                                    // Mengambil nama quiz dari database
                                                                    $quizNameQuery = "SELECT quiz_name FROM person_and_quiz WHERE id = $quiz_id";
                                                                    $quizNameResult = mysqli_query($con, $quizNameQuery);

                                                                    if ($quizNameResult) {
                                                                        $quizName = mysqli_fetch_assoc($quizNameResult)['quiz_name'];
                                                                        echo $quizName;
                                                                    } else {
                                                                        // Handle jika query tidak berhasil dieksekusi
                                                                        echo "Error: " . mysqli_error($con);
                                                                    }
                                                                    ?></div>
                                    </div>

                                    </h5>
                                    <div>
                                        <form action="join_kuis.php" method="post">
                                            <button type="submit" name="selesai" class="btn btn-primary btn-block">Selesai</button>
                                            <input type="hidden" name="unset_quiz_id" value="1">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include 'layouts/footer.php'; ?>
</body>

</html>
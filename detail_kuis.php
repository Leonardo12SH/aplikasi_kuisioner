<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include 'layouts/header.php';

$quiz_id = $_SESSION['quiz_id'];

$select_query = "select password from person_and_quiz where id=$quiz_id";
$result = mysqli_query($con, $select_query);
$row = mysqli_fetch_array($result);
$passcode = $row['password'];


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
                                <h4 class="card-title">Berhasil Membuat Kuisioner</h4>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <h5>Kuis Anda telah berhasil dibuat. Bagikan id dan kata sandi kuis di bawah ini untuk bergabung<br><br>

                                        <div class="d-flex justify-content-start">
                                            <div class="d-flex justify-content-start">Quiz id : </div>
                                            <div class="btn-primary ml-3 mb-2"><?php echo $quiz_id; ?></div>
                                        </div>
                                        <div class="d-flex justify-content-start mb-4">
                                            <div class="">Passcode : </div>
                                            <div class="btn-warning"><?php echo "$passcode"; ?></div>
                                        </div>

                                    </h5>
                                    <div>
                                        <a href="menu_kuis.php" class="btn btn-primary btn-block ">Selesai</a>
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
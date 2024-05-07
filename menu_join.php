<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include 'layouts/header.php';
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
                            <h3 class="page-title mb-0">Menu Join Kuisioner</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><span>Join Kuisioner</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-lg-5 col-xl-4 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Join Kuisioner</h4>
                            </div>
                            <div class="card-body">
                                <a href="join_kuis.php" class="text-light">
                                    <button class="btn btn-primary col-12">
                                        <i class="fas fa-plus"></i> Klik
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-xl-4 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Riwayat Join Saya</h4>
                            </div>
                            <div class="card-body">
                                <a href="riwayat_saya.php" class="text-light">
                                    <button class="btn btn-primary col-12">
                                        <i class="fas fa-plus"></i> Klik
                                    </button>
                                </a>

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
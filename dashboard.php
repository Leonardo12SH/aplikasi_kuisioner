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
                            <h3 class="page-title mb-0">Dashboard</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <span class="float-left"><img src="assets/img/dash/dash-1.png" alt="" width="80"></span>
                            <div class="dash-widget-info text-right">
                                <span>Students</span>
                                <h3>60,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <div class="dash-widget-info text-left d-inline-block">
                                <span>Teachers</span>
                                <h3>12,000</h3>
                            </div>
                            <span class="float-right"><img src="assets/img/dash/dash-2.png" width="80" alt=""></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <span class="float-left"><img src="assets/img/dash/dash-3.png" alt="" width="80"></span>
                            <div class="dash-widget-info text-right">
                                <span>Parents</span>
                                <h3>20,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <div class="dash-widget-info d-inline-block text-left">
                                <span>Total Earnings</span>
                                <h3>$20,000</h3>
                            </div>
                            <span class="float-right"><img src="assets/img/dash/dash-4.png" alt="" width="80"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="page-title">
                                            Events
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <div class=" mt-sm-0 mt-2">
                                            <button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="calendar" class=" overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="page-title">
                                            Total Member
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <div class=" mt-sm-0 mt-2">
                                            <button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center overflow-hidden">
                                <div id="chart3"> </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>

    <?php include 'layouts/footer.php'; ?>
</body>

</html>
<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include "fungsi/kelola_kuis.php";
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
                            <h3 class="page-title mb-0">Buat Kuisioner</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="menu_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Buat Kuisioner</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nama Kuisioner</label>
                                        <input type="text" class="form-control" value=" " name="quiz_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Passcode</label>
                                        <input type="text" class="form-control" value="12345" name="passcode">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="buat_kuis">Submit</button>
                                    </div>
                                </form>
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
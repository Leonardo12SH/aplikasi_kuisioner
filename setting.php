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
                            <h3 class="page-title mb-0">Settings</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="col-md-9 mx-auto">
                        <div class="content-page">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Ganti Password</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="fungsi/ubahpass.php" method="post">
                                                <div class="form-group">
                                                    <label>Password lama</label>
                                                    <input type="password" class="form-control" name="old_password" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password baru</label>
                                                    <input type="password" class="form-control" name="new_password" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label>Konfirmasi Password Baru</label>
                                                    <input type="password" class="form-control" name="confirm_new_password" required="true">
                                                </div>
                                                <div class="form-group custom-mt-form-group">
                                                    <button class="btn btn-primary" type="submit" value="Change">Submit</button>
                                                </div>
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
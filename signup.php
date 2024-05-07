<?php
require "fungsi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Preschool - Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/dash/dash-1.png">

    <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title text-white">Sign Up</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <?php
                        if (isset($_SESSION['gagal'])) {
                            echo '<div class="container alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="mx-auto">
                                Email Sudah Terdaftar
                            </div>
                        </div>';
                            unset($_SESSION['gagal']);
                        }

                        ?>
                        <div class="">
                            <div class="row justify-content-center">
                                <div class="col-6 my-auto">
                                    <h4>My Kuisioner <span class="badge table-success">Now</span></h4>
                                </div>
                            </div>

                        </div>
                        <form action="fungsi/signup.php" method="post">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" required="true">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required="true">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required="true">
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="telp" class="form-control" name="contact" required="true">
                            </div>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary btn-block account-btn" type="submit" value="Sign Up">Sign Up</button>
                            </div>
                            <div class="text-center">
                                <a href="index.php">Already have an account?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.slimscroll.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
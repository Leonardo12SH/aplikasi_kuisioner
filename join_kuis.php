<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include 'layouts/header.php';
session_start();

if (isset($_POST['unset_quiz_id'])) {
    unset($_SESSION['quiz_id']);
}

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
                            <h3 class="page-title mb-0">Join Kuisioner</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="menu_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Join Kuisioner</span></li>
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
                                <form action="jawab_kuis.php" method="post">
                                    <div class="form-group">
                                        <label>Masukan Id Kuisioner</label>
                                        <input type="text" class="form-control" value=" " name="quiz_id">
                                    </div>
                                    <div class="form-group">
                                        <label>Masukan Passcode</label>
                                        <input type="text" class="form-control" value="12345" name="password">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
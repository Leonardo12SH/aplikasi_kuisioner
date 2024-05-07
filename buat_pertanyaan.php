<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include_once "fungsi/kelola_kuis.php";
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
                            <h3 class="page-title mb-0">Buat Pertanyaan</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="buat_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Buat Pertanyaan</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-9 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Masukan Pertanyaan</label>
                                        <input type="text" class="form-control" value=" " name="question">
                                    </div>
                                    <?php for ($i = 1; $i <= 5; $i++) {   ?>
                                        <div class="form-group row ">
                                            <label class="col-form-label col-md-2">Pilihan<?php echo " $i"; ?></label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="option[]">
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="row d-flex justify-content-between">
                                        <div class="d-flex justify-content-start ml-3 my-3">
                                            <button type="submit" class="btn btn-primary" name="pertanyaan">Masukan Pertanyaan Lagi</button>
                                        </div>
                                        <div class="d-flex justify-content-end mr-3 my-3">
                                            <button type="submit" class="btn btn-warning" name="pertanyaan_selesai">Selesai</button>
                                        </div>
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
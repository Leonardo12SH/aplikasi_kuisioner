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
                            <h3 class="page-title mb-0">Kelola Pertanyaan</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="kuis_saya.php"><i class="fas fa-home"></i> Kuisioner saya</a></li>
                                <li class="breadcrumb-item"><span>Lihat Pertanyaan</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-9 mx-auto">
                        <?php
                        $quiz_id = $_GET['id'];

                        $user_id = $_SESSION['id'];
                        $i = 0;
                        $select_query = "select * from quiz_and_ques where quiz_id=$quiz_id";
                        $result = mysqli_query($con, $select_query);


                        $select_query2 = "select * from person_and_quiz where id=$quiz_id";
                        $result2 = mysqli_query($con, $select_query2);

                        ?>

                        <?php
                        while ($row = mysqli_fetch_array($result2)) {
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kuisioner</h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label>Nama Kuisioner</label>
                                                <input type="text" class="form-control" value="<?php echo $row['quiz_name'] ?>" name="quiz_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Passcode</label>
                                                <input type="text" class="form-control" value="<?php echo $row['password'] ?>" name="passcode">
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary" name="edit_kuis">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pertanyaan <?php echo $i ?></h4>
                                </div>
                                <div class="card-body">


                                    <div class="container">

                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $row['question']; ?>" name="question">
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-2">Pilihan 1</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="option1" value="<?php echo  $row['option1']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-2">Pilihan 2 </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="option2" value="<?php echo  $row['option2']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-2">Pilihan 3</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="option3" value="<?php echo  $row['option3']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-2">Pilihan 4</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="option4" value="<?php echo  $row['option4']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-2">Pilihan 5</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="option5" value="<?php echo  $row['option5']; ?>">
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-start">
                                                <div class="d-flex justify-content-end mr-3 my-3">
                                                    <button type="submit" class="btn btn-primary" name="edit_pertanyaan">Selesai</button>
                                                </div>
                                                <div class="d-flex justify-content-end mr-3 my-3">
                                                    <button type="submit" class="btn btn-danger" name="hapus_pertanyaan">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
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
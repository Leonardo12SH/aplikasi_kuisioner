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
                            <h3 class="page-title mb-0">Lihat Pertanyaan</h3>
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
                        $i = 1;
                        $select_query = "select * from quiz_and_ques where quiz_id=$quiz_id";
                        $result = mysqli_query($con, $select_query);

                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pertanyaan <?php echo $i ?></h4>
                                </div>
                                <div class="card-body">


                                    <div class="container">

                                        <p>
                                            <?php echo $row['question']; ?>
                                        </p>

                                        <form action="" method="get" class="ml-4">

                                            <div class="radio">
                                                <label class="row">
                                                    <input type="radio" name="radio" class="mr-2"><?php echo  $row['option1']; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="row">
                                                    <input type="radio" name="radio" class="mr-2"><?php echo  $row['option2']; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="row">
                                                    <input type="radio" name="radio" class="mr-2"><?php echo  $row['option3']; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="row">
                                                    <input type="radio" name="radio" class="mr-2"><?php echo  $row['option4']; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="row">
                                                    <input type="radio" name="radio" class="mr-2"><?php echo  $row['option5']; ?>
                                                </label>
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
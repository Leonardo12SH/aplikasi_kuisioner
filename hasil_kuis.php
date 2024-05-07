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
                            <h3 class="page-title mb-0">Kuisioner Saya</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="menu_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Kuisioner Saya</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                $quiz_id = $_GET['quiz_id'];
                $responser_id = $_GET['id'];
                $i = 1;
                $incorrect_ans = 0;
                $not_attempted = 0;
                $select_query = "select * from quiz_and_ques where quiz_id=$quiz_id";
                $result = mysqli_query($con, $select_query);
                $total_ques = mysqli_num_rows($result);


                if (mysqli_num_rows($result) == 0) {
                    echo "<script>alert('No question found to the corresponding quiz');
                                 location.href='myquiz.php';
                                   </script>";
                } else {
                ?>

                    <div class="row">


                        <div class="col-sm-10 mx-auto">
                            <div class="card">
                                <div class="card-header">

                                    <h6 class="card-title text-bold"> Nama Responen :
                                        <?php
                                        $response_id = $_GET['id'];
                                        $q = "SELECT * FROM users WHERE id=$response_id";
                                        $q_result = mysqli_query($con, $q);
                                        $row_user = mysqli_fetch_array($q_result);
                                        $person = $row_user['name'];
                                        echo $person;
                                        ?>

                                    </h6>

                                </div>
                                <div class="card-body">
                                    <h6 class=""> Nama Kuisioner :
                                        <?php
                                        // Mengambil nama quiz dari database
                                        $quizNameQuery = "SELECT quiz_name FROM person_and_quiz WHERE id = $quiz_id";
                                        $quizNameResult = mysqli_query($con, $quizNameQuery);
                                        $quizName = mysqli_fetch_assoc($quizNameResult)['quiz_name'];
                                        echo $quizName;
                                        ?></h6>
                                </div>
                            </div>
                            <?php while ($row = mysqli_fetch_array($result)) {
                                $question_id = $row['id'];
                                $q_select = "select choosen_option from response_table where quiz_id=$quiz_id and person_id=$responser_id and question_id=$question_id ";
                                $q_select_result = mysqli_query($con, $q_select);
                                $q_row = mysqli_fetch_array($q_select_result);
                                if (mysqli_num_rows($q_select_result) == 0) {
                                    $not_attempted++;
                                }
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title text-bold"><?php echo $i . ". " . $row['question']; ?></h6>
                                    </div>

                                    <div class="card-body">
                                        <form action="fungsi/buat_kuis.php" method="post">
                                            <div class="col-md-10">

                                                <div class=" row ">
                                                    <div class="col ml-3">
                                                        <label>
                                                            Option1 : <?php echo  $row['option1']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class=" row ">
                                                    <div class="col ml-3">
                                                        <label>
                                                            Option2 : <?php echo  $row['option2']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class=" row ">
                                                    <div class="col ml-3">
                                                        <label>
                                                            Option3 : <?php echo  $row['option3']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class=" row ">
                                                    <div class="col ml-3">
                                                        <label>
                                                            Option4 : <?php echo  $row['option4']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class=" row ">
                                                    <div class="col ml-3">
                                                        <label>
                                                            Option5 : <?php echo  $row['option5']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-warning m-3">
                                                    <div class="">
                                                        Pilihan : <?php echo  $q_row['choosen_option'];

                                                                    ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                        <?php
                                $chosen_option = $q_row['choosen_option'];
                                $corr_option = $row['corr_ans'];
                                if (strcmp($chosen_option, $corr_option) !== 0 && mysqli_num_rows($q_select_result) !== 0) {
                                    $incorrect_ans++;
                                }
                                $i++;
                            }
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
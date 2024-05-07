<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include 'layouts/header.php';
error_reporting(0);
ini_set('display_errors', 0);
session_start();

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
                            <h3 class="page-title mb-0">Jawab Kuisioner</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><span>Jawab Kuisioner</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION['quiz_id'])) {
                    $quiz_id = $_POST['quiz_id'];
                } else {
                    $quiz_id = $_SESSION['quiz_id'];
                }
                if (!isset($_SESSION['password1'])) {
                    $password = $_POST['password'];
                } else {
                    $password = $_SESSION['password1'];
                }
                $user_id = $_SESSION['id'];
                $verification_query = "select password from person_and_quiz where id=$quiz_id";
                $verification_result = mysqli_query($con, $verification_query);
                $obtained_password = mysqli_fetch_array($verification_result);
                $obtained_password = $obtained_password['password'];
                if (mysqli_num_rows($verification_result) == 0) {
                    echo "<script>alert('Wrong quiz id ');
                    location.href='join_kuis.php';
                    </script>";
                } else {
                    if (strcmp($password, $obtained_password) !== 0) {
                        echo "<script>alert('Wrong password');
                        location.href='join_kuis.php';
                        </script>";
                    }
                }
                $select_response = "select * from person_and_response where quiz_id=$quiz_id and person_id=$user_id";
                $select_response_result = mysqli_query($con, $select_response);
                $row = mysqli_fetch_array($select_response_result);
                $status = $row['status'];
                if (mysqli_num_rows($select_response_result) == 0) {
                    $insert_query = "insert into person_and_response (person_id,quiz_id,status) values($user_id,$quiz_id,'not_submitted')";
                    mysqli_query($con, $insert_query) or die(mysqli_error($con));
                } else {
                    if (strcmp($status, "submitted") == 0) {
                        echo "<script>alert('You have already responded to this quiz ');
                        location.href='join_kuis.php';
                        </script>";
                    }
                }

                $select_query = "select * from quiz_and_ques where quiz_id=$quiz_id";
                $result = mysqli_query($con, $select_query);
                if (mysqli_num_rows($result) == 0) {
                    echo "<script>
                    alert('No question found to the corresponding quiz');
                    location.href = 'join_kuis.php';
                </script>";
                } else {


                ?>
                    <div class="row">
                        <div class="col-sm-10 mx-auto">

                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h6 class="card-title text-white">Kuisioner :
                                        <?php
                                        // Mengambil nama quiz dari database
                                        $quizNameQuery = "SELECT quiz_name FROM person_and_quiz WHERE id = $quiz_id";
                                        $quizNameResult = mysqli_query($con, $quizNameQuery);
                                        $quizName = mysqli_fetch_assoc($quizNameResult)['quiz_name'];
                                        echo $quizName;
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10 mx-auto">

                            <?php
                            // Mendapatkan nomor pertanyaan dari URL jika ada, jika tidak, set ke 1
                            $questionNumber = isset($_GET['question_number']) ? $_GET['question_number'] : 1;

                            // Memeriksa pertanyaan yang sesuai dengan nomor yang diminta
                            mysqli_data_seek($result, $questionNumber - 1);
                            $row = mysqli_fetch_array($result);
                            $questionId = $row['id'];

                            // Jika pertanyaan ditemukan, tampilkan
                            if ($row) {
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title "><?php echo $questionNumber . ". " . $row['question']; ?>
                                        </h6>
                                    </div>


                                    <div class="card-body mx-3">
                                        <form action="fungsi/save_pertanyaan.php?quiz_id=<?php echo $row['quiz_id']; ?>&question_id=<?php echo $row['id']; ?>&password=<?php echo "$password"; ?>&question_number=<?php echo $questionNumber; ?>" method="post">
                                            <input type="hidden" name="question_number" value="<?php echo $questionNumber; ?>">
                                            <div class="col-md-10">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="option" name="choosen_option" value="Option1" required="true">
                                                        <?php echo  $row['option1']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="option" name="choosen_option" value="Option2" required="true">
                                                        <?php echo  $row['option2']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="option" name="choosen_option" value="Option3" required="true">
                                                        <?php echo  $row['option3']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="option" name="choosen_option" value="Option4" required="true">
                                                        <?php echo  $row['option4']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="option" name="choosen_option" value="Option5" required="true">
                                                        <?php echo  $row['option5']; ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php
                                            $question_id = $row['id'];
                                            $select_response_id = "select id from response_table where quiz_id=$quiz_id and person_id=$user_id and question_id=$question_id";

                                            $select_response_id_result = mysqli_query($con, $select_response_id);
                                            if (mysqli_num_rows($select_response_id_result) !== 0) {
                                                echo '<input type="submit" class="btn btn-info mt-2" value="Tersimpan" disabled />';
                                            } else {
                                                echo '<input type="submit" class="btn btn-success mt-2" value="Simpan" />';
                                            }
                                            ?>
                                        </form>

                                    </div>


                                </div>
                                <div class="card">
                                    <div class="card-headers">
                                        <?php
                                        $nextQuestionNumber = $questionNumber + 1;
                                        mysqli_data_seek($result, $nextQuestionNumber - 1);
                                        $nextRow = mysqli_fetch_array($result);

                                        if ($nextRow) {
                                            echo "<a href='jawab_kuis.php?quiz_id=$quiz_id&question_number=$nextQuestionNumber' class='btn btn-info btn-block'>Pertanyaan Berikutnya</a>";
                                        } else {
                                            echo "<a href='fungsi/submit_pertanyaan.php?quiz_id=$quiz_id' class='btn btn-info btn-block'>Submit Respon Saya</a>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            } else {
                                echo "<script>alert('Pertanyaan tidak ditemukan.');
                                location.href='join_kuis.php';
                                </script>";
                            }
                            ?>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    </div>
    <?php include 'layouts/footer.php'; ?>


<?php } ?>
</div>
</div>


</body>

</html>
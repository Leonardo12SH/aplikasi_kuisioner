<?php
require "koneksi.php";

if (isset($_POST['buat_kuis'])) {

    $user_id = $_SESSION['id'];
    $quiz_name = $_POST['quiz_name'];
    $passcode = $_POST['passcode'];

    $insert = "insert into person_and_quiz (person_id,quiz_name,password) values ($user_id,'$quiz_name','$passcode')";
    mysqli_query($con, $insert) or die(mysqli_error($con));

    $quiz_id = mysqli_insert_id($con) or die(mysqli_error($con));
    $_SESSION['quiz_id'] = $quiz_id;

    header('location: buat_pertanyaan.php');
};

if (isset($_POST['pertanyaan'])) {

    $question = $_POST['question'];
    $option = array($_POST['option']);
    $option1 = $option[0][0];
    $option2 = $option[0][1];
    $option3 = $option[0][2];
    $option4 = $option[0][3];
    $option5 = $option[0][4];
    $quiz_id = $_SESSION['quiz_id'];

    $insert = "insert into quiz_and_ques (quiz_id,question,option1,option2,option3,option4,option5) values ($quiz_id,'$question','$option1','$option2','$option3','$option4','$option5')";
    mysqli_query($con, $insert) or die(mysqli_error($con));
    header('location:buat_pertanyaan.php');
};

if (isset($_POST['pertanyaan_selesai'])) {

    $question = $_POST['question'];
    $option = array($_POST['option']);
    $option1 = $option[0][0];
    $option2 = $option[0][1];
    $option3 = $option[0][2];
    $option4 = $option[0][3];
    $option5 = $option[0][4];
    $quiz_id = $_SESSION['quiz_id'];

    $insert = "insert into quiz_and_ques (quiz_id,question,option1,option2,option3,option4,option5) values ($quiz_id,'$question','$option1','$option2','$option3','$option4','$option5')";
    mysqli_query($con, $insert) or die(mysqli_error($con));
    header('location:detail_kuis.php');
};

if (isset($_GET['hapus'])) {
    $user_id = $_GET['hapus'];

    // Hapus data dari tabel 'quiz_and_ques'
    $hapus_quiz_data = mysqli_query($con, "DELETE FROM quiz_and_ques WHERE id = '$user_id'");

    // Hapus data dari tabel 'person_and_quiz'
    $hapus_person_data = mysqli_query($con, "DELETE FROM person_and_quiz WHERE id = '$user_id'");

    if ($hapus_quiz_data && $hapus_person_data) {
        echo '<script>history.go(-1);</script>';
    } else {
        echo '<script>alert("Gagal Hapus Data Produk");history.go(-1);</script>';
    }
    header('location: kuis_saya.php');
};


if (isset($_POST['edit_kuis'])) {
    $quiz_id = $_GET['id'];
    $user_id = $_SESSION['id'];
    $nama_kuis = htmlspecialchars($_POST['quiz_name']);
    $passcode = htmlspecialchars($_POST['passcode']);
    $select_query2 = "select * from person_and_quiz where id=$quiz_id";
    $result2 = mysqli_query($con, $select_query2);


    $cekDataUpdate =  mysqli_query($con, "UPDATE person_and_quiz SET quiz_name='$nama_kuis',password='$passcode' WHERE id='$quiz_id'") or die(mysqli_connect_error());
    if ($cekDataUpdate) {
        echo '<script>history.go(-1);</script>';
    } else {
        echo '<script>alert("Gagal Edit Data Produk");history.go(-1);</script>';
    }
};

if (isset($_POST['edit_pertanyaan'])) {
    $quiz_id = htmlspecialchars($_POST['id']);
    $pertanyaan = htmlspecialchars($_POST['question']);
    $option1 = htmlspecialchars($_POST['option1']);
    $option2 = htmlspecialchars($_POST['option2']);
    $option3 = htmlspecialchars($_POST['option3']);
    $option4 = htmlspecialchars($_POST['option4']);
    $option5 = htmlspecialchars($_POST['option5']);
    $select_query = "select * from quiz_and_ques where id=$quiz_id";
    $result = mysqli_query($con, $select_query);


    $cekDataUpdate =  mysqli_query($con, "UPDATE quiz_and_ques SET question = '$pertanyaan', option1 = '$option1', option2 = '$option2', option3 = '$option3', option4 = '$option4', option5 = '$option5' WHERE quiz_and_ques.id = '$quiz_id'") or die(mysqli_connect_error());
    // if ($cekDataUpdate) {
    //     echo '<script>history.go(-1);</script>';
    // } else {
    //     echo '<script>alert("Gagal Edit Data Produk");history.go(-1);</script>';
    // }
};

if (isset($_POST['hapus_pertanyaan'])) {
    $quiz_id = htmlspecialchars($_POST['id']);

    $select_query = "DELETE FROM quiz_and_ques WHERE quiz_and_ques.id = '$quiz_id'";
    $result = mysqli_query($con, $select_query);

    // if ($cekDataUpdate) {
    //     echo '<script>history.go(-1);</script>';
    // } else {
    //     echo '<script>alert("Gagal Edit Data Produk");history.go(-1);</script>';
    // }
};
if (isset($_GET['hapus_responden'])) {
    $responden_id = $_GET['hapus_responden'];
    $quiz_id = $_GET['quiz_id'];

    $query_respon = "SELECT * FROM `response_table`;";
    $respon_result = mysqli_query($con, $query_respon);

    $delete_query = "DELETE FROM person_and_response WHERE person_id = '$responden_id' AND quiz_id = '$quiz_id'";
    $delete_result = mysqli_query($con, $delete_query);

    $delete_respon = "DELETE FROM response_table WHERE person_id = '$responden_id' AND quiz_id = '$quiz_id'";
    $delete_result_respon = mysqli_query($con, $delete_respon);


    if ($delete_result) {
        echo '<script>alert("Data responden berhasil dihapus");</script>';
    } else {
        echo '<script>alert("Gagal menghapus data responden");</script>';
    }
    header('location: data_responden.php?id=' . $quiz_id); // Mengarahkan kembali ke halaman data_responden.php
}

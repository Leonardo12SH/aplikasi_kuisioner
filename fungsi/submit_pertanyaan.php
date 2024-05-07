<?php
require "koneksi.php";

session_start();
$user_id = $_SESSION['id'];
$quiz_id = $_GET['quiz_id'];
$update_query = "UPDATE person_and_response SET status='submitted' WHERE person_id=$user_id and quiz_id=$quiz_id";
mysqli_query($con, $update_query);
echo "<script>alert('Terima kasih telah menjawab kuisioner ini');
      location.href='../selesai_jawab.php'; 
      </script>";

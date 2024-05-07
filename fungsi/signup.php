<?php
require "koneksi.php";

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = $_POST['contact'];
$password = md5(mysqli_real_escape_string($con, $_POST['password']));

// Buat query untuk memeriksa apakah alamat email sudah ada dalam database
$select_query = "SELECT id FROM users WHERE email = '$email'";
$select_query_result = mysqli_query($con, $select_query);

if (mysqli_num_rows($select_query_result) > 0) {
    // Jika alamat email sudah ada, tampilkan pesan kesalahan
    $_SESSION['gagal'] = true;
    header('location: ../signup.php');
} else {
    // Jika alamat email belum ada, lakukan pendaftaran
    $insert = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
    $insert_result = mysqli_query($con, $insert);
    header('location: ../index.php');
}

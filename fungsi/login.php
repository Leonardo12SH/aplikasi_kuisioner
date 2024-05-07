<?php
require "koneksi.php";
session_start();

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = md5(mysqli_real_escape_string($con, $_POST['password']));

$select_query = "select id,email from users where email='$email' and password='$password'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

if (mysqli_num_rows($select_query_result) == 0) {
    $_SESSION['gagal'] = true;
    header('location: ../index.php');
} else {
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $row = mysqli_fetch_array($select_query_result);
    $_SESSION['id'] = $row['id'];
    $user = $_SESSION['id'];
    $_SESSION['log'] = "login";
    header('location: ../menu_kuis.php');
}

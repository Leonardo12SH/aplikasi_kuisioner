<?php
require "koneksi.php";
require "cek-akses.php";

$newpassword = mysqli_real_escape_string($con, $_POST['new_password']);
$oldpassword = mysqli_real_escape_string($con, $_POST['old_password']);
$confirm_new_password = mysqli_real_escape_string($con, $_POST['confirm_new_password']);

if (strcmp($newpassword, $confirm_new_password) !== 0) {
    echo "<script>alert('Konfirmasi Password Salah');
	         location.href='../setting.php';
			 </script>";
} else {
    $user_id = $_SESSION['id'];
    $q2 = "select password from users where id=$user_id";
    $org_password = mysqli_query($con, $q2);
    $row = mysqli_fetch_array($org_password);
    $orgpassword = $row['password'];
    $b = md5($newpassword);
    if (md5($oldpassword) == $orgpassword) {
        $q = "UPDATE users SET password='$b' WHERE id=$user_id";
        mysqli_query($con, $q) or die(mysqli_error($con));
        echo "<script>alert('Password berhasil diubah');
              location.href='../setting.php';
              </script>";
    } else {
        echo "<script>alert('Salah Memasukan Password Lama');
	         location.href='../setting.php';
			 </script>";
    }
}

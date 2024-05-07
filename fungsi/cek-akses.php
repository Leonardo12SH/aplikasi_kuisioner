<?php
session_start();
if ($_SESSION['log'] != "login") {
    header("location:index.php");
}

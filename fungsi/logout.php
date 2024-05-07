<?php
require "koneksi.php";

// Mulai sesi (jika belum dimulai)
session_start();

// Menghapus semua variabel sesi
session_unset();

// Menghapus sesi dari server
session_destroy();

header('location:../index.php');

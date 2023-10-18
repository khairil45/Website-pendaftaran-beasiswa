<?php 
// Koneksi database
include '../config/koneksi.php';

// Menangkap data dari form register
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "INSERT INTO users VALUES('','$nama','$username','$password', 'user')");

// Mengalihkan ke halaman login
header("Location:login.php");
?>
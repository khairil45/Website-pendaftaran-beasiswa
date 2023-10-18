<?php 
// Koneksi database
include '../config/koneksi.php';
$id = $_GET['id'];

// Hapus data dari database
mysqli_query($koneksi, "DELETE FROM register WHERE id='$id'");

// Mengalihkan halaman ke halaman hasil
header("Location:../view/hasil.php");
?>
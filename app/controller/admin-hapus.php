<?php 
// Koneksi database
include '../config/koneksi.php';
$id = $_GET['id'];

// Ambil status awal dan kriteria dari database
$query    = mysqli_query($koneksi, "SELECT beasiswa FROM register WHERE id='$id'");
$kriteria = mysqli_fetch_assoc($query)['beasiswa'];

// Hapus data dari database
mysqli_query($koneksi, "DELETE FROM register WHERE id='$id'");

// Tentukan halaman tujuan berdasarkan status dan kriteria
if ($kriteria === 'Akademik') {
    header("Location:../admin/admin.php?akademik");
} else {
    header("Location:../admin/admin.php?non-akademik");
}
?>
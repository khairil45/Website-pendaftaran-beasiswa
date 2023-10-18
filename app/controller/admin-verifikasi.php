<?php
// Koneksi database
include '../config/koneksi.php';

// Menangkap data dari form verifikasi
$approve = $_POST['approve'];

// Ambil status awal dan kriteria dari database
$query      = mysqli_query($koneksi, "SELECT beasiswa, status FROM register WHERE id='$approve'");
$data       = mysqli_fetch_assoc($query);
$kriteria   = $data['beasiswa'];
$statusAwal = $data['status'];

// Update status ke 'sudah diverifikasi'
mysqli_query($koneksi, "UPDATE register SET status='sudah diverifikasi' WHERE id='$approve'");

// Tentukan halaman tujuan berdasarkan status dan kriteria
if ($statusAwal === 'belum diverifikasi' && $kriteria === 'Akademik') {
    header("Location:../admin/admin.php?akademik");
} else {
    header("Location:../admin/admin.php?non-akademik");
}
?>

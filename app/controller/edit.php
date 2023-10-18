<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

// Koneksi database
include '../config/koneksi.php';

$user_id = $_SESSION['user_id'];
// Menangkap data dari form pendaftaran
$id       = $_POST['id'];
$nama     = $_POST['nama'];
$email    = $_POST['email'];
$nomor_hp = $_POST['nomor_hp'];
$semester = $_POST['semester'];
$ipk      = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$status   = 'belum diverifikasi';

// query update 
$query = "UPDATE register SET user_id = '$user_id', nama = '$nama', email = '$email', nomor_hp = '$nomor_hp', semester = '$semester', ipk = '$ipk', beasiswa = '$beasiswa', status = '$status' WHERE id = $id";
$input = mysqli_query($koneksi, $query);

if ($input === TRUE) {
    header('Location:../view/hasil.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_connect_error();
}
?>

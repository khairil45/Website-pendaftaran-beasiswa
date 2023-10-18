<?php 
// Mengaktifkan session pada php
session_start();

// Koneksi database
include '../config/koneksi.php';

// Menangkap data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// Menyeleksi data user dengan username dan password yang sesuai
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

// Cek level user
if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['level'] = $user['level'];
	
	if ($user['level'] == 'admin') {
		header("Location:../admin/admin.php?dashboard?admin");
	} else if ($user['level'] == 'user') {
		header("Location:../view/form.php?berhasil");
	}
} else {
    // Mengalihkan halaman ke halaman login
	header("Location:login.php?pesan=gagal");
}
?>
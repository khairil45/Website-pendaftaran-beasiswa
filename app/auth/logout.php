<?php 
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();

// Mengalihkan halaman ke halaman login
header("Location:login.php?pesan=berhasil");
?>
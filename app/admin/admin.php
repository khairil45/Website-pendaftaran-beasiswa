<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location:../auth/login.php");
    exit;
}

// Koneksi database
include '../config/koneksi.php';

// Ambil nama pengguna dari database
$user_id = $_SESSION['user_id'];

$username = mysqli_query($koneksi, "SELECT username FROM users WHERE id='$user_id'");
if (mysqli_num_rows($username) == 1) {
    $user = mysqli_fetch_assoc($username);
    $username = $user['username'];
} else {
    $username = "Nama Pengguna Tidak Ditemukan";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark vh-100">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid flex-column">
                    <h2 class="text-center text-secondary border-bottom pb-3 w-100">Beasiswa</h2>
                    <div class="collapse navbar-collapse w-100" id="navbarNav">
                        <ul class="navbar-nav pt-2 flex-column w-100">
                            <li class="nav-item mb-2">
                                <a class="nav-link ps-5" href="admin.php?dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link ps-5" href="admin.php?foto">Mahasiswa</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-light bg-secondary ps-5" href="#">Pilihan Beasiswa</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link ps-5" href="admin.php?akademik">Akademik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-5" href="admin.php?non-akademik">Non Akademik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-5" href="admin.php?laporan">Laporan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Content -->
        <div class="col-md-10">
            <!-- Logout -->
            <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-2 bg-body">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item me-4 text-secondary d-flex align-items-center">
                                <i class="fa-solid fa-user fs-4"></i>
                                <h4 class="ms-2 fw-normal"><?= $username; ?></h4>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 text-light btn btn-secondary" href="../auth/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container p-3">
                <?php 
                if (isset($_GET['dashboard'])) {
                    include "dashboard.php";
                } else if (isset($_GET['foto'])) {
                    include "foto.php";
                } else if(isset($_GET['akademik'])) {
                    include "akademik.php";
                } else if(isset($_GET['non-akademik'])) {
                    include "non-akademik.php";
                } else if(isset($_GET['laporan'])) {
                    include "laporan.php";
                } else {
                    include "dashboard.php";
                }
                ?>
            </div>

            <!-- Footer -->
            <footer class="fixed-bottom bg-light" style="padding: 10px 0px 10px 230px; z-index:-999;">copyright &copy; 2023 Khairil Candra</footer>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
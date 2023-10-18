<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location:../auth/login.php");
    exit;
}

// Koneksi database
include '../config/koneksi.php';

$user_id = $_SESSION['user_id'];

// Ambil nama pengguna dari database
$username = mysqli_query($koneksi, "SELECT username FROM users WHERE id='$user_id'");
if (mysqli_num_rows($username) == 1) {
    $user = mysqli_fetch_assoc($username);
    $username = $user['username'];
} else {
    $username = "Nama Pengguna Tidak Ditemukan";
}

// Alert
if (isset($_GET['berhasil'])) {
    echo "<script>alert('Jangan tunggu hebat untuk memulai!')</script>";
} else if (isset($_GET['terdaftar'])) {
    echo "<script>alert('Anda sudah mendaftar')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-2 bg-body">
        <div class="container-fluid">
        <h2 class="text-uppercase">beasiswa unggulan</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-5">
                        <a class="nav-link" href="hasil.php">HASIL</a>
                    </li>
                    <li class="nav-item text-secondary d-flex align-items-center">
                        <i class="fa-solid fa-user fs-5"></i>
                        <h5 class="ms-2 fw-normal"><?= $username; ?></h5>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="btn btn-secondary" href="../auth/logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="pt-2 ps-2 pe-2">
        <form class="bg-light pt-2 pb-2 ps-5 pe-5 rounded" action="../controller/tambah.php" method="post" enctype="multipart/form-data"> 
            <div class="d-flex justify-content-center align-items-center mb-2">
                <i class="fa-sharp fa-solid fa-graduation-cap text-secondary fs-1"></i>
                <h1 class="text-center ms-4">Daftar Beasiswa</h1>
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-1">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="contoh@gmail.com" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-1">
                            <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="08.." required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-1">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-control" id="semester" name="semester">
                                <!-- Menggunakan loop untuk membuat opsi semester 1-8 -->
                                <script>
                                    for (let i = 1; i <= 8; i++) {
                                        document.write(`<option value="${i}">${i}</option>`);
                                    }
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-1">
                            <label for="ipk" class="form-label">IPK</label>
                            <input type="text" class="form-control" id="ipk" name="ipk" readonly>
                            <div class="form-text">Minimal ipk mahasiswa yang dapat mendaftar beasiswa</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-1">
                            <label for="beasiswa" class="form-label">Pilihan Beasiswa</label>
                            <select class="form-control" id="beasiswa" name="beasiswa">
                                <option>Akademik</option>
                                <option>Non Akademik</option>                        
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-1">
                            <label for="foto" class="form-label">Upload Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <div class="form-text text-danger">Ekstensi yang digunakan : jpg, jpeg, png</div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-left:1100px;">Daftar</button>
        </form>
    </div>

    <!-- Script value ipk -->
    <script src="js/value-ipk.js"></script>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
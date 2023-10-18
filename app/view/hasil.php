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
$level = $_SESSION['level'];

// Ambil nama pengguna dari database
$username = mysqli_query($koneksi, "SELECT username FROM users WHERE id='$user_id'");
if (mysqli_num_rows($username) == 1) {
    $user = mysqli_fetch_assoc($username);
    $username = $user['username'];
} else {
    $username = "Nama Pengguna Tidak Ditemukan";
}

$query = "SELECT * FROM register WHERE user_id=$user_id";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>

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
                        <a class="nav-link" href="form.php">FORM</a>
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
    <div class="container p-5">

        <?php while ($i = mysqli_fetch_assoc($result)) :?> 
        <div class="row g-0 bg-light mt-3 pt-3 pb-3 ps-5 pe-5">
            <div class="d-flex justify-content-center align-items-center mb-5">
                <i class="fa-sharp fa-solid fa-graduation-cap text-secondary fs-1"></i>
                <h1 class="text-center ms-4">Data Diri Mahasiswa</h1>
            </div>
            <div class="col-md-9">
                <div class="row g-0">
                    <div class="col-md-4">
                        <h4>Nama</h4>
                        <h5 class="fw-normal"><?= $i['nama']; ?></h5>
                    </div>
                    <div class="col-md-4">
                        <h4>Alamat Email</h4>
                        <h5 class="fw-normal"><?= $i['email']; ?></h5>
                    </div>
                    <div class="col-md-4">
                        <h4>Nomor Handphone</h4>
                        <h5 class="fw-normal"><?= $i['nomor_hp']; ?></h5>
                    </div>                    
                </div>
                <div class="row g-0 mt-3">
                    <div class="col-md-4">
                        <h4>Semester</h4>
                        <h5 class="fw-normal"><?= $i['semester']; ?></h5>
                    </div>
                    <div class="col-md-4">
                        <h4>IPK</h4>
                        <h5 class="fw-normal"><?= $i['ipk']; ?></h5>
                    </div>
                    <div class="col-md-4">
                        <h4>Pilihan Beasiswa</h4>
                        <h5 class="fw-normal"><?= $i['beasiswa']; ?></h5>
                    </div>                    
                </div>
                <div class="row g-0 mt-5 d-flex align-items-center">
                    <div class="col-md-3">
                        <a href="form-edit.php?id=<?= $i['id']; ?>" class="btn btn-outline-primary d-flex justify-content-around align-items-center" style="transition:.6s">
                            <i class="fa-solid fa-pen-to-square fs-4"></i>
                            <h6 class="fw-normal mt-2">Edit data</h6>
                        </a>
                    </div>   
                    <div class="col-md-3 ps-2">
                        <a href="../controller/hapus.php?id=<?= $i['id']; ?>" class="btn btn-outline-danger d-flex justify-content-around align-items-center" style="transition:.6s" onclick="return confirm('Anda yakin ingin membatalkan pendaftaran')">
                            <i class="fa-solid fa-square-xmark fs-4"></i>
                            <h6 class="fw-normal mt-2">Batal mendaftar</h6>
                        </a>
                    </div>    
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <?php 
                        $status = $i['status'];

                        if ($status === 'sudah diverifikasi') {
                            $x = 'text-success';
                        } else {
                            $x = 'text-danger';
                        }
                        ?>
                        <h5 class="fw-normal">Status pendaftaran :<br> <span class="<?= $x ?>"><?= $i['status']; ?></span></h5>
                    </div> 
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="text-center mb-2">Foto Profil</div>
                <img src="<?= '../upload/'. $i['foto']; ?>" class="border p-2 w-100" alt="profil">
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
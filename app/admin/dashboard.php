<?php
// Koneksi database
include '../config/koneksi.php';

$result1 = mysqli_query($koneksi, "SELECT * FROM register");
$total   = mysqli_num_rows($result1);

$result2 = mysqli_query($koneksi, "SELECT * FROM register WHERE beasiswa = 'Akademik'");
$akademik   = mysqli_num_rows($result2);

$result3 = mysqli_query($koneksi, "SELECT * FROM register WHERE beasiswa = 'Non Akademik'");
$non_akademik   = mysqli_num_rows($result3);
?>


<div class="container">
    <h2 class="mb-4">Dashboard</h2>
    <div class="row g-2">
        <div class="col-md-3">
            <div class="p-3 border bg-light">
                <h3 class="text-center">Total Mahasiswa</h3>
                <h5 class="text-center fw-normal"><?= $total; ?></h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 border bg-light">
                <h3 class="text-center">Akademik</h3>
                <h5 class="text-center fw-normal"><?= $akademik; ?></h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 border bg-light">
                <h3 class="text-center">Non Akademik</h3>
                <h5 class="text-center fw-normal"><?= $non_akademik; ?></h5>
            </div>
        </div>
    </div>
</div>
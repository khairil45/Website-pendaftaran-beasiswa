<?php
// Koneksi database
include '../config/koneksi.php';

$result = mysqli_query($koneksi, "SELECT nama, foto FROM register");
?>


<div class="container">
    <h2 class="mb-4">Mahasiswa Penerima Beasiswa</h2>

    <!-- Search -->
    <nav class="navbar navbar-expand-lg navbar-light bg-none">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="d-flex" action="admin.php?akademik" method="post">
                            <input class="form-control me-2" type="text" name="cari" placeholder="nama mahasiswa" aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Cari</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="row g-0 mt-2">
        <?php while ($i = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-2">
            <div class="card" style="width: 10rem;">
                <img src="<?= '../upload/'. $i['foto']; ?>" class="card-img-top p-3" alt="Mahasiswa">
                <div class="card-body border-top">
                    <h5 class="card-text text-center fw-normal"><?= $i['nama']; ?></h5>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
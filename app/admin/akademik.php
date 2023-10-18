<?php
// Koneksi database
include '../config/koneksi.php';
?>

<div class="container">
    <h2 class="mb-4">Akademik</h2>
    <!-- Search -->
    <nav class="navbar navbar-expand-lg navbar-light bg-none">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="d-flex" action="admin.php?akademik" method="post">
                            <input class="form-control me-2" type="text" name="cari" placeholder="Cari : nama, semester, IPK" aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Cari</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $batas = 2;
    $halaman = isset($_GET['akademik'])?(int)$_GET['akademik'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $data = mysqli_query($koneksi,"SELECT * FROM register");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    $nomor = $halaman_awal+1;

    if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$query = "SELECT * FROM register WHERE (nama LIKE '%".$cari."%' OR semester LIKE '%".$cari."%' OR ipk LIKE '%".$cari."%') AND beasiswa = 'Akademik' LIMIT $halaman_awal, $batas";				
	} else{
		$query = "SELECT * FROM register WHERE beasiswa = 'Akademik' LIMIT $halaman_awal, $batas";		
	}

    $result = mysqli_query($koneksi, $query);
    ?>

    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Semester</th>
                <th scope="col">IPK</th>
                <th scope="col">Beasiswa</th>
                <th scope="col">Status</th>
                <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            while ($i = mysqli_fetch_assoc($result)) : 
            ?>
            <tr class="text-center">
                <th scope="row"><?= $nomor++; ?></th>
                <td><?= $i['nama']; ?></td>
                <td><?= $i['email']; ?></td>
                <td><?= $i['nomor_hp']; ?></td>
                <td><?= $i['semester']; ?></td>
                <td><?= $i['ipk']; ?></td>
                <td><?= $i['beasiswa']; ?></td>
                <td><?= $i['status']; ?></td>
                <td class="d-flex justify-content-center">
                    <form action="../controller/admin-verifikasi.php" method="post">
                        <input type="hidden" name="approve" id="approve" value="<?php echo $i['id'] ?>">
                        <button type="submit" class="border-0 bg-body">
                            <i class="fa-solid fa-square-check text-success fs-3"></i>
                        </button>
                    </form>
                    <a href="../controller/admin-hapus.php?id=<?= $i['id']; ?>" onclick="return confirm('Hapus data?');"><i class="fa-solid fa-square-xmark text-danger fs-3"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav class="navbar navbar-expand-lg navbar-light bg-none">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="page-item">
                        <a class="page-link text-light bg-secondary" <?php if($halaman > 1){ echo "href='?akademik=$previous'"; } ?> aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                    $x = 0;
                    if ($halaman == 0) {
                        $x = 1;
                    } else if ($halaman == 1) {
                        $x = 1;
                    } else {
                        $x = 2;
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link text-dark" href="#"><?= $x ?></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-light bg-secondary" <?php if($halaman < $total_halaman) { echo "href='?akademik=$next'"; } ?> aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
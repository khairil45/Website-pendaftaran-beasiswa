<?php
// Koneksi database
include '../config/koneksi.php';

$kriteria = $_POST['beasiswa'];

$beasiswa = "";

if ($kriteria === 'akademik') {
    $query = "SELECT * FROM register WHERE beasiswa = 'Akademik' AND status = 'sudah diverifikasi'";
    $beasiswa = "Laporan Beasiswa Akademik";
} else {
    $query = "SELECT * FROM register WHERE beasiswa = 'Non Akademik' AND status = 'sudah diverifikasi'";
    $beasiswa = "Laporan Beasiswa Non Akademik";
}

$result = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan beasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Header -->
    <h3 class="text-center mt-5"><?= $beasiswa ?></h3>

    <!-- Table -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Semester</th>
                <th scope="col">IPK</th>
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
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
		window.print();
	</script>
</body>
</html>
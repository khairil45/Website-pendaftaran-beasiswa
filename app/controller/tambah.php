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
$nama     = $_POST['nama'];
$email    = $_POST['email'];
$nomor_hp = $_POST['nomor_hp'];
$semester = $_POST['semester'];
$ipk      = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$status   = 'belum diverifikasi';

// // Periksa apakah pengguna sudah terdaftar
$query = "SELECT * FROM register WHERE user_id='$user_id'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    // Pengguna sudah terdaftar, alihkan ke halaman lain
    header('Location: ../view/form.php?terdaftar');
} else {
    if ($_FILES['foto']['error'] === 4) {
        // Pengguna tidak mengunggah foto, mengunggah file gambar default
        $defaultImage = "user-no-image.png";
        move_uploaded_file($_FILES["foto"]["tmp_name"], "../upload/" . $defaultImage);
        // Insert data ke database
        mysqli_query($koneksi, "INSERT INTO register (user_id, foto, nama, email, nomor_hp, semester, ipk, beasiswa, status) VALUES ($user_id, '$defaultImage', '$nama', '$email', '$nomor_hp', '$semester', '$ipk', '$beasiswa', '$status')");

        // Mengalihkan halaman ke halaman hasil
        header('Location: ../view/hasil.php');

    } else {
        // Pengguna telah mengunggah foto
        $imageFileType = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));

        if ($_FILES["foto"]["size"] > 500000) {
            echo "Ukuran File Terlalu Besar";
        } elseif (!in_array($imageFileType, array("jpg", "jpeg", "png"))) {
            echo "Ekstensi file tidak diperbolehkan";
        } else {
            // Generate a unique filename based on the current date
            $x = date('d-m') . '_' . $_FILES["foto"]["name"];
            $uploadDirectory = '../upload/' . $x;

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadDirectory)) {
                // File berhasil diunggah, tambahkan data ke database
                mysqli_query($koneksi, "INSERT INTO register (user_id, foto, nama, email, nomor_hp, semester, ipk, beasiswa, status) VALUES ($user_id, '$x', '$nama', '$email', '$nomor_hp', '$semester', '$ipk', '$beasiswa', '$status')");

                // Mengalihkan halaman ke halaman hasil
                header('Location: ../view/hasil.php');

            } else {
                echo "Error upload file";
            }
        }
    } 
}
?>

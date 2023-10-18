<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_beasiswa";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi Gagal". mysqli_connect_error());
}
?>
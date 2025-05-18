<?php
$hostname = "localhost:3308";
$user = "root";
$password = "";
$db_name = "tiket_pesawat";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name);

if (!$koneksi) {
    die("Gagal koneksi ke database: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8");
?>

<?php
$hostname = "localhost:3308";
$user = "root"; // Sesuaikan dengan user MySQL
$password = ""; // Kosongkan jika tidak ada password
$db_name = "tiket_pesawat"; // Nama database yang digunakan

// Buat koneksi dan simpan dalam variabel
$koneksi = mysqli_connect($hostname, $user, $password) or die("Gagal Konek");

// Pilih database
mysqli_select_db($koneksi, $db_name) or die("Gagal Pilih Database");
?>

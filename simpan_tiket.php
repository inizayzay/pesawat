<?php
include 'koneksi.php'; // Pastikan koneksi sudah benar

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$maskapai      = $_POST["Maskapai"];
$dari          = $_POST["Dari"];
$tujuan        = $_POST["Tujuan"];
$jam_berangkat = $_POST["Jam_Berangkat"];
$harga         = $_POST["Harga"];

$stmt = $koneksi->prepare("INSERT INTO detail_tiket (maskapai, dari, tujuan, jam_berangkat, harga) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssd", $maskapai, $dari, $tujuan, $jam_berangkat, $harga);

if ($stmt->execute()) {
    echo "Data tiket berhasil disimpan!";
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>

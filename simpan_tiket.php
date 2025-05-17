<?php
$koneksi = new mysqli("localhost:3308", "root", "", "tiket_pesawat");

// Ambil data dari form
$maskapai      = $_POST["Maskapai"];
$dari          = $_POST["Dari"];
$tujuan        = $_POST["Tujuan"];
$jam_berangkat = $_POST["Jam_Berangkat"];
$harga         = $_POST["Harga"];




// Simpan ke database
$sql = "INSERT INTO detail_tiket (maskapai, dari, tujuan, jam_berangkat, harga)
        VALUES ('$maskapai', '$dari', '$tujuan', '$jam_berangkat', '$harga')";

if ($koneksi->query($sql) === TRUE) {
    echo "Data tiket berhasil disimpan!";
} else {
    echo "Gagal menyimpan data: " . $koneksi->error;
}
?>

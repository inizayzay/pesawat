<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE id_mhs='$id'") or die(mysqli_error($koneksi));

if($query) {
    header('location:tampil_mhs.php?message=berhasilcuy');
}
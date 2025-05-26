<?php
//panggil file koneksi untuk menghubungkan ke server
include 'koneksi.php';

//tangkap data dari form mahasiswa
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$id_prodi = $_POST['id_prodi'];

//simpan ke database
$query = mysql_query("INSERT INTO tbl_mahasiswa values('', '$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$id_prodi')") or die (mysql_error());

if($query){
    header('location:tampil_mhs.php?message=suksessimpan');
}

?>
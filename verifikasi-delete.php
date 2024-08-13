<?php
session_start();
include "koneksi.php";
$id_tanggapan = $_GET['id_tanggapan'];

$sql = "SELECT * FROM tanggapan WHERE id_tanggapan = '$id_tanggapan' ORDER BY id_tanggapan";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query)>0){
  $data = mysqli_fetch_array($query);
  $id_pengaduan = $data['id_pengaduan'];
}

$sql = "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
mysqli_query($koneksi, $sql);
  
$sql = "UPDATE pengaduan SET status = '0' WHERE id_pengaduan = '$id_pengaduan'";
mysqli_query($koneksi, $sql);
$_SESSION['info'] = 'Dihapus';

header("location:verifikasi.php");

?>

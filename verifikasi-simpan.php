<?php
session_start();
include "koneksi.php";
$id_pengaduan = $_POST['id_pengaduan'];
$sql = "SELECT * FROM tanggapan WHERE id_pengaduan = '$id_pengaduan' ORDER BY id_pengaduan";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query)>0){
  $data = mysqli_fetch_array($query);
  $id_tanggapan = $data['id_tanggapan'];
}

$verifikasi = $_POST['verifikasi'];
$tampil     = $_POST['tampil'];
if ($verifikasi=="T" && $tampil=="Y"){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
  mysqli_query($koneksi, $sql);
  
  $keterangan   = $_POST['keterangan'];
  $id_petugas   = $_SESSION['id_petugas'];

  $sql = "INSERT INTO tanggapan(id_pengaduan, verifikasi, tampil_tanggapan, keterangan, id_petugas) VALUES('$id_pengaduan', '$verifikasi', '$tampil', '$keterangan', '$id_petugas')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';

  if ($verifikasi=="T"){
    $sql = "UPDATE pengaduan SET status = 'Ditolak' WHERE id_pengaduan = '$id_pengaduan'";
    mysqli_query($koneksi, $sql);
  }else{
    $sql = "UPDATE pengaduan SET status = '0' WHERE id_pengaduan = '$id_pengaduan'";
    mysqli_query($koneksi, $sql);
  }
}
header("location:verifikasi.php");

?>

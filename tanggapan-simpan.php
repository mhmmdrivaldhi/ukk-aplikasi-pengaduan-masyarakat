<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$tglHariIni = date('Y-m-d');
include "koneksi.php";

$id_tanggapan = $_POST['id_tanggapan'];
$tanggapan    = $_POST['tanggapan'];
$progress_pengaduan = $_POST['progress_pengaduan'];
$id_petugas   = $_SESSION['id_petugas'];

if ($_FILES["photo"]["name"]!=""){
  $namaBaru 	  = date('dmYHis');
  $new_images = $namaBaru.$_FILES["photo"]["name"];
  $images     = $_FILES["photo"]["tmp_name"];
  

  $sql = "INSERT INTO detail_tanggapan(id_tanggapan, tgl_tanggapan, tanggapan, photo_tanggapan, progress_pengaduan, id_petugas) VALUES('$id_tanggapan', '$tglHariIni', '$tanggapan', '$new_images', '$progress_pengaduan', '$id_petugas')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
  move_uploaded_file($images, "photo/".$new_images);
}else{
  $sql = "INSERT INTO detail_tanggapan(id_tanggapan, tgl_tanggapan, tanggapan, progress_pengaduan, id_petugas) VALUES('$id_tanggapan', '$tglHariIni', '$tanggapan', '$progress_pengaduan', '$id_petugas')";
  $_SESSION['info'] = 'Disimpan';
  mysqli_query($koneksi, $sql);
}

$sql = "SELECT * FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
  $query= mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);
  $id_pengaduan = $data['id_pengaduan'];
if($progress_pengaduan=="Selesai"){
  $sql = "UPDATE pengaduan SET status = 'Selesai' WHERE id_pengaduan = '$id_pengaduan'";
  mysqli_query($koneksi, $sql);
}else{
  $sql = "UPDATE pengaduan SET status = 'Proses' WHERE id_pengaduan = '$id_pengaduan'";
  mysqli_query($koneksi, $sql);
}
header("location:tanggapan.php");

?>

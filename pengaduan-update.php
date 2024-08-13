<?php
session_start();
include "koneksi.php";
$namaBaru 	    = date('dmYHis');

$id_pengaduan = $_POST['id_pengaduan'];
$isi_laporan  = $_POST['isi_laporan'];
$tampil 	    = $_POST['tampil'];
$photo 		    = $_FILES['photo']['name'];
if($photo !=""){
  $namaBaru 	= date('dmYHis');
  $new_images = $namaBaru.$_FILES["photo"]["name"];
  $images     = $_FILES["photo"]["tmp_name"];
   
  $sql = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
  $query= mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);
  $photo_pengaduan = $data['photo_pengaduan'];

  $sql = "UPDATE pengaduan SET 
    isi_laporan     = '$isi_laporan',
    photo_pengaduan = '$new_images',
    tampil          = '$tampil'
  WHERE id_pengaduan= '$id_pengaduan'";
  $hsl = mysqli_query($koneksi, $sql);
  if($hsl==1){
    move_uploaded_file($images, "photo/".$new_images);
    unlink("photo/".$photo_pengaduan);
    $_SESSION['info'] = 'Diupdate';
  }else{
    $_SESSION['info'] = 'Gagal Diupdate';
  }
}else{
  $sql = "UPDATE pengaduan SET 
    isi_laporan = '$isi_laporan',
    tampil      = '$tampil'
  WHERE id_pengaduan= '$id_pengaduan'";
  $hsl = mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Diupdate';
}
header("location:pengaduan.php");
?>

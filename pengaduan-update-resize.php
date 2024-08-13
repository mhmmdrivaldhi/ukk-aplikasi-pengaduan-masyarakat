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
  $images     = $_FILES["photo"]["tmp_name"];
  $new_images = $namaBaru.$_FILES["photo"]["name"];
  
  $images_kecil = "kecil-".$namaBaru.$_FILES["photo"]["name"];
  $images_besar = "besar-".$namaBaru.$_FILES["photo"]["name"];
  copy($_FILES,"photo/".$_FILES["photo"]["name"]);

  $width=40;
  $size=GetimageSize($images);
  $height=round($width*$size[1]/$size[0]);
  $images_orig = ImageCreateFromJPEG($images);
  $photoX = ImagesX($images_orig);
  $photoY = ImagesY($images_orig);
  $images_fin = ImageCreateTrueColor($width, $height);
  ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
  ImageJPEG($images_fin,"photo/".$images_kecil);
  ImageDestroy($images_orig);
  ImageDestroy($images_fin);

  $width=500;
  $size=GetimageSize($images);
  $height=round($width*$size[1]/$size[0]);
  $images_orig = ImageCreateFromJPEG($images);
  $photoX = ImagesX($images_orig);
  $photoY = ImagesY($images_orig);
  $images_fin = ImageCreateTrueColor($width, $height);
  ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
  ImageJPEG($images_fin,"photo/".$images_besar);
  ImageDestroy($images_orig);
  ImageDestroy($images_fin);

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
    unlink("photo/kecil-".$photo_pengaduan);
    unlink("photo/besar-".$photo_pengaduan);
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

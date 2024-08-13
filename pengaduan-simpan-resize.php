<?php
  date_default_timezone_set("Asia/Jakarta");
  session_start();
  include "koneksi.php";

  $tglHariIni = date('Y-m-d');
  $nik        = $_SESSION['nik'];
  $isi_laporan= $_POST['isi_laporan'];  
  $tampil     = $_POST['tampil'];

  if ($_FILES["photo"]["name"]!=""){
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

    $sql = "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan,  photo_pengaduan, tampil) VALUES('$tglHariIni', '$nik', '$isi_laporan', '$new_images', '$tampil')";
    $hsl = mysqli_query($koneksi, $sql);
    if($hsl==1){
      $_SESSION['info'] = 'Disimpan';
    }else{
      $_SESSION['info'] = 'Gagal Disimpan';
    }
  }else{
    $sql = "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan, tampil) VALUES('$tglHariIni', '$nik', '$isi_laporan', '$tampil')";
    $hsl = mysqli_query($koneksi, $sql);
  }
  header("location:pengaduan.php");
?>

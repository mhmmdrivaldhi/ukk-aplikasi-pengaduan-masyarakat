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
    $new_images = $namaBaru.$_FILES["photo"]["name"];
    $images     = $_FILES["photo"]["tmp_name"];

    $sql = "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan,  photo_pengaduan, tampil) VALUES('$tglHariIni', '$nik', '$isi_laporan', '$new_images', '$tampil')";
    $hsl = mysqli_query($koneksi, $sql);
    if($hsl==1){
      $_SESSION['info'] = 'Disimpan';
      move_uploaded_file($images, "photo/".$new_images);
    }else{
      $_SESSION['info'] = 'Gagal Disimpan';
    }
  }else{
    $sql = "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan, tampil) VALUES('$tglHariIni', '$nik', '$isi_laporan', '$tampil')";
    $hsl = mysqli_query($koneksi, $sql);
  }
  header("location:pengaduan.php");
?>

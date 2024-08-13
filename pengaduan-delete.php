<?php
  session_start();
  include "koneksi.php";
  $id_pengaduan = $_GET['id_pengaduan'];

  $sql   = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
  $query  = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($query);
  $photo  = $data['photo_pengaduan'];
  $nik    = $data['nik'];
 
  $sql1 = "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
  $hsl = mysqli_query($koneksi, $sql1);
  if($hsl==1){
    if($photo!=""){
      unlink("photo/".$photo);
    }
    $_SESSION['info'] = 'Dihapus';
  }
  $sql = "SELECT * FROM pengaduan WHERE nik = '$nik'";
  $query  = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($query)=='0'){
    $sql1 = "DELETE FROM masyarakat WHERE nik = '$nik'";
    $hsl = mysqli_query($koneksi, $sql1);
  }
  

  header("location:pengaduan.php");
?>
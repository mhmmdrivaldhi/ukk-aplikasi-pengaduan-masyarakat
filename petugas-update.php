<?php
  session_start();
  include "koneksi.php";
  $username = strtolower($_POST['username']);
  if ($username=="admin"){
    $_SESSION['info'] = 'Gagal Diupdate';
  }else{
    $id_petugas   = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $password 		= md5(htmlspecialchars($_POST['password']));;
    $telp         = $_POST['telp'];
    $level        = $_POST['level'];
    $sql = "UPDATE petugas SET 
      nama_petugas  = '$nama_petugas', 
      username      = '$username', 
      password      = '$password', 
      telp          = '$telp', 
      level         = '$level'
    WHERE id_petugas = '$id_petugas'";
    mysqli_query($koneksi, $sql);
    $_SESSION['info'] = 'Diupdate';
  }
  header("location:petugas.php");
?>

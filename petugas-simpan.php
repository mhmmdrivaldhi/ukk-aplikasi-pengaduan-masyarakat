<?php
session_start();
include "koneksi.php";

$nama_petugas = $_POST['nama_petugas'];
$username 		= htmlspecialchars($_POST['username']);
$password 		= md5(htmlspecialchars($_POST['password']));
$telp         = $_POST['telp'];
$level        = $_POST['level'];

$sql = "INSERT INTO petugas(nama_petugas, username, password, telp, level) VALUES('$nama_petugas', '$username', '$password', '$telp', '$level')";
$hsl = mysqli_query($koneksi, $sql);
if($hsl==1){
  $_SESSION['info'] = 'Disimpan';
}else{
  $_SESSION['info'] = 'Gagal Disimpan';
}
header("location:petugas.php");

?>

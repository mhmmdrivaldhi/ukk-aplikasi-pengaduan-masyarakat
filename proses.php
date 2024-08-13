<?php 
session_start();
include "koneksi.php";
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = md5(mysqli_escape_string($koneksi, $_POST['password']));

$sql = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query)>0){
	$data 	  = mysqli_fetch_array($query);
  $gender   = $data['gender'];
  if($gender=="L"){
    $photo = "male.png"; 
  }else{
    $photo = "female.png"; 
  }
  // Membuat session
  $_SESSION['nik']    = $data['nik'];
	$_SESSION['nama']   = $data['nama'];
	$_SESSION['jabatan']= $data['jabatan'];
	$_SESSION['gender'] = $gender;
	$_SESSION['photo']  = $photo;
	header("location:dashboard.php");
}else{
  $sql1 = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
  $query1 = mysqli_query($koneksi, $sql1);
  if (mysqli_num_rows($query1)>0){
    $data1 = mysqli_fetch_array($query1);
    $_SESSION['id_petugas'] = $data1['id_petugas'];
    $_SESSION['nama']    = $data1['nama_petugas'];
    $_SESSION['jabatan'] = $data1['level'];
    $_SESSION['photo']   = "male.png";
    header("location:dashboard.php");
  }else{
    $_SESSION['info'] = 'Salah';
    header("location:index.php");
  }
}
?>
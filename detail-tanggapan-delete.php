<?php
session_start();
include "koneksi.php";
$id_detail_tanggapan = $_GET['id_detail_tanggapan'];
$sql = "SELECT * FROM detail_tanggapan a INNER JOIN tanggapan b ON a.id_tanggapan = b.id_tanggapan WHERE a.id_detail_tanggapan = '$id_detail_tanggapan'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_tanggapan = $data['id_tanggapan'];
$id_pengaduan = $data['id_pengaduan'];
$photo        = $data['photo_tanggapan'];

$sql = "DELETE FROM detail_tanggapan WHERE id_detail_tanggapan = '$id_detail_tanggapan'";
mysqli_query($koneksi, $sql);
unlink("photo/".$photo);


$sql1 = "SELECT * FROM detail_tanggapan WHERE id_detail_tanggapan = '$id_detail_tanggapan'";
$query1= mysqli_query($koneksi, $sql1);
if(mysqli_num_rows($query1)=='0'){
  $data=mysqli_fetch_array($query1);
  if($data['progress_pengaduan']=="Selesai"){
    $sql2 = "UPDATE pengaduan SET status = '0' WHERE id_pengaduan = '$id_pengaduan'";
    mysqli_query($koneksi, $sql2);
  }
}else{
  $sql3 = "SELECT * FROM detail_tanggapan WHERE id_tanggapan = '$id_tanggapan' AND progress_pengaduan = 'Selesai'";
  $query3= mysqli_query($koneksi, $sql3);
  if(mysqli_num_rows($query3)=='0'){
    $sql4 = "UPDATE pengaduan SET status = 'Proses' WHERE id_pengaduan = '$id_pengaduan'";
    mysqli_query($koneksi, $sql4);
  }
}





$_SESSION['info'] = 'Dihapus';
header("location:tanggapan.php");

?>

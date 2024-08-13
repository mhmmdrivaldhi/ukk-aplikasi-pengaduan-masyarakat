<?php
  session_start();
  include "koneksi.php";
  $id_petugas = $_GET['id_petugas'];
  $sql = "DELETE FROM petugas WHERE id_petugas ='$id_petugas'";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Dihapus';
  header("location:petugas.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Judul Browser -->
    <title>UKK PENGADUAN MASYARAKAT | <?= $judul ?></title>
    <!-- Icon Browser -->
    <link rel="shorcut icon" type="text/css" href="img/favicon.png">

    <!-- CSS -->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style-pengaduan.css" rel="stylesheet">
  </head>
  <body id="page-top">
	  <div id="wrapper">
      <!-- SweetAlert2 -->
      <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ 
        echo $_SESSION['info']; 
        } 
        unset($_SESSION['info']); ?>">
      </div>
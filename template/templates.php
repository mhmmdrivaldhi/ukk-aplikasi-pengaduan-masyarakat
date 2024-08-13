<?php
  session_start();
  if(isset($_SESSION['nik'])){
    $nik    = $_SESSION['nik'];
  }
  $nama     = $_SESSION['nama'];
  $jabatan  = $_SESSION['jabatan'];
  $photo    = $_SESSION['photo'];

  include "koneksi.php";
  include "header.php";
  include "sidebar.php";
  include "topbar.php";
?>
<!-- SweetAlert2 -->
<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ 
  echo $_SESSION['info']; 
  } 
  unset($_SESSION['info']); ?>">
</div>
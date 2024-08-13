<?php
  $judul = "HOME";
  include "template/templates.php";

  // Hitung Total Pengaduan
  $sql = "SELECT * FROM pengaduan";
  $query = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($query)>0){
    $total_pengaduan = mysqli_num_rows($query);
  }else{
    $total_pengaduan = 0;
  }
  
  // Hitung belum verifikasi
  $sql1   = "SELECT * FROM pengaduan WHERE status ='0'";
  $query1 = mysqli_query($koneksi, $sql1);
  if(mysqli_num_rows($query1)>0){
    $total_belum_verifikasi = mysqli_num_rows($query1);
  }else{
    $total_belum_verifikasi = 0;
  }

   // Hitung sudah verifikasi
   $sql2   = "SELECT * FROM tanggapan";
   $query2 = mysqli_query($koneksi, $sql2);
   if(mysqli_num_rows($query2)>0){
     $total_sudah_verifikasi = mysqli_num_rows($query2);
     $total_belum_verifikasi=$total_belum_verifikasi-$total_sudah_verifikasi;
   }else{
     $total_sudah_verifikasi = 0;
   }

  // Hitung Belum Diproses
  $sql3 = "SELECT * FROM pengaduan WHERE status='0'";
  $query3 = mysqli_query($koneksi, $sql3);
  if(mysqli_num_rows($query3)>0){
    $total_belum_diproses = mysqli_num_rows($query3);
  }else{
    $total_belum_diproses = 0;
  }

  // Hitung Sedang Diproses
  $sql4 = "SELECT * FROM pengaduan WHERE status='Proses'";
  $query4 = mysqli_query($koneksi, $sql4);
  if(mysqli_num_rows($query4)>0){
    $total_sedang_diproses = mysqli_num_rows($query4);
  }else{
    $total_sedang_diproses = 0;
  }
  
  // Hitung Selesai Diproses
  $sql5 = "SELECT * FROM pengaduan WHERE status='Selesai'";
  $query5 = mysqli_query($koneksi, $sql5);
  if(mysqli_num_rows($query5)>0){
    $total_selesai_diproses = mysqli_num_rows($query5);
  }else{
    $total_selesai_diproses = 0;
  }

  // Hitung Ditolak
  $sql6 = "SELECT * FROM pengaduan WHERE status='Ditolak'";
  $query6 = mysqli_query($koneksi, $sql6);
  if(mysqli_num_rows($query6)>0){
    $total_ditolak = mysqli_num_rows($query6);
  }else{
    $total_ditolak = 0;
  }

  // $data = mysqli_fetch_array($query)) {

?>
<div class="container-fluid backGambar">
  <div class="row mt-5">
    <?php 
    if($jabatan!="masyarakat"){?>
      <!-- Total Pengaduan -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-info border-success judul-pengaduan">PENGADUAN</div>
          <div class="card-body hasil-pengaduan">
            <?= $total_pengaduan; ?>
          </div>
          <div class="card-footer border-info pengaduans">TOTAL PENGADUAN</div>
        </div>
      </div>

      <!-- Verifikasi -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-warning judul-pengaduan">VERIFIKASI PENGADUAN</div>
          <div class="card-body hasil-pengaduan">
            <div class="row">
              <div class="col-md-6">
                <?= $total_belum_verifikasi+$total_sedang_diproses+$total_selesai_diproses+$total_ditolak; ?>
              </div>
              <div class="col-md-6">
                <?= $total_sudah_verifikasi; ?>
              </div>
            </div>
          </div>
          <div class="card-footer border-warning pengaduans">
            <div class="row">
              <div class="col-md-6">BELUM</div>
              <div class="col-md-6">SUDAH</div>
            </div>
          </div>
        </div>
      </div>  

      <!-- DIPROSES -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-success judul-pengaduan">PROSES PERKERJAAN</div>
          <div class="card-body hasil-pengaduan">
            <div class="row">
              <div class="col-md-4 btn btn-danger">
                <?= $total_belum_diproses; ?>
              </div>
              <div class="col-md-4 btn btn-warning">
                <?= $total_sedang_diproses; ?>
              </div>
              <div class="col-md-4 btn btn-succes">
                <?= $total_selesai_diproses; ?>
              </div>
            </div>
          </div>
          <div class="card-footer border-success pengaduan1">
            <div class="row">
              <div class="col-md-4">BELUM</div>
              <div class="col-md-4">SEDANG</div>
              <div class="col-md-4">SELESAI</div>
            </div>
          </div>
        </div>
      </div>  

      <!-- Ditolak -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-danger judul-pengaduan">PENGADUAN DITOLAK</div>
          <div class="card-body hasil-pengaduan">
            <?= $total_ditolak; ?>
          </div>
          <div class="card-footer border-danger pengaduans">TOTAL DITOLAK</div>
        </div>
      </div>
      <?php 
    
    }else{?>
      <div class="col-xl-10 jumbotron">
        <h1 class="display-5">SELAMAT DATANG</h1><br>
        <p class="lead" style="color: green;">Di Aplikasi Pengaduan Masyarakat Kabupaten Bogor </p>
        <hr class="hr" style="width:100%; margin-top: -10px">
        <h6 class="smk">SMK Plus Pelita Nusantara <?= date('Y');?></h6>
      </div>
      <?php 
    }?>
  </div>
</div>
<?php include "template/sticky-footer.php"; ?>    
<?php include "template/footer.php"; ?>
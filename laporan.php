<?php
  $judul = "Laporan";
  include "template/templates.php";
  
  date_default_timezone_set("Asia/Jakarta");
  $tglHariIni = date('Y-m-d');
?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase text-dark">Rekapitulasi Laporan</h3>
      <hr class="hr">
    </div>
  </div>

  <!-- Periode -->
  <form action="cetak-laporan.php" method="post" target="_blank">
    <div class="row mb-4 mt-2">
      <div class="col-xl-10">
        <div class="input-group mb-1">
          <!-- Periode dari -->
          <span class="input-group-text lebar">Dari</span>
          <input type="date" name="periodeDari" id="periodeDari" class="form-control form-control-sm lebar" value="<?= $tglHariIni; ?>">
          
          <!-- Periode Sampai -->
          <span class="input-group-text lebar">Sampai</span>
          <input type="date" name="periodeSampai" id="periodeSampai" class="form-control form-control-sm" value="<?= $tglHariIni; ?>">
        
          <select name="idLaporan" class="form-control form-control-sm" >
            <option value="" selected>~ Pilih Laporan ~</option>
            <option value="lap_petugas">Laporan Petugas</option>
            <option value="lap_masyarakat">Laporan Masyarakat</option>
            <option value="lap_pengaduan">Laporan Pengaduan</option>
            <option value="lap_belum_verfal">Laporan Pengaduan Belum Verifikasi</option>
            <option value="lap_ditolak">Laporan Pengaduan Ditolak</option>
            <option value="lap_proses">Laporan Pengaduan In Progres</option>
            <option value="lap_selesai">Laporan Pengaduan Selesai</option>
          </select>
        
          <a class="btn btn-sm btn-primary text-white" id="periodeCari"><i class="fas fa-search pt-1"></i></a>

          <button class="btn btn-sm btn-success text-white" type="submit" id="periodePrint" name="cetak"><i class="fas fa-print"></i></button>
        </div>
      </div>
    </div>
  </form>

  <div class="row">
    <div class="col-xl-12 table-responsive">
      <div id="tampilkanLaporan"></div>
    </div>
  </div>
</div>

<?php include "template/sticky-footer.php"; ?>
<?php include "template/footer.php"; ?>
<script>
  $(document).ready(function() {
    $('#tblTransaksi').dataTable();
    // Menampilkan Tabel Transaksi Per Periode

    $(document).on('click', '#periodeCari', function(e) {
      var periodeDari   = $('#periodeDari').val();
      var periodeSampai = $('#periodeSampai').val();
      var idLaporan     = $('[name="idLaporan"]').val();
      if(idLaporan===""){
        Swal.fire('Laporan belum dipilih');
      }else{
        $.ajax({
          method: 'POST',
          data: {
            periodeDari: periodeDari,
            periodeSampai: periodeSampai,
            idLaporan: idLaporan
          },
          url: 'laporan-laporan.php',
          cache: false,
          success: function() {
            $('#tampilkanLaporan').load('laporan-laporan.php', {
              periodeDari: periodeDari,
              periodeSampai: periodeSampai,
              idLaporan: idLaporan
            });
          }
        });
      }
    });

   
  });
</script>
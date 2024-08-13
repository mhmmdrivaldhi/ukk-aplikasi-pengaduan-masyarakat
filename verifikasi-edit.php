<style>
  .backGambar{height:82vh;overflow: hidden;}
  .photoDisplay{cursor: pointer;}
</style>

<?php
  $judul = "Verifikasi";
  include "template/templates.php";

  $id_pengaduan = $_GET['id_pengaduan'];
  $sql    = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
  $query  = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($query);?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row pb-3">
    <div class="col-xl-12">	
      <h3 class="text-center text-uppercase text-dark">Verifikasi Pengaduan</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row ml-5">
    <div class="col-xl-8">
      <form action="verifikasi-simpan.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan; ?>">

        <!-- Isi Tanggapan -->
        <div class="input-group input-group-sm mb-1">
          <span class="input-group-text lebar">Isi Pengaduan</span>
          <textarea name="isi_laporan" rows="5" class="form-control" readonly><?= $data['isi_laporan']; ?></textarea>
        </div>

        <!-- Gambar -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Gambar</span>
          <?php 
          if($data['photo_pengaduan']==""){?>
            <img src="photo/no-logo.png" alt="photo" width="40" height="40">
            <?php 
          }else{?>
            <img src="photo/<?= $data['photo_pengaduan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#tDisplay" class="photoDisplay" title="Gambar Diperbesar">
            <div class="modal fade" id="tDisplay" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <img src="photo/besar-<?= $data['photo_pengaduan']; ?>" alt="photo">
                </div>
              </div>
            </div>
            <?php 
          }?>
        </div>

        <!-- Verifikasi -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Verifikasi</span>
          <select name="verifikasi" class="form-control form-control-sm" required>
            <option value="" selected>~ Pilih Verifikasi ~</option>
						<option value="Y">Ya</option>
						<option value="T">Tidak</option>
          </select>
        </div>

        <!-- Tampilkan -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Pengaduan</span>
          <select name="tampil" class="form-control form-control-sm" required>
            <option value="" selected>~ Pilih Tampilkan ~</option>
						<option value="Y">Ditampilkan</option>
						<option value="T">Tidak Ditampilkan</option>
          </select>
        </div>

         <!-- Isi Tanggapan -->
        <div class="input-group input-group-sm mb-1">
          <span class="input-group-text lebar">Alasan</span>
          <textarea name="keterangan" rows="5" class="form-control" required></textarea>
        </div>

        <div class="input-group mb-1 input-sm">
          <button type="submit" class="btn btn-sm btn-success">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;</button> &nbsp;| &nbsp; <a href="verifikasi.php" class="btn btn-sm btn-warning">&nbsp;<i class="fas fa-redo"></i> &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
        </div>
			</form>
		</div>
	</div>
</div>


<?php
  $judul = "Tanggapan";
  include "template/templates.php";

  $id_tanggapan = $_GET['id_tanggapan'];
  $sql  = "SELECT * FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan = b.id_pengaduan WHERE a.id_tanggapan = '$id_tanggapan'";
  $query= mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row pb-3">
    <div class="col-xl-12">	
      <h3 class="text-center text-uppercase text-dark">Tanggapan Pengaduan</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row ml-5">
    <div class="col-xl-8">
      <form action="tanggapan-simpan.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_tanggapan" value="<?= $id_tanggapan; ?>">

        <!-- Isi Tanggapan -->
        <div class="input-group input-group-sm mb-1">
          <span class="input-group-text lebar">Isi Pengaduan</span>
          <textarea name="isi_laporan" rows="5" class="form-control" readonly><?= $data['isi_laporan']; ?></textarea>
        </div>

        <!-- Gambar -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Gambar</span>
          <?php 
          if($data['photo_pengaduan']!=""){?>
            <img src="photo/<?= $data['photo_pengaduan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#tDisplay" class="photoDisplay" title="Gambar Diperbesar">
            <div class="modal fade" id="tDisplay" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <img src="photo/besar-<?= $data['photo_pengaduan']; ?>" alt="photo">
                </div>
              </div>
            </div>
            <?php 
          }else{?>
            <img src="photo/no-logo.png" alt="photo" width="40" height="40">
            <?php 
          }?>
        </div>

        <!-- Tanggapan -->
        <div class="input-group input-group-sm mb-1">
          <span class="input-group-text lebar">Tanggapan</span>
          <textarea name="tanggapan" rows="5" class="form-control" required></textarea>
        </div>

        <!-- Photo -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Photo</span>
          <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
        </div>

        <!-- Progress Pengaduan -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Pengaduan</span>
          <select name="progress_pengaduan" class="form-control form-control-sm" required>
            <option value="" selected>~ Pilih Progress ~</option>
            <option value="Belum">Belum</option>
            <option value="Selesai">Selesai</option>
          </select>
        </div>
     
        <div class="input-group mb-1 input-sm">
          <button type="submit" class="btn btn-sm btn-success">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Simpan&nbsp;&nbsp;</button> &nbsp;| &nbsp; <a href="tanggapan.php" class="btn btn-sm btn-warning">&nbsp;<i class="fas fa-redo"></i> &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
        </div>
			</form>
		</div>
	</div>
</div>

<?php include "template/sticky-footer.php"; ?>    
<?php include "template/footer.php"; ?>

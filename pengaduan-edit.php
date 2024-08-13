<?php
  $judul = "Edit";
  include "template/templates.php"; 

  $id_pengaduan = $_GET['id_pengaduan'];
  $sql    = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
  $query  = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($query);?>

  <div class="container-fluid pt-3 pb-5 backGambar">
    <div class="row pb-3">
      <div class="col-xl-12">	
        <h3 class="text-center text-uppercase text-dark">Edit Pengaduan</h3>
        <hr class="hr">
      </div>
    </div>

    <div class="row ml-5">
      <div class="col-xl-8">
        <form action="pengaduan-update.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan; ?>">

          <!-- Isi Tanggapan -->
          <div class="input-group input-group-sm mb-1">
            <span class="input-group-text lebar">Isi Pengaduan</span>
            <textarea name="isi_laporan" cols="30" rows="7" class="form-control"><?= $data['isi_laporan']; ?></textarea>
          </div>

          <!-- Gambar -->
          <div class="input-group mb-1">
            <span class="input-group-text lebar">Gambar</span>
            <?php 
            if($data['photo_pengaduan']==""){?>
              <img src="photo/no-logo.png" alt="photo" width="40" height="40">
              <?php 
            }else{?>
              <img src="photo/<?= $data['photo_pengaduan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#potoDisplay" class="photoDisplay" title="Gambar Diperbesar" id="<?= $data['photo_pengaduan']; ?>">
              <div class="modal" id="potoDisplay" tabindex="-1" role="dialog"></div>
              <?php
            }?>
          </div>

          <!-- Photo -->
          <div class="input-group mb-3">
            <span class="input-group-text lebar">Photo</span>
            <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
          </div>

          <!-- Tampilkan -->
          <div class="input-group mb-1">
            <span class="input-group-text lebar">Pengaduan</span>
            <select name="tampil" class="form-control form-control-sm" required>
              <option value="Y" <?php if ($data['tampil']=="Y"){ echo "selected=selected";}?> >Ditampilkan</option>
              <option value="T" <?php if ($data['tampil']=="T"){ echo "selected=selected";}?>>Tidak Ditampilkan</option>
            </select>
          </div>

          <div class="input-group mb-1 input-sm">
            <button type="submit" class="btn btn-sm btn-success">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;</button> &nbsp;| &nbsp; <a href="pengaduan.php" class="btn btn-sm btn-warning">&nbsp;<i class="fas fa-redo"></i> &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
          </div>
        </form>
      </div>
    </div>
  </div>



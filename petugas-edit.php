<?php
$judul = "Edit";
include "template/templates.php";

$id_petugas = $_GET['id_petugas'];
$sql = "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row pb-3">
    <div class="col-xl-12">	
      <h3 class="text-center text-uppercase text-dark">Edit Petugas Login</h3>
      <hr class="hr">
    </div>
  </div>
  <div class="row ml-5">
    <div class="col-xl-5">
      <form action="petugas-update.php" method="post">
        <input type="hidden" name="id_petugas" value="<?= $id_petugas;?>">
     
        <!-- Nama Petugas -->
        <div class="input-group input-group-sm mb-1">
          <span class="input-group-text lebar">Nama Petugas</span>
          <input type="text" name="nama_petugas" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Nama" value="<?= $data['nama_petugas']; ?>" >
        </div>

        <!-- Username -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar" >Username</span>
          <input  type="text" name="username" class="form-control form-control-sm" required autocomplete="off" value="<?= $data['username'];?>">
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
          <span class="input-group-text lebar" >Password</span>
          <input type="password" name="password" class="form-control form-control-sm" required >
        </div>

        <!-- Telp -->
        <div class="input-group input-group-sm mb-1">
          <span class="input-group-text lebar">Telp / WA</span>
          <input type="text" name="telp" required autocomplete="off" class="form-control form-control-sm" placeholder="Input No. Telp / WA" value="<?= $data['telp']; ?>">
        </div>

        <!-- Level / Jabatan -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Level / Jabatan</span>
          <select name="level" class="form-control form-control-sm" required>
            
            <option value="admin" <?php if ($data['level']== "admin"){echo 'selected="selected"';}?> >Administrator</option>
            <option value="petugas" <?php if ($data['level']== "petugas"){echo 'selected="selected"';}?>>Petugas</option>
          </select>
        </div>

        <div class="input-group mb-1">
          <button type="submit" class="btn btn-success btn-sm">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;</button>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="petugas.php" class="btn btn-sm btn-warning">&nbsp;<i class="fas fa-redo"></i>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
        </div>
      </form>
		</div>
	</div>
</div>

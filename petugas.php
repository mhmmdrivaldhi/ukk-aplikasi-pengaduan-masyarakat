<?php
  $judul = "Login";
  include "template/templates.php";
?>
<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase text-dark">Rekapitulasi Petugas Login</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row">
    <div class="col-xl-10 table-responsive">
      <button type="button" class="btn btn-primary btn-sm px-2 my-3" data-toggle="modal" data-target="#staticBackdrop" title="tambah data">
        <i class="fas fa-plus"></i>&nbsp;Tambah&nbsp;&nbsp;
      </button>

      <table class="table table-bordered table-hover" id="login">
        <thead>
          <tr class="text-center">
            <th width="5%">No.</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Jabatan</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT * FROM petugas";
          $query = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) {?>
            <tr>
              <td align="center" width="3%"><?= $no++; ?>.</td>
              <td><?= $data['nama_petugas']; ?></td>
              <td><?= $data['username']; ?></td>
              <td><?= $data['telp']; ?></td>
              <td><?= strtoupper($data['level']); ?></td>
              <td align="center" width="15%">
                <a href="petugas-edit.php?id_petugas=<?= $data['id_petugas']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a>
                <?php if($data['username']!="admin"){?> 
                  | <a href="petugas-delete.php?id_petugas=<?= $data['id_petugas']; ?>" class="badge badge-danger p-2 delete-data" title='Delete'><i class="fas fa-trash"></i></a>
                  <?php 
                }?>
              </td>
            </tr>
            <?php
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
		$('#login').dataTable();
	});
</script>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Input Petugas Login
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="Petugas-simpan.php" method="post">
          <!-- Nama Petugas -->
          <div class="input-group input-group-sm mb-1">
						<span class="input-group-text lebar">Nama Petugas</span>
						<input type="text" name="nama_petugas" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Nama">
					</div>

          <!-- Username -->
          <div class="input-group input-group-sm mb-1">
            <span class="input-group-text lebar">Username</span>
            <input type="text" name="username" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Username">
          </div>

          <!-- Password -->
          <div class="input-group mb-1">
						<span class="input-group-text lebar">Password</span>
						<input type="password" name="password" required class="form-control form-control-sm" placeholder="Input Password">
					</div>

          <!-- Telp -->
          <div class="input-group input-group-sm mb-1">
            <span class="input-group-text lebar">Telp / WA</span>
            <input type="text" name="telp" required autocomplete="off" class="form-control form-control-sm" placeholder="Input No. Telp / WA">
          </div>

          <!-- Level / Jabatan -->
          <div class="input-group mb-1">
						<span class="input-group-text lebar">Level / Jabatan</span>
						<select name="level" class="form-control form-control-sm form-control-chosen" required>
							<option value="" selected>~ Pilih Jabatan / Level ~</option>
							<option value="admin">Administrator</option>
							<option value="petugas">Petugas</option>
						</select>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Simpan&nbsp;&nbsp;</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br>
<br>

<?php   
include "template/footer.php";
include "template/sticky-footer.php";
?>



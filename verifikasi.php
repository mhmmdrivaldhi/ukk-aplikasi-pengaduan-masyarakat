<?php
  $judul = "Verifikasi";
  include "template/templates.php";
?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase text-dark">Rekapitulasi Verifikasi Pengaduan</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12 table-responsive">
      <table class="table table-bordered table-hover" id="masyarakat">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>NIK</th>
            <th>Nama </th>
            <th>Tanggal</th>
            <th>Perihal Pengaduan</th>
            <th>Photo</th>
            <th>Verifikasi</th>
            <th>Tampil</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT * FROM tanggapan a RIGHT JOIN pengaduan b ON a.id_pengaduan = b.id_pengaduan INNER JOIN masyarakat c ON b.nik = c.nik ORDER BY a.id_tanggapan DESC";
          $query = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) {
            $id_tanggapan = $data['id_tanggapan'];
            $tanggal = date_format(date_create($data['tgl_pengaduan']), "d-m-Y");?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td ><?= $data['nik']; ?></td>
              <td ><?= $data['nama']; ?></td>
              <td width="10%"><?= $tanggal; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td align="center">
                <?php 
                  if($data['photo_pengaduan']==""){?>
                    <img src="photo/no-logo.png" alt="photo" width="40" height="40">
                    <?php 
                  }else{?>
                  
                    <img src="photo/<?= $data['photo_pengaduan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#potoDisplay" class="photoDisplay" title="Gambar Diperbesar" id="<?= $data['photo_pengaduan']; ?>">

                    <div class="modal" id="potoDisplay" tabindex="-1" role="dialog"></div>
                    <?php 
                  }?>
              </td>
              <td align="center"><?= $data['verifikasi']; ?></td>
              <td align="center"><?= $data['tampil_tanggapan']; ?></td>
              <td><?= $data['keterangan']; ?></td>
              <td align="center" width="10%">
                <?php 
                  $sql1 = "SELECT * FROM detail_tanggapan WHERE id_tanggapan = '$id_tanggapan' ORDER BY id_tanggapan";
                  $query1 = mysqli_query($koneksi, $sql1);
                  if(mysqli_num_rows($query1)==0){?> 
                    <a href="verifikasi-edit.php?id_pengaduan=<?= $data['id_pengaduan']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | 
                    <a href="verifikasi-delete.php?id_tanggapan=<?= $data['id_tanggapan']; ?>" class="badge badge-danger p-2 delete-data" title="Delete"><i class="fas fa-trash"></i></a>
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
		$('#masyarakat').dataTable();
	});
</script>

<?php   
include "template/footer.php";
include "template/sticky-footer.php";
?>
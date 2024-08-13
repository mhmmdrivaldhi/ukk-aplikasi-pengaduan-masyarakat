<?php
  $judul = "Tanggapan";
  include "template/templates.php";
?>
<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase text-dark">Rekapitulasi Tanggapan Pengaduan</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12 table-responsive">
      <table class="table table-bordered table-hover" id="tanggapan" width="150%">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>NIK</th>
            <th>Nama </th>
            <th>Tanggal</th>
            <th>Perihal Pengaduan</th>
            <th>Photo</th>
            <th>Detail Pengerjaan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT * FROM tanggapan a RIGHT JOIN pengaduan b ON a.id_pengaduan = b.id_pengaduan INNER JOIN masyarakat c ON b.nik = c.nik WHERE a.verifikasi = 'Y' ORDER BY a.id_tanggapan DESC";
          $query = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) {
            $tanggal1 = date_format(date_create($data['tgl_pengaduan']), "d-m-Y");
            $id_tanggapan = $data['id_tanggapan']; ?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td width="7%"><?= $data['nik']; ?></td>
              <td width="11%"><?= $data['nama']; ?></td>
              <td width="8%"><?= $tanggal1; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td align="center" width="3%">
                <?php 
                if($data['photo_pengaduan']!=""){?>
                  <img src="photo/<?= $data['photo_pengaduan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#potoDisplay" class="photoDisplay" title="Gambar Diperbesar" id="<?= $data['photo_pengaduan']; ?>">
                  <div class="modal" id="potoDisplay" tabindex="-1" role="dialog"></div>
                  <?php 
                }else{?>
                  <img src="photo/no-logo.png" alt="photo" width="40" height="40">
                  <?php 
                }?>
              </td>
              <td width="40%">
                <?php
                  $sql1 = "SELECT * FROM detail_tanggapan a INNER JOIN petugas b ON a.id_petugas = b.id_petugas WHERE a.id_tanggapan = '$id_tanggapan' ORDER BY a.id_tanggapan";
                  $query1 = mysqli_query($koneksi, $sql1);
                  if(mysqli_num_rows($query1)>0){?>
                    <table class="table table-bordered">
                      <th>Tanggal</th>
                      <th>Tanggapan</th>
                      <th>Photo</th>
                      <th>Petugas Perbaikan</th>
                      <th>Aksi</th>
                      <?php 
                      while($data2=mysqli_fetch_array($query1)){?>
                        <tr>
                          <td><?= date_format(date_create($data2['tgl_tanggapan']), "d-m-Y"); ?></td>
                          <td><?= $data2['tanggapan']; ?></td>
                          <td>
                            <?php 
                            if($data2['photo_tanggapan']!=""){?>
                              <img src="photo/<?= $data2['photo_tanggapan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#potoDisplay" class="photoDisplay" title="Gambar Diperbesar" id="<?= $data2['photo_tanggapan']; ?>">
                              <div class="modal" id="potoDisplay" tabindex="-1" role="dialog"></div>
                              <?php 
                            }else{?>
                              <img src="photo/no-logo.png" alt="photo" width="40" height="40">
                              <?php 
                            }?>
                          </td>
                          <td><?= $data2['nama_petugas']; ?></td>
                          <td>
                            <?php 
                            if($nama==$data2['nama_petugas']){?>
                              <a href="detail-tanggapan-delete.php?id_detail_tanggapan=<?= $data2['id_detail_tanggapan']; ?>" class="badge badge-danger p-2 delete-data" title="Delete"><i class="fas fa-trash"></i></a>
                              <?php 
                            }?>
                          </td>
                        </tr>
                        <?php 
                      }?>
                    </table>
                    <?php
                  }
                ?>
              </td>
              <td align="center" width="3%">
                <?php 
                if($data['status']!="Selesai"){?>
                  <a href="tanggapan-edit.php?id_tanggapan=<?= $data['id_tanggapan']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-plus"></i></a>
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

<?php include "template/sticky-footer.php"; ?> 
<?php include "template/footer.php"; ?>
<script>
	$(document).ready(function() {
		$('#tanggapan').dataTable();
	});
</script>
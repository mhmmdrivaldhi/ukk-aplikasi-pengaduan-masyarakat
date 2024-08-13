<?php
  $judul = "Masyarakat";
  include "template/templates.php";
?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase text-dark">Rekapitulasi Pengaduan</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12 table-responsive">
      <button type="button" class="btn btn-primary btn-sm p-1 mb-3" data-toggle="modal" data-target="#staticBackdrop">&nbsp;
        <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah &nbsp;&nbsp;
      </button>

      <table class="table table-bordered table-hover" id="masyarakat" style="width: 110%;">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Tanggal</th>
            <th>Isi Pengaduan</th>
            <th>Foto</th>
            <th>Detail Pengerjaan</th>
            <th>Progres</th>
            <th>Petugas Verifikasi</th>
            <th>Tampil</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT a.id_pengaduan, a.status, a.tgl_pengaduan, a.isi_laporan, a.photo_pengaduan, a.tampil, b.id_tanggapan, b.keterangan, c.nama_petugas FROM pengaduan a LEFT JOIN tanggapan b ON a.id_pengaduan = b.id_pengaduan LEFT JOIN petugas c ON b.id_petugas = c.id_petugas WHERE a.nik = '$nik' ORDER BY a.tgl_pengaduan DESC";
          $query = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) {
            $id_tanggapan = $data['id_tanggapan'];
            $tanggal = date_create($data['tgl_pengaduan']);
            $photo_pengaduan = $data['photo_pengaduan'];
            if($data['status']=='0'){
              $status = "Belum Verval";
            }else if($data['status']=='Ditolak'){
              $status = 'Ditolak - ' . $data['keterangan'];
            }else{
              $status = $data['status'];
            } ?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td width="10%"><?= date_format($tanggal, "d-m-Y"); ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td align="center">
                
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
              <td>
                <?php
                $sql1 = "SELECT * FROM detail_tanggapan a INNER JOIN petugas b ON a.id_petugas = b.id_petugas WHERE a.id_tanggapan = '$id_tanggapan' ORDER BY a.id_tanggapan";
                $query1 = mysqli_query($koneksi, $sql1);
                if(mysqli_num_rows($query1)>0){?>
                  <table class="table table-bordered">
                    <th>Tanggal</th>
                    <th>Tanggapan</th>
                    <th>Photo</th>
                    <th>Petugas Perbaikan</th>
                    <?php 
                    while($data2=mysqli_fetch_array($query1)){?>
                      <tr>
                        <td><?= date_format(date_create($data2['tgl_tanggapan']), "d-m-Y"); ?></td>
                        <td><?= $data2['tanggapan']; ?></td>
                        <td>
                          <?php 
                          if($data2['photo_tanggapan']!=""){?>
                            <img src="photo/kecil-<?= $data2['photo_tanggapan']; ?>" alt="photo" width="40" height="40" data-toggle="modal" data-target="#photoDisplay" class="photoDisplay" title="Gambar Diperbesar">
                            <div class="modal fade" id="photoDisplay" tabindex="-1" role="dialog">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <img src="photo/besar-<?= $data2['photo_tanggapan']; ?>">
                                </div>
                              </div>
                            </div>
                            <?php 
                          }else{?>
                            <img src="photo/no-logo.png" alt="photo" width="40" height="40">
                            <?php 
                          }?>
                        </td>
                        <td><?= $data2['nama_petugas']; ?></td>
                      </tr>
                      <?php 
                    }?>
                  </table>
                  <?php
                }?>
              </td>
              <td><?= $status; ?></td>
              <td><?= $data['nama_petugas']; ?></td>
              <td align="center"><?= $data['tampil']; ?></td>
              <td align="center" width="10%">
                <?php 
                if($status=="Belum Verval"){?>
                  <a href="pengaduan-edit.php?id_pengaduan=<?= $data['id_pengaduan']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | 
                  <a href="pengaduan-delete.php?id_pengaduan=<?= $data['id_pengaduan']; ?>" class="badge badge-danger p-2 delete-data" title="Delete"><i class="fas fa-trash"></i></a>
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
    $('#masyarakat').dataTable();  
	});
</script>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Input Pengaduan
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="pengaduan-simpan.php" method="post" enctype="multipart/form-data">
          <!-- Isi Tanggapan -->
          <div class="input-group input-group-sm mb-1">
            <span class="input-group-text lebar">Isi Pengaduan</span>
            <textarea name="isi_laporan" cols="30" rows="7" class="form-control"></textarea>
          </div>

          <!-- Photo -->
          <div class="input-group mb-1">
            <span class="input-group-text lebar">Photo</span>
            <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
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

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Simpan&nbsp;</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


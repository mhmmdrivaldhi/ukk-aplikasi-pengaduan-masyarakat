<style>
  th{
    vertical-align: middle !important;
    text-align: center;
    background-color: transparent !important;
    height: 30px;
  }
</style>
<?php
  include "koneksi.php";
  $no  = 1;
  $idLaporan     = $_POST['idLaporan'];
  $periodeDari   = $_POST['periodeDari'];
  $periodeSampai = $_POST['periodeSampai'];

  if($idLaporan=="lap_petugas"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>Nama Petugas</th>
          <th>Username</th>
          <th>Telp</th>
          <th>Jabatan</th>
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
            <td><?= $data['level']; ?></td>
          </tr>
          <?php
        } ?>
      </tbody>
    </table>
    <?php 
  }elseif($idLaporan=="lap_masyarakat"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Gender</th>
          <th>Telp</th>
          <th>Email</th>
          <th>Alamat</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM masyarakat";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
          if($data['gender']=="L"){
            $gender = "Laki-aKi";
          }else{
            $gender = "Perempuan";
          }?>
          <tr>
            <td align="center" width="3%"><?= $no++; ?>.</td>
            <td><?= $data['nik']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $gender; ?></td>
            <td><?= $data['telp']; ?></td>
            <td><?= $data['email']; ?></td>
            <td><?= $data['alamat']; ?></td>
          </tr>
          <?php
        } ?>
      </tbody>
    </table>
    <?php 
  }elseif($idLaporan=="lap_pengaduan"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Telp</th>
          <th>Isi Pengaduan</th>
          <th>Photo</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik ORDER BY a.tgl_pengaduan";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
          $tanggal = $data['tgl_pengaduan'];
          $tgl = date_format(date_create($tanggal), "d-m-Y");
          if($tanggal >= $periodeDari && $tanggal <= $periodeSampai){?>
            <tr>
              <td align="center" width="3%"><?= $no++; ?>.</td>
              <td align="center" ><?= $tgl; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?= $data['telp']; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td><img src="photo/<?= $data['photo_pengaduan']; ?>" width="40px" height="40px"></td>
            </tr>
            <?php
          }
        } ?>
      </tbody>
    </table>
    <?php 
  }elseif($idLaporan=="lap_belum_verfal"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Telp</th>
          <th>Isi Pengaduan</th>
          <th>Photo</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik WHERE a.status='0' ORDER BY a.tgl_pengaduan";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
          $tanggal = $data['tgl_pengaduan'];
          $tgl = date_format(date_create($tanggal), "d-m-Y");
          if($tanggal >= $periodeDari && $tanggal <= $periodeSampai){?>
            <tr>
              <td align="center" width="3%"><?= $no++; ?>.</td>
              <td align="center" ><?= $tgl; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?= $data['telp']; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td><img src="photo/<?= $data['photo_pengaduan']; ?>" width="40px" height="40px"></td>
            </tr>
            <?php
          }
        } ?>
      </tbody>
    </table>
    <?php 
  }elseif($idLaporan=="lap_ditolak"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Telp</th>
          <th>Isi Pengaduan</th>
          <th>Photo</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik WHERE a.status='Ditolak' ORDER BY a.tgl_pengaduan";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
          $tanggal = $data['tgl_pengaduan'];
          $tgl = date_format(date_create($tanggal), "d-m-Y");
          if($tanggal >= $periodeDari && $tanggal <= $periodeSampai){?>
            <tr>
              <td align="center" width="3%"><?= $no++; ?>.</td>
              <td align="center" ><?= $tgl; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?= $data['telp']; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td align="center">
                <?php 
                if($data['photo_pengaduan']==""){?>
                  <img src="photo/no-logo.png" width="40px" height="40px">
                  <?php
                }else{?>
                  <img src="photo/<?= $data['photo_pengaduan']; ?>" width="40px" height="40px">
                  <?php 
                }?>
              </td>
            </tr>
            <?php
          }
        } ?>
      </tbody>
    </table>
    <?php 
  }elseif($idLaporan=="lap_proses"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Telp</th>
          <th>Isi Pengaduan</th>
          <th>Photo</th>
          <th>Detail Pengerjaan</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT a.tgl_pengaduan, a.nik, a.photo_pengaduan, a.isi_laporan, b.telp, c.id_tanggapan, b.nama FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik INNER JOIN tanggapan c ON a.id_pengaduan = c.id_pengaduan WHERE a.status='Proses' ORDER BY a.tgl_pengaduan";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
          $tanggal  = $data['tgl_pengaduan'];
          $nama     = $data['nama'];
          $tgl = date_format(date_create($tanggal), "d-m-Y");
          $id_tanggapan = $data['id_tanggapan'];
          if($tanggal >= $periodeDari && $tanggal <= $periodeSampai){?>
            <tr>
              <td align="center" width="3%"><?= $no++; ?>.</td>
              <td align="center" ><?= $tgl; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $nama; ?></td>
              <td><?= $data['telp']; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td align="center"><img src="photo/<?= $data['photo_pengaduan']; ?>" width="40px" height="40px"></td>
              <td>
                <?php
                  $sql1 = "SELECT * FROM detail_tanggapan a INNER JOIN petugas b ON a.id_petugas = b.id_petugas WHERE a.id_tanggapan = '$id_tanggapan' ORDER BY a.id_tanggapan";
                  $query1 = mysqli_query($koneksi, $sql1);
                  if(mysqli_num_rows($query1)>0){?>
                    <table class="table table-bordered">
                      <td>Tanggal</td>
                      <td>Tanggapan</td>
                      <td>Photo</td>
                      <td>Petugas</td>
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
            </tr>
            <?php
          }
        } ?>
      </tbody>
    </table>
    <?php 
  }elseif($idLaporan=="lap_selesai"){?>
    <table class="table table-bordered table-hover table-sm" id="tblPetugas">
      <thead>
        <tr class="text-center">
          <th width="5%">No.</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Telp</th>
          <th>Isi Pengaduan</th>
          <th>Photo</th>
          <th>Detail Pengerjaan</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT a.tgl_pengaduan, a.nik, a.photo_pengaduan, a.isi_laporan, b.telp, c.id_tanggapan, b.nama FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik INNER JOIN tanggapan c ON a.id_pengaduan = c.id_pengaduan WHERE a.status='Selesai' ORDER BY a.tgl_pengaduan";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
          $tanggal  = $data['tgl_pengaduan'];
          $nama     = $data['nama'];
          $tgl = date_format(date_create($tanggal), "d-m-Y");
          $id_tanggapan = $data['id_tanggapan'];
          if($tanggal >= $periodeDari && $tanggal <= $periodeSampai){?>
            <tr>
              <td align="center" width="3%"><?= $no++; ?>.</td>
              <td align="center" ><?= $tgl; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $nama; ?></td>
              <td><?= $data['telp']; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td align="center"><img src="photo/<?= $data['photo_pengaduan']; ?>" width="40px" height="40px"></td>
              <td>
                <?php
                  $sql1 = "SELECT * FROM detail_tanggapan a INNER JOIN petugas b ON a.id_petugas = b.id_petugas WHERE a.id_tanggapan = '$id_tanggapan' ORDER BY a.id_tanggapan";
                  $query1 = mysqli_query($koneksi, $sql1);
                  if(mysqli_num_rows($query1)>0){?>
                    <table class="table table-bordered">
                      <td>Tanggal</td>
                      <td>Tanggapan</td>
                      <td>Photo</td>
                      <td>Petugas</td>
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
            </tr>
            <?php
          }
        } ?>
      </tbody>
    </table>
    <?php 
  }?>
<script>
	$(document).ready(function() {
		$('#tblPetugas').dataTable();
	});
</script>
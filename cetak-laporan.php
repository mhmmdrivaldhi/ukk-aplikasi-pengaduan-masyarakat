<?php 
  session_start();
  $jabatan = $_SESSION['jabatan'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cetak Rekapitulasi Transaksi</title>
    <link rel="shorcut icon" type="text/css" href="img/favicon.png">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css"/>
    <style>
      tr>th{text-align: center; height: 35px; border: 2px solid;}
      tr>td{padding-left: 5px; vertical-align: middle!important;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
    </style>
  </head>
  <body onload="window.print(); window.onafterprint = window.close; ">
  <?php 
    include "koneksi.php";
    $periodeDari   = $_POST['periodeDari'];
    $periodeSampai = $_POST['periodeSampai'];
    $tgl1=date_create($periodeDari);
    $tgl2=date_create($periodeSampai);

    $idLaporan = $_POST['idLaporan'];
    if($idLaporan=="lap_petugas"){?>
      <div class="row">
        <div class="col-xl-8 ml-5 mt-5">
          <span style="font-size: 20px; font-weight:bold;">REKAPITULASI TRANSAKSI</span><br>
          <table class="table table-bordered">
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
              }?>
            </tbody>
          </table>
        </div>
      </div>
      <?php 
    }elseif($idLaporan=="lap_masyarakat"){?>
      <div class="row">
        <div class="col-xl-11 ml-3 mt-5">
          <span style="font-size: 20px; font-weight:bold;">REKAPITULASI IDENTITAS PENGADUAN</span><br>
          <table class="table table-bordered">
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
                  $gender = "Laki-laki";
                }else{
                  $gender = "Perempuan";
                }
                ?>
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
              }?>
            </tbody>
          </table>
        </div>
      </div>
      <?php 
    }elseif($idLaporan=="lap_pengaduan"){?>
      <div class="row">
        <div class="col-xl-11 ml-3 mt-5">
          <span style="font-size: 20px; font-weight:bold;">
            REKAPITULASI IDENTITAS PENGADUAN <br>
            Periode dari <?= $periodeDari; ?> s/d <?= $periodeSampai; ?>
          </span><br>
          
          <table class="table table-bordered table-sm">
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
                    <td align="center"><?= $tgl; ?></td>
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
        </div>
      </div>
      <?php 
    }elseif($idLaporan=="lap_belum_verfal"){?>
      <div class="row">
        <div class="col-xl-11 ml-3 mt-5">
          <span style="font-size: 20px; font-weight:bold;">
            REKAPITULASI PENGADUAN BELUM DIVERIFIKASI <br>
            Periode dari <?= $periodeDari; ?> s/d <?= $periodeSampai; ?>
          </span><br>
          
          <table class="table table-bordered table-sm">
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
                    <td align="center"><?= $tgl; ?></td>
                    <td><?= $data['nik']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['telp']; ?></td>
                    <td><?= $data['isi_laporan']; ?></td>
                    <td> 
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
        </div>
      </div>
      <?php 
    }elseif($idLaporan=="lap_ditolak"){?>
      <div class="row">
        <div class="col-xl-11 ml-3 mt-5">
          <span style="font-size: 20px; font-weight:bold;">
            REKAPITULASI PENGADUAN DITOLAK <br>
            Periode dari <?= $periodeDari; ?> s/d <?= $periodeSampai; ?>
          </span><br>
          
          <table class="table table-bordered table-sm">
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
                    <td align="center"><?= $tgl; ?></td>
                    <td><?= $data['nik']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['telp']; ?></td>
                    <td><?= $data['isi_laporan']; ?></td>
                    <td> 
                      <?php 
                        if($data['photo_pengaduan']==""){?>
                          <img src="photo/no-logo.png" width="40px" height="40px">
                          <?php
                        }else{?>
                          <img src="photo/<?= $data['photo_pengaduan']; ?>" width="40px" height="40px">
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
        </div>
      </div>
      <?php 
    }elseif($idLaporan=="lap_proses"){?>
      <div class="row">
        <div class="col-xl-11 ml-3 mt-5">
          <span style="font-size: 20px; font-weight:bold;">
            REKAPITULASI PENGADUAN SEDANG DALAM PROSES PERBAIKAN <br>
            Periode dari <?= $periodeDari; ?> s/d <?= $periodeSampai; ?>
          </span><br>
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
        </div>
      </div>
      <?php 
    }elseif($idLaporan=="lap_selesai"){?>
      <div class="row">
        <div class="col-xl-11 ml-3 mt-5">
          <span style="font-size: 20px; font-weight:bold;">
            REKAPITULASI PENGADUAN SELESAI DIPERBAIKI <br>
            Periode dari <?= $periodeDari; ?> s/d <?= $periodeSampai; ?>
          </span><br>
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
        </div>
      </div>
      <?php 
    }?>
  </body>
</html>


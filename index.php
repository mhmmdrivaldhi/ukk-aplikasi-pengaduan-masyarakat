<?php
  session_start();
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Masyarakat</title>
    <link rel="shorcut icon" type="text/css" href="img/favicon.png">
    
    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css">
    <link rel="stylesheet" href="css/datatables/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css" >
    <link rel="stylesheet" href="css/styleku.css">
  </head>
  <body>
    <style>
      th,td{vertical-align: middle !important;}
      th{text-align: center;font-weight: bold;}
      .photoDisplay:hover{cursor: pointer;}
    </style>
    <!-- SweetAlert2 -->
	  <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
  
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
      <img src="img/logo.png" alt="Logo" >
      <h1 class="textWarning">Aplikasi Pengaduan Masyarakat</h1>
      <h2 class="textWarning" style="color: green;">Kabupaten Bogor</h2>
      <p class="kopi">Cepat, Tanggap dan Terpercaya</p>
    </div>
    <!-- Akhir Jumbtron -->
    
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg shadow">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-dark" href="#"><img src="img/logo.png" alt="Logo" width="30px" height="30px" class="pt-1 mr-2"> 
          Aplikasi Pengaduan Masyarakat 
      </a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mt-lg-0">
          <li><a href="#about" class="page-scroll">About</a></li>
          <li><a href="#contact" class="page-scroll">Registrasi</a></li>
          <li class="nav-item dropdown no-arrow btn btn-secondary">
            <a href="login.php" style="font-weight: bold;">Login</a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Akhir Navbar  -->

    <!-- About -->
    <section class="about" id="about">
      <div class="container-fluid imgAbout">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="text-dark">About</h2>
            <hr class="hr">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <p class="pKiri">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peranan teknologi informasi yang semakin pesat menjadi bagian dari perkembangan yang tentunya tidak terpisahkan dari masyarakat sampai saat ini, dimana sekarang peran teknologi ini telah memberikan tuntutan besar bagi pemerintah untuk bisa menyediakan pelayanan yang mudah dan cepat, sehingga masyarakat dapat dengan mudah mengajukan / mengadukan apa yang terjadi. <br><br>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada sebuah instansi pengaduan masyarakat sangatlah dibutuhkan, agar dapat mengukur keberhasilan dan kekurangan yang terjadi di masyarakat , dan untuk menerima kritik / pengaduan dari masyarakat. Kebanyakan pengaduan yang dilaporkan masyarakat dibidang kerusakan fasilitas dan pelayanan umum.<br><br>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam pesatnya kemajuan teknologi, setiap pemerintahan berusaha dan meningkatkan kualitas pelayananya. Dimana layanan pengaduan masyarakat merupakan salah satu partisipasi untuk membangun kinerja instansi pemerintahan. Dalam hal ini masih banyak masyarakat yang kesulitan untuk menyampaikan keluhan dan pengaduan yang ada dilingkungannya. Banyak masyarakat menyampaikan keluhan atau pengaduan kepada tempat yang tidak tepat dan hanya berani mengeluh kepada sesama masyarakat.</p>
          </div>
          <div class="col-md-6">
            <p class="pKanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Solusi dari permasalahan ini yang dibutuhkan adalah sebuah aplikasi laporan / layanan pengaduan masyarakat, dengan adanya aplikasi layanan pengaduan masyarakat diharapkan bisa memudahkan masyarakat menyampaikan keluhan atau pengaduannya, serta dapat meningkatkan pelayanan pengaduan di instansi pemerintah desa. <br><br>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manfaat aplikasi pengaduan masyarakat ini antara lain: <br><hr> 
            - Dapat menyalurkan aspirasi keluhan dan pengaduan masyarakat. <br><br>
            - Melatih masyarakat agar mampu untuk malaporkan pengaduan Pelayanan public melalui aplikasi. <br><br>
            - Memudahkan pelayanan pengaduan dari masyarakat. <br><br>
            - Memudahkan pemerintahan / petugas mendapatkan informasi Keluhan yang  masyarakat alami dan laporkan. <br><br>
            - Mendorong peningkatan kualitas pelayanan pengaduan masyarakat. <br>
            
            
            </p>
          </div>
        </div>
      </div>
      
    </section>
    <!-- Akhir About  -->
  
    
    <!-- Akhir Menu -->

    <!-- Registrasi -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Registrasi</h2>
            <hr class="hr">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-10" style="margin-left: 200px;">
            <form name="formContact" method="post" action="masyarakat-simpan.php">
              <!-- NIK -->
              <div class="form-group">
                <label class="col-sm-3 control-label">NIK</label>
                <div class="col-sm-9">
                  <input name="nik" type="text" class="form-control" placeholder="Masukkan NIK..." autocomplete="off" required>
                </div>
              </div>

              <!-- Nama -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                  <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama..." autocomplete="off" required>
                </div>
              </div>

              <!-- Gender -->
              <div class="form-group">
                <label class="col-sm-3">Gender</label>
                <div class="col-sm-9">
                  <select name="gender" class="form-control" required>
                    <option value="">Pilih Gender</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
              </div>

              <!-- Email -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="form-control"  placeholder="Masukan Email..." autocomplete="off" onKeyUp="testEmailChars(this);"> <small id="cekEmail"></small required>
                </div>
              </div>

              <!-- Username -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                  <input name="username2" type="text" class="form-control" placeholder="Masukan Username..." autocomplete="off" required>
                </div>
              </div>

              <!-- Password -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input name="password2" type="password"  class="form-control"  placeholder="Masukkan Password..." autocomplete="off" required>
                </div>
              </div>

              <!-- Telp -->
              <div class="form-group">
                <label class="col-sm-3 control-label">No. Telp / WA</label>
                <div class="col-sm-9">
                  <input name="telp" type="text" class="form-control" placeholder="Masukkan No Telp..." autocomplete="off" required>
                </div>
              </div>

              <!-- Alamat -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                  <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat..." cols="30" rows="3" required></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <input name='buatAkun' type="submit" class="btn btn-primary" value="Register" style="width:100px; display:inline-block; ">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Registrasi -->

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p class="footer">&copy;mhmmdrivaldhi | SMK Plus Pelita Nusantara</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
	  <script src="js/datatables/jquery.dataTables.min.js"></script>
	  <script src="js/datatables/dataTables.bootstrap4.min.js"></script>
	
    <script src="js/sweetalert2.all.min.js"></script>
	  <script src="js/style-sweetalert2.js"></script>
    <script src="js/script.js"></script>
    <script>
      $(document).ready(function () {
        $('#rekap').dataTable();
        $(document).on("click", ".buatAkun", function () {
          var nama      = $('[name="nama"]').val();
          var email     = $('[name="email"]').val();
          var cekEmail  = $('#cekEmail').text();
          var username  = $('[name="username2"]').val();
          var password  = $('[name="password2"]').val();
          var telp      = $('[name="telp"]').val();
          var alamat    = $('[name="alamat"]').val();
          if (nama == "") {
            Swal.fire('Nama belum diisi!');
            return false;
          } else if (email == "") {
            Swal.fire('Email belum diisi!');
            return false;
          } else if (cekEmail != "valid") {
            Swal.fire('format Email salah!');
            return false;
          } else if (username == "") {
            Swal.fire('username belum diisi!');
            return false;
          } else if (password == "") {
            Swal.fire('Password belum diisi!');
            return false;
          } else if (telp == "") {
            Swal.fire('Telp belum diisi!');
            return false;
          } else if (alamat == "") {
            Swal.fire('alamat belum diisi!');
            return false;
          }
        });
      });

      // Cek Validasi Email
      function testEmailChars(){
        var rs = document.forms["formContact"]["email"].value;
        var atps=rs.indexOf("@");
        var dots=rs.lastIndexOf(".");
        if (atps<1 || dots<atps+2 || dots+2>=rs.length) {
          $("#cekEmail").html("not valid");
        } else {
	        $("#cekEmail").html("valid");
        }
      }


    </script>
    
   </body>
</html>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
  <img src="img/logo.png" alt="logo" width="60px" height="60px">
    <span class="sidebar-brand-text mx-3"><?= $judul; ?></span>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard </span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php
    if($jabatan=="admin"){?>
      <!-- Administrator Login -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="petugas.php" >
          <i class="fas fa-fw fa-user"></i>
          <span>Petugas Login</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Verifikasi -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="verifikasi.php" >
          <i class="fas fa-fw fa-user"></i>
          <span>Admin Verifikasi</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Tanggapan -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="tanggapan.php" >
          <i class="fas fa-clipboard-list"></i>
          <span>Tanggapan</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Laporan user -->
      <li class="nav-item">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Laporan-laporan</span>
        </a>
      </li>
      <?php 
    }else if($jabatan=="petugas"){?>
      <!-- Verifikasi -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="verifikasi.php" >
          <i class="fas fa-fw fa-user"></i>
          <span>Petugas Verifikasi</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Tanggapan -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="tanggapan.php" >
          <i class="fas fa-fw fa-user"></i>
          <span>Tanggapan</span>
        </a>
      </li>
      <?php 

    }else if($jabatan=="masyarakat"){?>
      <!-- Pengaduan -->
      <li class="nav-item">
        <a class="nav-link" href="pengaduan.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Pengaduan</span>
        </a>
      </li>
      <?php 
    }
  ?>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline mt-3">
    <button class="rounded-circle border-0 bg-warning" id="sidebarToggle"></button>
  </div>
</ul>

<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
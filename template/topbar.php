<nav class="navbar navbar-expand topbar static-top shadow">
  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Hover -->
  <div class="d-none d-sm-inline-block ml-md-3 my-2 my-md-0 mw-100 h3" >
    <marquee width="265%" behavior="" direction="left">Selamat Datang <?= $nama; ?></marquee> 
  </div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img-profile rounded-circle mr-3" src="img/<?= $photo; ?>" title="<?= $nama; ?>" >
      </a>

      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
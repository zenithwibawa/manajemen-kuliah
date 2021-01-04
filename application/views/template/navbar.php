  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Are you sure want to logout?')">
            <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
    
  </nav>
  <!-- /.navbar -->
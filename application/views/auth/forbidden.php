<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $string; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    html {
        height: 100%;
    }
    body{
        background-color:#f4f6f9;
    }
    .content-wrapper{
        display: flex;
        flex-wrap: wrap;
        align-content: center;
    }
    .main-footer{
        width: 100%;
        bottom: 0px;
        left: 0;
        margin: 0px !important;
        position: fixed;
        background-color: #f4f6f9;
    }
  </style>
</head>
<body>
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mx-auto">

    <!-- Main content -->
    <section class="content mx-auto">
      <div class="error-page">
        <h2 class="headline text-danger">403</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger mt-4"></i> Oops! Access is forbidden.</h3>

          <p>
            You don't have permission to access on this page.
            Meanwhile, you may <a href="<?= base_url(strtolower($this->session->userdata('role'))); ?>">return to dashboard</a>
          </p>

        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    Copyright &copy; <strong>Zenith Wibawa</strong> 2020-<?php echo date("Y"); ?>. All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
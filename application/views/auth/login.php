<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sistem</b> Manajemen</a>
  </div>
  <!-- /.login-logo -->
  <?= $this->session->flashdata('message'); ?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login to start your session</p>

      <form action="<?= base_url('auth'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if ($this->session->flashdata('email') != ""){
                                                                                                    echo $this->session->flashdata('email');
                                                                                                 } else echo set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="input-group">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="input-group">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
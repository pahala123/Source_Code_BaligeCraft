<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-5">
          <img src="<?= base_url('assets/images/Produk/register.png'); ?>" class="login-card-img">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <p class="login-card-description">Register</p>
            <form method="post" action=" <?= base_url('auth/register'); ?>">
              <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="username" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
                <?= form_error('username', '<small class="text-danger pl-2">', '</small>') ?>
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="<?php echo set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
              </div>
              <div class="form-group mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                <?= form_error('password', '<small class="text-danger pl-2">', '</small>') ?>
              </div>
              <div class="form-group mb-4">
                <label for="password_confirm" class="sr-only">Re-Type Password</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Re-Type Password" value="<?php echo set_value('password_confirm'); ?>">
                <?= form_error('password_confirm', '<small class="text-danger pl-2">', '</small>') ?>
              </div>
              <input name="register" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Register">
            </form>
            <p class="login-card-footer-text">Sudah Punya Akun?
              <a href="auth/index_login" class="text-reset" style="color:aliceblue">Login</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
  </div>
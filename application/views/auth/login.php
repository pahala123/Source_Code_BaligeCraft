<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-5">
          <img src="<?= base_url('assets/images/Produk/login.jpg'); ?>" class="login-card-img">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <p class="login-card-description">Login</p>
            <?= $this->session->flashdata('pesan') ?>
            <form method="post" action=" <?= base_url('auth/index_login'); ?>">
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" onkeyup="s()">
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="***********" onkeyup="s()">
                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
              </div>
              <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
            </form>
            <a href=" <?= base_url('auth/forgot'); ?>" class="forgot-password-link">Forgot password?</a>
            <p class="login-card-footer-text">Belum Punya akun?
              <a href="register" class="text-reset" style="color:aliceblue">Daftar</a>
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php if (@$_SESSION['pesan']) {
  ?>
  <?php unset($_SESSION['pesan']);
  } ?>

  <script type="text/javascript">
    function s() {
      var i = document.getElementById("email");
      var j = document.getElementById("password").value;
      if (i.value == "" || j.length < 4) {
        document.getElementById("start_button").disabled = true;
      } else {
        document.getElementById("start_button").disabled = false;
      }
    }
  </script>
  <?php if (@$_SESSION['pesan']) {
  ?>
  <?php unset($_SESSION['pesan']);
  } ?>
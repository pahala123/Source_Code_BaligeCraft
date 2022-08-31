<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="<?= base_url('assets/images/Produk/login.jpg'); ?>" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <p class="login-card-description">Reset Password</p>
                        <?= $this->session->flashdata('pesan') ?>
                        <form method="post" action=" <?= base_url('auth/ubahPassword'); ?>">
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Reset Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
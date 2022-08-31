<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">

                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama'); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="<?= base_url('assets/images/Logo/logo.png'); ?>" class="img-sidebar" style="max-width: 170px; margin-top: 20px;">
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="nav-item dropdown ">
                            <a href="index" class="<?php echo base_url('admin/index') ?>"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-user"></i> <span>Pelanggan</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-user-tag"></i> <span>Penjual</span></a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link has-dropdown"><i class="fa fa-box"></i> <span>Produk</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url('admin/dataproduk') ?>">Data Produk</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="#">Edit Produk</a></li>
                                <li><a class="nav-link" href="<?php echo base_url('admin/datakategori') ?>">Kategori Produk</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('admin/datapesanan') ?>" class="nav-link"><i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link"><i class="fa fa-search-location"></i> <span>Tracking</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('admin/datapembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link"><i class="fas fa-pen"></i> <span>Ulasan Produk</span></a>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Tambah Produk</h1>
                    </div>

                    <div class="row">

                        <div class="col-12 col-md-6 col-lg-12">

                            <div class="card">
                                <form method="post" class="needs-validation" action="<?php echo base_url('admin/tambah') ?>">
                                    <div class="card-header">
                                        <h4>Tambah Produk</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Nama Produk</label>
                                                <input type="text" name="produk_nama" id="produk_nama" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Gambar Produk</label>
                                                <div class="custom-file">
                                                    <input type="file" name="produk_gambar" class="form-control" id="produk_gambar">
                                                    <?= form_error('produk_gambar', '<small class="text-danger">', '</small>') ?>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Harga Produk</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp
                                                        </div>
                                                    </div>
                                                    <input type="text" name="produk_harga" id="produk_harga" class="form-control currency">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Kuantitas/Stok</label>
                                                <input type="text" name="produk_kuantitas" id="produk_kuantitas" class="form-control">

                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Berat</label>
                                                <input type="text" name="produk_berat" id="produk_berat" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Warna</label>
                                                <input type="text" name="produk_warna" id="produk_warna" class="form-control">

                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Produk Terbaik</label>
                                                <div class="controls">
                                                    <select id="produk_terbaik" name="produk_terbaik" class="form-control">
                                                        <option value="1">Terbaik</option>
                                                        <option value="0">Tidak Terbaik</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Kategori</label>
                                                <div class="controls">
                                                    <select name="produk_kategori" class="form-control">
                                                        <?php foreach ($kategori as $kategori) { ?>
                                                            <option value="<?php echo $kategori->id; ?>"><?php echo $kategori->kategori_nama; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Status</label>
                                                <div class="controls">
                                                    <select id="produk_status" name="produk_status" class="form-control">
                                                        <option value="1">Published</option>
                                                        <option value="0">UnPublished</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Deskripsi Pendek</label>
                                                <textarea name="produk_deskripsi_pendek" class="form-control summernote-simple"></textarea>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Deskripsi Panjang</label>
                                                <textarea name="produk_deskripsi_panjang" class="form-control summernote-simple"></textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Kelompok 15</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

</body>

</html>

<script>
    document.getElementById('produk_status').value = <?php echo $produk_edit->produk_status; ?>;
    document.formName.product_feature.value = <?php echo $produk_edit->produk_terbaik; ?>;
    document.getElementById('produk_kategori').value = <?php echo $produk_edit->produk_kategori; ?>;
</script>
<script src="<?= base_url('assets/js/pf-3.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (@$_SESSION['error']) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Tidak Berhasil',
            text: 'File Gambar tidak support'
        });
    </script>
<?php unset($_SESSION['error']);
} ?>
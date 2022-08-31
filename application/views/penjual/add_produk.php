<body class="layout-2">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="navbar-header">
                        <div class="logo-navigasi">
                            <img src="<?= base_url('assets/images/Logo/logo1.png'); ?>" alt="" class="img1">
                            <img src="<?= base_url('assets/images/Logo/logo.png'); ?>" alt="" class="img2">
                        </div>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="<?php echo base_url('penjual') ?>" class="nav-link home">Beranda</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Produk</a></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Layanan</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                    </ul>
                </div>
                <div class="attr-nav">
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown" style="margin-left: 170px;" data-toggle="dropdown">
                                <span class="lnr lnr-cart"></span>
                                <span class="badge badge-bg-1"><?php echo $this->cart->total_items(); ?></span>
                            </a>
                        </li>
                        <li class="nav-item submenu dropdown active">
                            <a href="#" class="nav-link dropdown user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hi, <?php echo $this->session->userdata('nama'); ?>
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('penjual/profile') ?>"><span class="lnr lnr-user">Akun Saya</span> </a></li>
                                <li class="nav-item"><a class="nav-link" href="penjual/settings"><span class="lnr lnr-cog"> Settings</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('penjual/logout') ?>"><span class="lnr lnr-exit"> Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Pembeli</li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/akun') ?>" class="nav-link">
                                <i class="fa fa-desktop"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/editprofile') ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span>Edit Profile</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url('penjual/order') ?>">
                                <i class="fa fa-clipboard-list"></i>
                                <span>Pesanan Saya</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url('penjual/pembayaran') ?>">
                                <i class="fa fa-credit-card"></i>
                                <span>Pembayaran Saya</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="credits.html">
                                <i class="fa fa-pen"></i>
                                <span>Ulasan Produk</span></a>
                        </li>
                        <li class="menu-header">Menu Penjual</li>
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('penjual/dataproduk') ?>" class="nav-link">
                                <i class="fa fa-box"></i> <span>Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('admin/datapesanan') ?>" class="nav-link">
                                <i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('admin/datapembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
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
                                <form method="post" class="needs-validation" action="<?php echo base_url('penjual/tambah') ?>" enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h4>Tambah Produk</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Nama Produk</label>
                                                <input type="text" name="produk_nama" id="produk_nama" class="form-control">
                                                <?= form_error('produk_nama', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Gambar Produk</label>
                                                <input type="file" name="produk_gambar" id="produk_gambar" class="form-control">

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
                                                <?= form_error('produk_harga', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Kuantitas/Stok</label>
                                                <input type="text" name="produk_kuantitas" id="produk_kuantitas" class="form-control">
                                                <?= form_error('produk_kuantitas', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Berat Barang</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Kg
                                                        </div>
                                                    </div>
                                                    <input type="text" name="produk_berat" id="produk_berat" class="form-control currency">

                                                </div>
                                                <?= form_error('produk_berat', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Warna</label>
                                                <input type="text" name="produk_warna" id="produk_warna" class="form-control">
                                                <?= form_error('produk_warna', '<small class="text-danger">', '</small>') ?>
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
                                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin Menambah Produk?');">Simpan</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> Develop By <a href="#">Kelompok 15
                        TA</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('assets/js/pf-3.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (@$_SESSION['add-produk-image-failed']) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Tidak Berhasil',
                text: 'File Gambar tidak support'
            });
        </script>
    <?php unset($_SESSION['add-produk-image-failed']);
    } ?>
    <?php if (@$_SESSION['add-produk-success']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil Tambah Produk'
            });
        </script>
    <?php unset($_SESSION['add-produk-success']);
    } ?>

    <?php if (@$_SESSION['add-produk-failed']) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Tidak Berhasil',
                text: 'Tidak Berhasil Tambah Produk'
            });
        </script>
    <?php unset($_SESSION['add-produk-failed']);
    } ?>
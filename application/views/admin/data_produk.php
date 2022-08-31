<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <div class="search-element">

                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
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
                            <a href="index" class="nav-link"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
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
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fas fa-pen"></i> <span>Ulasan Produk</span></a>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title; ?></h1>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">

                            <div class="card">

                                <div class="card-body">
                                    <div>
                                        <a href="<?php echo base_url('admin/tambah') ?>" class="btn btn-success btn-lg">
                                            <i class="fa fa-plus"></i> Tambah Produk
                                        </a>
                                    </div>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($produk as $produk) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $produk->produk_nama; ?></td>
                                                    <td><img src="<?php echo base_url('assets/upload/image/' . $produk->produk_gambar); ?>" style="width:30%;" /></td>
                                                    <td><?php echo $produk->kategori_nama; ?></td>
                                                    <td>
                                                        <?php

                                                        if ($produk->produk_status == 1) { ?>
                                                            <span class="badge badge-success">Published</span>
                                                        <?php
                                                        } else { ?>
                                                            <span class="badge badge-danger">Unpublished</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($produk->produk_status == 0) { ?>
                                                            <a class="btn btn-success" href="<?php echo base_url('admin/published_product/' . $produk->produk_id); ?>">
                                                                <i class="fa fa-upload"></i>
                                                            </a>
                                                        <?php } else {
                                                        ?>
                                                            <a class="btn btn-danger" href="<?php echo base_url('admin/unpublished_product/' . $produk->produk_id); ?>">
                                                                <i class="fa fa-upload"></i>
                                                            </a>
                                                        <?php }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer text-right">
                                    <nav class="d-inline-block">
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (@$_SESSION['edit-produk-failed']) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Tidak Berhasil',
            text: 'Data Produk tidak sesuai'
        });
    </script>
<?php unset($_SESSION['edit-produk-failed']);
} ?>


<?php if (@$_SESSION['edit-produk-success']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Edit Produk'
        });
    </script>
<?php unset($_SESSION['edit-produk-success']);
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

<?php if (@$_SESSION['publish-produk-success']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Publish Produk'
        });
    </script>
<?php unset($_SESSION['publish-produk-success']);
} ?>

<?php if (@$_SESSION['unpublish-produk-success']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Unpublish Produk'
        });
    </script>
<?php unset($_SESSION['unpublish-produk-success']);
} ?>
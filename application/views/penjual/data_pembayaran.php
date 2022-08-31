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
                        <li class="nav-item dropdown ">
                            <a href="<?php echo base_url('penjual/dataproduk') ?>" class="nav-link">
                                <i class="fa fa-box"></i> <span>Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/datapesanan') ?>" class="nav-link">
                                <i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('penjual/datapembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
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
                                <?php if (count($payments) > 0) : ?>
                                    <div class="card-body">

                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Pembayaran</th>
                                                    <th scope="col">Pembeli</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($payments as $payment) : ?>
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $payment->id; ?>
                                                        </th>
                                                        <td>#<?php echo anchor('penjual/pembayaran_detail/' . $payment->id, $payment->order_number); ?></td>
                                                        <td>
                                                            <?php echo $payment->user; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo get_formatted_date($payment->payment_date); ?>
                                                        </td>
                                                        <td>
                                                            Rp <?php echo format_rupiah($payment->payment_price); ?>
                                                        </td>
                                                        <td><?php echo get_payment_status($payment->payment_status); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
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
                                    <?php echo $pagination; ?>
                                <?php else : ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="alert alert-primary">
                                                    Belum ada data produk yang ditambahkan. Silahkan menambahkan baru.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i class="fa fa-plus"></i> Tambah produk baru</a>
                                                <br>
                                                <a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i> Kelola kategori</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
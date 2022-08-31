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
                        <li class="nav-item"><a href="<?php echo base_url('user') ?>" class="nav-link home">Beranda</a></li>
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
                                Hi, <?php echo $this->session->userdata('username'); ?>
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('user/profile') ?>"><span class="lnr lnr-user">Akun Saya</span> </a></li>
                                <li class="nav-item"><a class="nav-link" href="user/settings"><span class="lnr lnr-cog"> Settings</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('user/logout') ?>"><span class="lnr lnr-exit"> Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div>
                    <ul class="sidebar-menu">
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('user/akun') ?>" class="nav-link">
                                <i class="fa fa-desktop"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('user/profile') ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span>Edit Profile</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url('user/order') ?>">
                                <i class="fa fa-clipboard-list"></i>
                                <span>Pesanan Saya</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url('user/pembayaran') ?>">
                                <i class="fa fa-credit-card"></i>
                                <span>Pembayaran Saya</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="credits.html">
                                <i class="fa fa-pen"></i>
                                <span>Ulasan Produk</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Hi, <?php echo $this->session->userdata('username'); ?></h2>
                        <p class="section-lead">
                            Selamat Datang di Dashboard !
                        </p>

                        <div class="row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card profile-widget">
                                    <div class="profile-widget-header">
                                        <img alt="image" src="<?php echo base_url('assets/upload/user/' . $foto); ?>
                                        " class="rounded-circle profile-widget-picture" style="width:100px; height:100px;">

                                        <div class=" profile-widget-items">
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Total Pesanan : 180
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-widget-description">
                                        <div class="profile-widget-name"> <?php echo $this->session->userdata('username'); ?>
                                        </div>
                                        <?php echo $bio; ?>
                                    </div>
                                </div>
                            </div>
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
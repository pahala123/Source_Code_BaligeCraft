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
                        <li class="nav-item submenu dropdown">
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
                        <li class="nav-item dropdown">
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
                        <div class="col-md-8">
                            <div class="card-wrapper">
                                <div class="card">
                                    <?php if ($flash) : ?>
                                        <span class="float-right text-success font-weight-bold" style="margin-top: 20px; margin-left: 20px"><?php echo $flash; ?></span>
                                        <div class="card-header">

                                            <h3 class="mb-0">Pembayaran #<?php echo $payment->order_number; ?></h3>

                                        <?php endif; ?>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table align-items-center table-flush table-hover">
                                                <tr>
                                                    <td>Transfer</td>
                                                    <td><b>Rp <?php echo format_rupiah($payment->payment_price); ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td><b><?php echo get_formatted_date($payment->payment_date); ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td><b>
                                                            <?php if ($payment->payment_status == 1) : ?>
                                                                <span class="badge badge-info">Menunggu konfirmasi</span>
                                                            <?php elseif ($payment->payment_status == 2) : ?>
                                                                <span class="badge badge-success">Dikonfirmasi</span>
                                                            <?php elseif ($payment->payment_status == 3) : ?>
                                                                <span class="badge badge-danger">Gagal</span>
                                                            <?php endif; ?>
                                                        </b></td>
                                                </tr>
                                                <tr>
                                                    <td>Transfer ke</td>
                                                    <td>
                                                        <div style="white-space: initial;"><b>
                                                                <?php
                                                                $bank_data = json_decode($payment->payment_data);
                                                                $bank_data  = (array) $bank_data;
                                                                $transfer_to = $bank_data['transfer_to'];

                                                                $transfer_to = $banks[$transfer_to];
                                                                $transfer_from = $bank_data['source'];
                                                                ?>
                                                                <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                                                            </b></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Transfer dari</td>
                                                    <td>
                                                        <div style="white-space: initial;">
                                                            <b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="mb-0">Bukti Pembayaran</h3>
                                </div>
                                <div class="card-body p-0">
                                    <img alt="Pembayaran Order #<?php echo $payment->order_number; ?>" class="img img-fluid" src="<?php echo base_url('assets/upload/payments/' . $payment->picture_name); ?>">
                                </div>
                                <div class="card-footer">
                                    <form action="<?php echo site_url('penjual/verifikasi_pembayaran'); ?>" method="POST">
                                        <input type="hidden" name="redir" value="1">

                                        <div class="row">
                                            <input type="hidden" name="id" value="<?php echo $payment->id; ?>">
                                            <input type="hidden" name="order" value="<?php echo $payment->order_id; ?>">
                                            <div class="col-md-9">
                                                <select class="form-control" name="action">
                                                    <?php if ($payment->payment_status == 1) : ?>
                                                        <option value="1">Konfirmasi Pembayaran</option>
                                                        <option value="2">Pembayaran Tidak Ada</option>
                                                    <?php else : ?>
                                                        <option value="4" readonly>Tidak ada pilihan</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <input type="submit" class="btn btn-primary" value="OK">
                                            </div>
                                        </div>
                                    </form>
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
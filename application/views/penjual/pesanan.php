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
                        <li class="nav-item"><a href="#" class="nav-link">Layanan</a></li>
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
                                <li class="nav-item"><a class="nav-link" href="penjual/akun"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
                                <li class="nav-item"><a class="nav-link" href="penjual/settings"><span class="lnr lnr-cog"> Settings</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="logout"><span class="lnr lnr-exit"> Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <ul class="sidebar-menu">
                        <li class="nav-item dropdown ">
                            <a href="<?php echo base_url('penjual/akun') ?>" class="nav-link">
                                <i class="fa fa-desktop"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/editprofile') ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span>Edit Profile</span></a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link " href="<?php echo base_url('penjual/order') ?>">
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
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Pesanan Saya</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item">Profile</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            <div class="card-body <?php echo (count($orders) > 0) ? ' p-0' : ''; ?>">
                                <?php if (count($orders) > 0) : ?>
                                    <table class=" table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">ID Pesanan</th>
                                                <th scope="col">Jumlah Pesanan</th>
                                                <th scope="col">Total Pesanan</th>
                                                <th scope="col">Metode Pembayaran</th>
                                                <th scope="col">Tanggal Pesanan</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $order) : ?>
                                                <tr>
                                                    <td><?php echo $order->penjual_id; ?></td>
                                                    <td><?php echo anchor('pesanan/order_view/' . $order->penjual_id, '#' . $order->order_number); ?></td>
                                                    <td><?php echo $order->total_items; ?> barang</td>
                                                    <td>Rp <?php echo format_rupiah($order->total_price); ?></td>
                                                    <td><?php echo ($order->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat'; ?></td>
                                                    <td><?php echo get_formatted_date($order->order_date); ?></td>
                                                    <td><?php echo get_order_status($order->order_status, $order->payment_method); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else : ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="alert alert-info">
                                                Belum ada data order.
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <?php if ($pagination) : ?>
                                <div class="card-footer">
                                    <?php echo $pagination; ?>
                                </div>
                            <?php endif; ?>
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
    <?php
    if ($this->session->flashdata('edit-password-siswa-failed')) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ups... Gagal',
                text: 'Password Lama Anda Tidak Sesuai'
            });
        </script>
    <?php
    }
    if ($this->session->flashdata('edit-profil')) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil Ubah Data Diri'
            });
        </script>
    <?php
    }

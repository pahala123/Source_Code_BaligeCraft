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
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('penjual/datapesanan') ?>" class="nav-link">
                                <i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/datapembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="checkStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo base_url() ?>transaction/process" method="POST">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cek Status Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="orderid" col-form-label">Order ID/Invoice</label>
                                    <input type="text" required class="form-control" name="order_id" id="orderid" autocomplete="off">
                                </div>
                                <input type="hidden" name="action" value="status">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title; ?></h1>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#checkStatus">Status</button>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">

                            <div class="card">
                                <?php if (count($orders) > 0) : ?>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nama Pembeli</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Jumlah Item</th>
                                                    <th scope="col">Jumlah Harga</th>
                                                    <th scope="col">Order Status</th>
                                                    <th scope="col">Pembayaran Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orders as $order) : ?>
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo anchor('penjual/pesanan_view/' . $order->id, '#' . $order->order_number); ?>
                                                        </th>
                                                        <td><?php echo $order->user; ?></td>
                                                        <td>
                                                            <?php echo get_formatted_date($order->order_date); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $order->total_items; ?>
                                                        </td>
                                                        <td>
                                                            Rp <?php echo format_rupiah($order->total_price); ?>
                                                        </td>

                                                        <?php if ($order->pesanan_status == 0) { ?>
                                                            <td>Belum di proses</td>
                                                        <?php } else if ($order->pesanan_status == 1) { ?>
                                                            <td>Belum diproses</td>
                                                        <?php } else if ($order->pesanan_status == 2) { ?>
                                                            <td>Sedang diproses</td>
                                                        <?php } else if ($order->pesanan_status == 3) { ?>
                                                            <td>Sedang dikirim</td>
                                                        <?php } else if ($order->pesanan_status == 4) { ?>
                                                            <td>Selesai</td>
                                                        <?php } ?>
                                                        <?php if ($order->order_status == 'pending') { ?>
                                                            <td>Belum dibayar</td>
                                                        <?php } else if ($order->order_status == 'settlement') { ?>
                                                            <td>Lunas</td>
                                                        <?php } else if ($order->order_status == 'cancel') { ?>
                                                            <td>Dibatalkan</td>
                                                        <?php } else if ($order->order_status == 'failure') { ?>
                                                            <td>Gagal</td>
                                                        <?php } else { ?>
                                                            <td>Belum dibayar</td>
                                                        <?php } ?>

                                                        <td>
                                                            <a href="<?= base_url(); ?>penjual/pesanan_view/<?= $order->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php echo $pagination; ?>
                                <?php else : ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="alert alert-primary">
                                                    Belum ada data pesanan pembeli
                                                </div>
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
    <?php if (@$_SESSION['status-success']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Status Pembayaran Berhasil'
            });
        </script>
    <?php unset($_SESSION['status-success']);
    } ?>
    <?php if (@$_SESSION['upload']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Pesanan Berhasil Dikonfirmasi'
            });
        </script>
    <?php unset($_SESSION['upload']);
    } ?>

    <?php if (@$_SESSION['upload-process']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Pesanan Berhasil Diproses'
            });
        </script>
    <?php unset($_SESSION['upload-process']);
    } ?>

    <?php if (@$_SESSION['upload-sending']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Pesanan sedang dikirim dan Resi telah di input'
            });
        </script>
    <?php unset($_SESSION['upload-sending']);
    } ?>
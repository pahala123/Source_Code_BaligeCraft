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
                        <li class="nav-item dropdown">
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

            <div class="modal fade" id="sendingOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="<?= base_url(); ?>penjual/sending_order/<?= $data->order_number; ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Kirim Resi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Pastikan Anda sudah mengirim barang kepada kurir dan mendapatkan nomor resi.</p>
                                <div class="form-group">
                                    <label for="resi">Masukan Nomor Resi</label>
                                    <input type="text" required name="resi" id="resi" class="form-control" autocomplete="off">
                                </div>
                                <small class="text-muted">Setelah menekan tombol dibawah Anda tidak bisa mengubah nomor resi yang sudah Anda masukan.</small>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title; ?></h1>
                    </div>
                    <?php if ($data->courier == "cod") { ?>
                        <?php if ($data->pesanan_status != 4) { ?>
                            <a href="<?= base_url(); ?>penjual/finish_order_cod/<?= $data->order_number; ?>" onclick="return confirm('Yakin pesanan ini sudah selesai?');" class="btn btn-success btn-sm">Selesai</a>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if ($data->order_status == 'settlement' && $data->pesanan_status == 0) { ?>
                            <a href="<?= base_url(); ?>penjual/process_order/<?= $data->order_number; ?>" onclick="return confirm('Yakin ingin mengubah status pesanan menjadi sedang di proses?');" class="btn btn-info btn-sm">Proses Pesanan</a>
                        <?php } else if ($data->pesanan_status == 2) { ?>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#sendingOrder">Pesanan Dikirim</button>
                            <a href="<?= base_url(); ?>penjual/sending_order/<?= $data->order_number; ?>"></a>
                        <?php } ?>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-wrapper">
                                <div class="card">


                                    <div class="card-header">
                                        <h3 class="mb-0">Data Pesanan</h3>

                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table align-items-center table-flush table-striped">
                                            <tr>
                                                <td>Nomor</td>
                                                <td><b>#<?php echo $data->order_number; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td><b><?php echo get_formatted_date($data->order_date); ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Item</td>
                                                <td><b><?php echo $data->total_items; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td><b>Rp <?php echo format_rupiah($data->total_price); ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Metode pembayaran</td>
                                                <td><b><?php echo ($data->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat'; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><b class="statusField">
                                                        <?php if ($data->pesanan_status == 4) { ?>
                                                            <b>Transaksi Selesai</b>
                                                        <?php } else if ($data->pesanan_status == 0) { ?>
                                                            <?php if ($data->order_status == 'pending') { ?>
                                                                <b> class="lead">Belum dibayar</b>
                                                            <?php } else if ($data->order_status == 'settlement') { ?>
                                                                <b>Sudah dibayar</b>
                                                            <?php } else if ($data->order_status == 'cancel') { ?>
                                                                <b>Dibatalkan</b>
                                                            <?php } else if ($data->order_status == 'failure') { ?>
                                                                <b>Gagal</b>
                                                            <?php } else { ?>
                                                                <b>Belum dibayar</b>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </b></td>
                                            </tr>

                                        </table>
                                    </div>

                                </div>
                            </div>
                            <br>


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="mb-0">Barang dalam pesanan</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Jumlah beli</th>
                                                <th scope="col">Harga satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($items as $item) : ?>
                                                <tr>
                                                    <td>
                                                        <img style="width: 25%;" alt="<?php echo $item->produk_nama; ?>" src="<?php echo base_url('assets/upload/image/' . $item->produk_gambar); ?>">
                                                    </td>
                                                    <td>
                                                        <h5 class="mb-0"><?php echo $item->produk_nama; ?></h5>
                                                    </td>
                                                    <td><?php echo $item->order_qty; ?></td>
                                                    <td>Rp <?php echo format_rupiah($item->order_price); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="mb-0">Data Penerima</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table align-items-center table-flush table-hover">
                                    <tr>
                                        <td>Nama</td>
                                        <td><b><?php echo $delivery_data->user->nama_lengkap; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td>
                                        <td><b><?php echo $delivery_data->user->notelp; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            <div style="white-space: initial;"><b><?php echo $delivery_data->user->alamat; ?></b></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td><b><?php echo $delivery_data->note; ?></b></td>
                                    </tr>
                                </table>
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
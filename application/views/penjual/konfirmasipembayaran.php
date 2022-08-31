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
                            <ul class="dropdown-menu cart-list s-cate">
                                <li class="single-cart-list">
                                    <a href="#" class="photo"><img src="assets/images/collection/arrivals1.png" class="cart-thumb" alt="image" /></a>
                                    <div class="cart-list-txt">
                                        <h6><a href="#">arm <br> chair</a></h6>
                                        <p>1 x - <span class="price">$180.00</span></p>
                                    </div>
                                    <!--/.cart-list-txt-->
                                    <div class="cart-close">
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!--/.cart-close-->
                                </li>
                                <!--/.single-cart-list -->
                                <li class="single-cart-list">
                                    <a href="#" class="photo"><img src="assets/images/collection/arrivals2.png" class="cart-thumb" alt="image" /></a>
                                    <div class="cart-list-txt">
                                        <h6><a href="#">single <br> armchair</a></h6>
                                        <p>1 x - <span class="price">$180.00</span></p>
                                    </div>
                                    <!--/.cart-list-txt-->
                                    <div class="cart-close">
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!--/.cart-close-->
                                </li>
                                <!--/.single-cart-list -->
                                <li class="single-cart-list">
                                    <a href="#" class="photo"><img src="assets/images/collection/arrivals3.png" class="cart-thumb" alt="image" /></a>
                                    <div class="cart-list-txt">
                                        <h6><a href="#">wooden arn <br> chair</a></h6>
                                        <p>1 x - <span class="price">$180.00</span></p>
                                    </div>
                                    <!--/.cart-list-txt-->
                                    <div class="cart-close">
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!--/.cart-close-->
                                </li>
                                <!--/.single-cart-list -->
                                <li class="total">
                                    <span>Total: $0.00</span>
                                    <button class="btn-cart pull-right" onclick="window.location.href='#'">view
                                        cart</button>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown active">
                            <a href="#" class="nav-link dropdown user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hi, <?php echo $this->session->userdata('username'); ?>
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="user/akun"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
                                <li class="nav-item"><a class="nav-link" href="user/settings"><span class="lnr lnr-cog"> Settings</span></a></li>
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
                            <a href="<?php echo base_url('user/akun') ?>" class="nav-link">
                                <i class="fa fa-desktop"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('user/editprofile') ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span>Edit Profile</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="<?php echo base_url('user/order') ?>">
                                <i class="fa fa-clipboard-list"></i>
                                <span>Pesanan Saya</span></a>
                        </li>
                        <li class="nav-item dropdown active">
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
                        <h1>Pembayaran Saya</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item">Profile</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="card-heading">Data Pembayaran</h5>
                                    </div>
                                    <?php echo form_open_multipart('user/do_confirm'); ?>
                                    <div class="card-body">
                                        <?php if ($flash) : ?>

                                        <?php endif; ?>

                                        <div class="form-group">
                                            <label class="form-control-label" for="orders">Order:</label>
                                            <?php if (count($orders) > 0) : ?>
                                                <select name="order_id" class="form-control" id="orders">
                                                    <?php foreach ($orders as $order) : ?>
                                                        <option value="<?php echo $order->id; ?>" <?php echo set_select('order_id', $order->id, ($order_id == $order->id) ? TRUE : FALSE); ?>>#<?php echo $order->order_number; ?> (Rp <?php echo format_rupiah($order->total_price); ?>)</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php else : ?>
                                                <div class="text-danger font-weight-bold">Belum ada data order.</div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="bank_name" class="form-control-label">Nama bank:</label>
                                                    <input type="text" name="bank_name" value="<?php echo set_value('bank_name'); ?>" class="form-control" id="bank_name" required>
                                                    <?php echo form_error('bank_name'); ?>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="bank_number" class="form-control-label">No. Rekening:</label>
                                                    <input type="text" name="bank_number" value="<?php echo set_value('bank_number'); ?>" class="form-control" id="bank_number" required>
                                                    <?php echo form_error('bank_number'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="price" class="form-control-label">Jumlah Transfer:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" name="transfer" value="<?php echo set_value('transfer'); ?>" class="form-control" id="price" required>
                                                        <?php echo form_error('transfer'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="an" class="form-control-label">Atas nama:</label>
                                                    <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" id="an" required>
                                                    <?php echo form_error('name'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="to">Transfer ke</label>
                                            <?php if (count($banks) > 0) : ?>
                                                <select name="bank" class="form-control" id="orders">
                                                    <?php foreach ($banks as $bank => $data) : ?>
                                                        <option value="<?php echo $bank; ?>" <?php echo set_select('bank', $bank); ?>><?php echo $data->bank; ?> a.n <?php echo $data->name; ?> (<?php echo $data->number; ?>)</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php else : ?>
                                                <div class="text-danger font-weight-bold">Belum ada data bank.</div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="pic" class="form-control-label">Bukti pembayaran:</label>
                                            <input type="file" name="picture" class="form-control" required>
                                            <?php echo form_error('picture'); ?>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <input type="submit" value="Konfirmasi" class="btn btn-primary">
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card card-header">
                                        <h5 class="card-heading">Pembayaran saya</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <?php if (count($payments) > 0) : ?>
                                            <table class="table table-condensed table-striped">
                                                <?php foreach ($payments as $payment) : ?>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>
                                                            <?php echo anchor('customer/payments/view/' . $payment->id, 'Order #' . $payment->order_number); ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($payment->payment_status == 1) : ?>
                                                                <span class="badge badge-warning text-white">Menunggu konfirmasi</span>
                                                            <?php elseif ($payment->payment_status == 2) : ?>
                                                                <span class="badge badge-success text-white">Dikonfirmasi</span>
                                                            <?php elseif ($payment->payment_status == 3) : ?>
                                                                <span class="badge badge-danger text-white">Gagal mengonfirmasi</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        <?php else : ?>
                                            <div class="m-3 alert alert-info">Belum ada data pembayaran.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
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

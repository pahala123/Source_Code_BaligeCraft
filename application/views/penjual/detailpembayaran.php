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
                                        <h5 class="card-heading">Data Order</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-hover table-striped table-hover">
                                            <tr>
                                                <td>Order</td>
                                                <td>#<b><?php echo $data->order_number; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td><b><?php echo get_formatted_date($data->payment_date); ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah transfer</td>
                                                <td><b>Rp <?php echo format_rupiah($data->payment_price); ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Transfer dari</td>
                                                <td><b><?php echo $payment->source->bank; ?> a.n <?php echo $payment->source->name; ?> (<?php echo $payment->source->number; ?>)</td>
                                            </tr>
                                            <tr>
                                                <td>Transfer ke</td>
                                                <td><b>
                                                        <?php
                                                        $transfer_to = $payment->transfer_to;
                                                        $transfer_to = $banks[$transfer_to];

                                                        ?>
                                                        <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><b><?php echo get_payment_status($data->payment_status); ?></b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h5 class="card-heading">Bukti Pembayaran</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img alt="Pembayaran order #<?php echo $data->order_number; ?>" class="img img-fluid" style="padding: 0px 0px;" src="<?php echo base_url('assets/upload/payments/' . $data->picture_name); ?>">
                                        </div>
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
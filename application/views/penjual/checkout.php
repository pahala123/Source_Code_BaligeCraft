<body class="layout-3" style="background-color: white;">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar">
                <div class=" nav-collapse">
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
                        <li class="nav-item"><a href="#" class="nav-link home">Beranda</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Produk</a></li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link">Layanan<span class="fa fa-angle-down" style="margin-left:7px"></span></a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="">Custom Ulos</a></li>
                                <li class="nav-item"><a class="nav-link" href="">Buka Toko</span></a>

                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                    </ul>
                </div>
                <div class="attr-nav">
                    <ul>
                        <li class="dropdown">
                            <a href="<?php echo base_url('produk/cart') ?>" class="dropdown" style="margin-left: 170px;" data-toggle="dropdown">
                                <span class="fa fa-shopping-cart"></span>
                                <span class="badge badge-bg-1"><?php echo $this->cart->total_items(); ?></span>
                            </a>
                        </li>
                        <li class="nav-item submenu dropdown">
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

        </div>
    </div>
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Keranjang Produk</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Keranjang Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">
            <form action="<?php echo site_url('produk/checkout/order'); ?>" method="POST">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Alamat Penerima</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Penerima" value="<?php echo $nama_lengkap; ?>">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No HP" value="<?php echo $notelp; ?>">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah" value="<?php echo $alamat; ?>">
                                </div>
                                <div class="col-md-12 form-group mb-0">
                                    <textarea class="form-control" name="note" id="note" rows="1" placeholder="Order Notes"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Detail Belanja</h2>
                                <ul class="list">
                                    <li><a href="#">
                                            <h4>Produk <span>Total</span></h4>
                                        </a></li>
                                    <?php
                                    $i = 0;
                                    foreach ($cart_order as $cart_items) {
                                        $i++;
                                    ?>
                                        <li><a href="#"><?php echo $cart_items['name'] ?>
                                                <span class="middle">x <?php echo $cart_items['qty'] ?></span>
                                                <span class="last">Rp.<?php echo $this->cart->format_number($cart_items['subtotal']) ?></span></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="#">Sub total <span>Rp.<?php echo $this->cart->format_number($this->cart->total()) ?></span></a></li>
                                    <li><a href="#">Biaya Pengiriman <span>Rp.<?php
                                                                                $total = $this->cart->total();
                                                                                $tax = ($total * 40) / 100;
                                                                                echo $this->cart->format_number($tax);
                                                                                ?></span>
                                        </a></li>
                                    <li><a href="#">Kupon <span><?php echo $discount; ?></span></a></li>
                                    <li><a href="#">Total <span>Rp.<?php echo format_rupiah($total); ?></span></a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4" style="margin-top:30px;">
                            <div class="order_box">
                                <h2>Metode Pembayaran</h2>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" name="payment" value="1">
                                        <label for="f-option5">Transfer Bank</label>
                                        <div class="check"></div>
                                    </div>
                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="payment" value="2">
                                        <label for="f-option6">Bayar Di Tempat</label>
                                        <div class="check"></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4" style="margin-top:30px;">
                            <div class="text-center">
                                <button type="submit" class="button button-paypal">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Checkout Area =================-->
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
</body>
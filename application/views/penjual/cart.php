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


    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <?php if (count($carts) > 0) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Gambar Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carts as $item) : ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p><?php echo $item['name'] ?></p>
                                                    <p><?php echo $model->nama_model ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="<?php echo base_url('assets/upload/image/' . $item['options']['produk_gambar']) ?>" alt="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h7>Rp.<?php echo $this->cart->format_number($item['price']) ?></h7>
                                        </td>
                                        <td>
                                            <form action="<?php echo base_url('produk/update_cart'); ?>" method="post">
                                                <div class="product_count">
                                                    <input type="number" name="qty" value="<?php echo $item['qty'] ?>" />
                                                    <input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>" />
                                                </div>
                                                <input type="submit" name="submit" value="Update" class="btn btn-primary" />
                                            </form>
                                        </td>
                                        <td>
                                            <h7>Rp.<?php echo $this->cart->format_number($item['subtotal']) ?></h7>
                                        </td>
                                        <td>
                                            <form action="<?php echo base_url('produk/remove_cart'); ?>" method="post">
                                                <input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>" />
                                                <input type="submit" name="submit" value="X" class="btn btn-danger" />
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="bottom_button">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center" style="margin-top: 70px;">
                                            <input id="code" name="coupon_code" type="text" placeholder="Kode Kupon">
                                            <a class="button" href="#">Punya Kupon?</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>

                                    <td>
                                    </td>

                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h7><?php echo $this->cart->format_number($this->cart->total()) ?></h7>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td class="d-none d-md-block">
                                    </td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <h5>Biaya Pengiriman</h5>
                                    </td>
                                    <td>
                                        <h7> <?php
                                                $total = $this->cart->total();
                                                $tax = ($total * 40) / 100;
                                                echo $this->cart->format_number($tax);
                                                ?></h7>
                                    </td>
                                </tr>
                                <tr>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <h5>Total</h5>
                                    </td>
                                    <td>
                                        <h7><?php echo $this->cart->format_number($tax + $this->cart->total()); ?></h7>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="<?php echo base_url('user') ?>">Lanjut Belanja</a>
                                            <a class="primary-btn ml-2" href="<?php echo base_url('produk/checkout'); ?>">Langsung ke Checkout</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md-12 ftco-animate">
                                <div class="alert alert-info">Keranjang Anda Kosong.<br><?php echo anchor('browse', 'Jelajahi produk kami'); ?> dan mulailah berbelanja!</div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link href="<?= base_url('assets/images/Logo/logo1.png'); ?>" rel="icon">
    <title>
        Model Ulos
    </title>
    <link href="<?= base_url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/linearicons.css'); ?>" rel="stylesheet">
    <!-- General CSS Files -->
    <link href="<?= base_url('assets/css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/css/components.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootsnav.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style1.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/css/style3.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/css/tambahan.css'); ?>" rel="stylesheet">
</head>

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

    <!--new-arrivals start -->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" style="max-width: 100%;" src="<?php echo base_url('assets/upload/ulos/' . $get_detail_ulos->produk_gambar) ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3><?php echo $get_detail_ulos->produk_nama ?></h3>
                        <h2>Rp.<?php echo $this->cart->format_number($get_detail_ulos->produk_harga); ?></h2>
                        <ul class="list">
                            <li><a href="#"><span>Stok</span> : <?php echo $get_detail_ulos->produk_kuantitas ?></a></li>
                        </ul>
                        <p><?php echo $get_detail_ulos->produk_deskripsi_pendek ?></p>

                        <form action="<?php echo base_url('produk/save_cartulos'); ?>" method="post">
                            <h4 style="margin-top: 25px;">Model Corak Ulos : </h4>
                            <div class="card_area d-flex align-items-center" style="margin-bottom: 0px; margin-top: 0px;">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="model_ulos" value="1">
                                    <label for="f-option5">Rumbai Panjang</label>
                                    <div class="check"></div>
                                </div>
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="model_ulos" value="2">
                                    <label for="f-option6">Lampion</label>
                                    <div class="check"></div>
                                </div>

                            </div>
                            <div class="product_count">
                                <a class="button primary-btn" href="#bukti" data-toggle="modal" style="border-radius: 5px; margin-bottom: 30px;">Contoh Corak Model</a>
                            </div>
                            <div class="product_count">
                                <label for="qty">Kuantitas :</label>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                                <input type="number" class="buyfield" name="qty" value="1" />
                                <input type="hidden" class="buyfield" name="produk_id" value="<?php echo $get_detail_ulos->produk_id ?>" />
                                <input type="submit" class="button primary-btn" name="submit" value="Buy Now" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
        <div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 450px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="modal-title text-dark" id="myModalLabel" style="margin-bottom: 25px; font-weight: 600;">Rumbai Panjang</h4>
                                    <figure class="course-thumbnail-go">
                                        <center>
                                            <img src="<?= base_url('assets/upload/ulos/rumbai_panjang.jpg') ?>" alt="" style="max-width: 50%;">
                                        </center>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="modal-title text-dark" id="myModalLabel" style="margin-bottom: 25px;  margin-top: 25px; font-weight: 600;">Lampion</h4>
                                    <figure class="course-thumbnail-go">
                                        <center>
                                            <img src="<?= base_url('assets/upload/ulos/lampion.jpg') ?>" alt="" style="max-width: 50%; ">
                                        </center>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--newsletter strat -->
        <section id="newsletter" class="newsletter">
            <div class="container">
                <div class="hm-footer-details">
                    <div class="row">
                        <div class=" col-md-3 col-sm-6 col-xs-12">
                            <div class="hm-footer-widget">
                                <div class="hm-foot-title">
                                    <h4>information</h4>
                                </div>
                                <!--/.hm-foot-title-->
                                <div class="hm-foot-menu">
                                    <ul>
                                        <li><a href="#">Beranda</a></li>
                                        <!--/li-->
                                        <li><a href="#">Produk</a></li>
                                        <!--/li-->
                                        <li><a href="#">Tentang</a></li>
                                        <!--/li-->
                                        <li><a href="#">Kontak Kami</a></li>
                                        <!--/li-->
                                    </ul>
                                    <!--/ul-->
                                </div>
                                <!--/.hm-foot-menu-->
                            </div>
                            <!--/.hm-footer-widget-->
                        </div>
                        <!--/.col-->
                        <div class=" col-md-3 col-sm-6 col-xs-12">
                            <div class="hm-footer-widget">
                                <div class="hm-foot-title">
                                    <h4>Kategori Produk</h4>
                                </div>
                                <!--/.hm-foot-title-->
                                <div class="hm-foot-menu">
                                    <ul>
                                        <li><a href="#">Aksesoris</a></li>
                                        <!--/li-->
                                        <li><a href="#">Busana</a></li>
                                        <!--/li-->
                                        <li><a href="#">Perlengkapan Rumah</a></li>
                                        <!--/li-->
                                        <li><a href="#">Sepatu</a></li>
                                        <!--/li-->
                                        <li><a href="#">Ulos</a></li>
                                        <!--/li-->
                                        <li><a href="#">Souvenir</a></li>
                                    </ul>
                                    <!--/ul-->
                                </div>
                                <!--/.hm-foot-menu-->
                            </div>
                            <!--/.hm-footer-widget-->
                        </div>
                        <!--/.col-->
                        <div class=" col-md-3 col-sm-6 col-xs-12">
                            <div class="hm-footer-widget">
                                <div class="hm-foot-title">
                                    <h4>Layanan</h4>
                                </div>
                                <!--/.hm-foot-title-->
                                <div class="hm-foot-menu">
                                    <ul>
                                        <li><a href="#">Custom Ulos</a></li>
                                        <!--/li-->
                                        <li><a href="#">Buka Toko</a></li>
                                        <!--/li-->
                                    </ul>
                                    <!--/ul-->
                                </div>
                                <!--/.hm-foot-menu-->
                            </div>
                            <!--/.hm-footer-widget-->
                        </div>
                        <!--/.col-->
                        <div class=" col-md-3 col-sm-6  col-xs-12">
                            <div class="hm-footer-widget">
                                <div class="hm-foot-title">
                                    <h4>Contact Us</h4>
                                </div>
                                <!--/.hm-foot-title-->
                                <div class="hm-foot-para">
                                    <p>
                                        Daftarkan Email Anda
                                    </p>
                                </div>
                                <!--/.hm-foot-para-->
                                <div class="hm-foot-email">
                                    <div class="foot-email-box">
                                        <input type="text" class="form-control" placeholder="Masukkan Email Disini...">
                                    </div>
                                    <!--/.foot-email-box-->
                                    <div class="foot-email-subscribe">
                                        <span><i class="fa fa-location-arrow"></i></span>
                                    </div>
                                    <!--/.foot-email-icon-->
                                </div>
                                <!--/.hm-foot-email-->
                            </div>
                            <!--/.hm-footer-widget-->
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->
                </div>
                <!--/.hm-footer-details-->

            </div>
            <!--/.container-->

        </section>
        <!--/newsletter-->
        <!--newsletter end -->

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

<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootsnav.js'); ?>"></script>
<script src="<?= base_url('assets/user/js/moment.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/js/stisla.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/js/sticky-kit.min.js'); ?>"></script>
<script src="<?= base_url('assets/user/js/scripts.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
</body>

</html>
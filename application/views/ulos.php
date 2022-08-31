<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Ulos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!--font-family-->

    <link href="<?= base_url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="<?= base_url('assets/images/Logo/logo1.png'); ?>" rel="icon">

    <link href="<?= base_url('assets/css/linearicons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/owl.theme.default.min.cs'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootsnav.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style1.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/css/tambahan.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->



    <!--welcome-hero start -->
    <header id="home" class="welcome-hero">
        <!-- top-area Start -->
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
                    <div class="container">
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <button class="btn-login">
                                <a href="auth/index_login">
                                    Login
                                </a>
                            </button>
                        </div>
                        <!--/.attr-nav-->
                        <!-- End Atribute Navigation -->

                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <div class="logo-navigasi">
                                <img src="<?= base_url('assets/images/Logo/logo1.png'); ?>" alt="" class="img1">
                                <img src="<?= base_url('assets/images/Logo/logo.png'); ?>" alt="" class="img2">
                            </div>
                        </div>
                        <!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class=" scroll active"><a href="<?php echo base_url('auth/index') ?>">Beranda</a></li>
                                <li class="scroll"><a href="<?php echo base_url('user/profile') ?>">Produk</a></li>
                                <li class="scroll"><a href="<?= base_url('user/daftarproduk'); ?>">Layanan</a></li>
                                <li class="scroll"><a href="<?= base_url('user/daftarproduk'); ?>">Tentang</a></li>
                            </ul>
                            <!--/.nav -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!--/.container-->
                </nav>
                <!--/nav-->
                <!-- End Navigation -->
            </div>
            <!--/.header-area-->
            <div class="clearfix"></div>

        </div><!-- /.top-area-->
        <!-- top-area End -->
    </header>

    <!--new-arrivals start -->
    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <div class="section-header" style="margin-top:100px;">
                <h2>Daftar Ulos</h2>
            </div>
            <!--/.section-header-->
            <div class="new-arrivals-content">
                <div class="row">
                    <?php
                    foreach ($list_ulos as $list_ulos) {
                    ?>
                        <div class="col-md-3 col-sm-4">

                            <div class="single-new-arrival">
                                <div class="single-new-arrival-bg">
                                    <img src="<?php echo base_url('assets/upload/ulos/' . $list_ulos->gambar_ulos) ?>" alt="new-arrivals images">
                                    <div class="single-new-arrival-bg-overlay"></div>
                                    <div class="new-arrival-cart">
                                        <p>
                                            <span class="lnr lnr-cart"></span>
                                            <a href="#">add <span>to </span> cart</a>
                                        </p>
                                        <p class="arrival-review pull-right">
                                            <span class="lnr lnr-heart"></span>
                                            <span class="lnr lnr-frame-expand"></span>
                                        </p>
                                    </div>

                                </div>
                                <h4><a href="<?php echo base_url('auth/detailulos/' . $list_ulos->id_ulos); ?>"><?php echo $list_ulos->nama_ulos; ?></a></h4>
                                <p class="arrival-product-price">Rp.<?php echo $this->cart->format_number($list_ulos->harga_ulos); ?></p>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>

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
                                    <li><a href="<?php echo base_url('auth/custom_ulos') ?>">Custom Ulos</a></li>
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

    <!--footer start-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="hm-footer-copyright text-center">
                <p>
                    &copy;copyright. Dikelmbangkan oleh <a href="">Kelompok 15</a>
                </p>
                <!--/p-->
            </div>
            <!--/.text-center-->
        </div>
        <!--/.container-->

        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>

        </div>
        <!--/.scroll-Top-->

    </footer>
    <!--/.footer-->
    <!--footer end-->


    <script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootsnav.js'); ?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.js'); ?>"></script>

</body>

</html>
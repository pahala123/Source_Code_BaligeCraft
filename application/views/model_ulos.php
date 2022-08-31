<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Model Ulos</title>
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

    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Detail Produk</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
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
                            <img class="img-fluid" style="max-width: 100%;" src="<?php echo base_url('assets/upload/ulos/' . $get_detail_ulos->gambar_ulos) ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3><?php echo $get_detail_ulos->nama_ulos ?></h3>
                        <h2>Rp.<?php echo $this->cart->format_number($get_detail_ulos->harga_ulos); ?></h2>
                        <ul class="list">
                            <li><a href="#"><span>Stok</span> : <?php echo $get_detail_ulos->kuantitas_ulos ?></a></li>
                        </ul>
                        <p><?php echo $get_detail_ulos->deskripsi_pendek_ulos ?></p>

                        <div class="card_area d-flex align-items-center" style="margin-bottom: 50px;">
                            <h5>Model Corak Ulos :</h5>
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="payment" value="1">
                                <label for="f-option5">Rumbai Panjang</label>
                                <div class="check"></div>
                            </div>
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="payment" value="2">
                                <label for="f-option6">Lampion</label>
                                <div class="check"></div>
                            </div>

                        </div>
                        <div class="product_count">
                            <a class="button primary-btn" href="#bukti" data-toggle="modal" style="border-radius: 5px;">Contoh Corak Model</a>
                        </div>
                        <div class="product_count">
                            <label for="qty">Kuantitas :</label>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="ti-angle-left"></i></button>
                            <input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                            <a class="button primary-btn" href="#" style="border-radius: 0px;">Add to Cart</a>
                        </div>
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
        <script src="<?= base_url('assets/js/bootstrap-modal.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
        <script>
            jQuery(document).ready(function() {
                $(".clickable-row").click(function() {
                    $($(this).data('href')).appendTo("body").modal('show');
                });
            });
        </script>
</body>

</html>
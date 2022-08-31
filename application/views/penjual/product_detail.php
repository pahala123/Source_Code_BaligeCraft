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
                            <a href="<?php echo base_url('produk/cart') ?>" class="dropdown" style="margin-left: 170px;">
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


    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" style="max-width: 100%;" src="<?php echo base_url('assets/upload/image/' . $get_detail_product->produk_gambar) ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3><?php echo $get_detail_product->produk_nama ?></h3>
                        <h2>Rp.<?php echo $this->cart->format_number($get_detail_product->produk_harga); ?></h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Kategori</span> : <?php echo $get_detail_product->kategori_nama ?></a></li>
                            <li><a href="#"><span>Stok</span> : <?php echo $get_detail_product->produk_kuantitas ?></a></li>
                        </ul>
                        <p><?php echo $get_detail_product->produk_deskripsi_pendek ?></p>
                        <div class="product_count">
                            <label for="qty">Kuantitas :</label>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                            <form action="<?php echo base_url('produk/save_cart'); ?>" method="post">
                                <input type="number" class="buyfield" name="qty" value="1" />
                                <input type="hidden" class="buyfield" name="produk_id" value="<?php echo $get_detail_product->produk_id ?>" />
                                <input type="submit" class="button primary-btn" name="submit" value="Buy Now" />
                            </form>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p><?php echo $get_detail_product->produk_deskripsi_panjang ?></p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Stok</h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $get_detail_product->produk_kuantitas ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Berat</h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $get_detail_product->produk_berat ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Warna</h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $get_detail_product->produk_warna ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Tanggal Publikasi</h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $get_detail_product->produk_date ?></h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->
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
    </div>
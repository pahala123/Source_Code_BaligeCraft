<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

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
        <div class="container" id="container">
            <form action="<?php echo site_url('produk/checkout/order'); ?>" method="POST">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Alamat Penerima</h3>

                            <table class="table table-bordered">
                                <tr>
                                    <th>Kurir</th>
                                    <td><?php echo $query->rajaongkir->results->name; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Layanan</th>
                                    <th>Tarif (Rp)</th>
                                    <th>Estimasi (Hari)</th>
                                </tr>
                                <?php foreach ($query->rajaongkir->results[0]->costs as $q) { ?>
                                    <tr>
                                        <td><?php echo $q->service; ?></td>
                                        <td><?php echo $q->cost['0']->value; ?></td>
                                        <td><?php echo $q->cost['0']->etd; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" class="form-control" id="total_input" name="total_input" value="">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Nama Lengkap</label>
                                <input type=" text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Penerima" value="<?php echo $nama_lengkap; ?>">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No HP" value="<?php echo $notelp; ?>">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah" value="<?php echo $alamat; ?>">
                            </div>
                            <div class="col-md-12 form-group mb-0">
                                <label>Catatan</label>
                                <textarea class="form-control" name="note" id="note" rows="1" placeholder="Order Notes"></textarea>
                            </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="order_box">
                <h2>Detail Belanja</h2>
                <ul class="list" style="line-height: 0px;">
                    <li><a href="#">
                            <h4>Produk <span>Total</span></h4>
                        </a></li>
                    <?php
                    $i = 0;
                    foreach ($cart_order as $cart_items) {
                        $i++;
                    ?>
                        <li><a href="#"><?php echo $cart_items['name'] ?>
                                <span class="last">x <?php echo $cart_items['qty'] ?></span>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="list list_2" style="line-height: 0px;">
                    <input type="hidden" id="subtotal_input" value="<?php echo $subtotal ?>">
                    <li><a href="#" id="subtotal" name="subtotal" value="">Sub Total <span>Rp <?php echo format_rupiah($subtotal); ?></span></a></li>
                    <li><a href="#" id="ongkir" name="ongkir" value="">Biaya Pengiriman <span>Rp </span>
                        </a></li>
                    <li><a href="#" id="total" name="total" value="">Total <span></span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
        </div>
        <div class="col-lg-4">
            <div class="text-center" style="margin-top: 20px;">
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
    <script>
        function showOrig(str) {
            if (str == "") {
                document.getElementById("origincity").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("origincity").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "<?php echo base_url('check/city/'); ?>?q=" + str, true);
                xmlhttp.send();
            }
        }

        function showDest(str) {
            if (str == "") {
                document.getElementById("destinationcity").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("destinationcity").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "<?php echo base_url('check/city/'); ?>?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
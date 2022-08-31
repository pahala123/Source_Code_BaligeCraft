<body class="layout-3" style="background-color: white;">
    <?php
    //Get Data Provinsi
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key:8b9e257a5e4d134dc057a4f7f2ee799b"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    ?>
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

                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" class="form-control" id="biayaongkir" name="biayaongkir" value="">
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
                            </br>

                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Provinsi</label>
                                <div class="controls">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option>Pilih Provinsi</option>
                                        <?php
                                        $get = json_decode($response, true);
                                        for ($i = 0; $i < count($get['rajaongkir']['results']); $i++) :
                                        ?>
                                            <option value="<?php echo $get['rajaongkir']['results'][$i]['province_id']; ?>"><?php echo $get['rajaongkir']['results'][$i]['province']; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Kabupaten/Kota</label>
                                <div class="controls">
                                    <select id="kabupaten" name="kabupaten" class="form-control">
                                        <option>Pilih Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Kurir</label>
                                <div class="controls">
                                    <select class="form-control" id="kurir" name="kurir">
                                        <option value="">Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Layanan</label>
                                <div id="tampil_ongkir">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Pilih Layanan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 form-group p_star">
                                <div class="text-center">
                                    <button type="submit" class="button button-paypal" style="font-size: 16px; margin-top: 30px;">Buat Pesanan</button>
                                </div>
                            </div>



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
                                        <li>
                                            <div class="col-md-12 form-group p_star">
                                                <input type="hidden" class="form-control" id="product_name" name="product_name" value="<?php echo $cart_items['name'] ?>">
                                            </div>
                                            <a href="#"><?php echo $cart_items['name'] ?>
                                                <span class="last" style="margin-left: 20px;">x <?php echo $cart_items['qty'] ?></span>

                                        </li>
                                    <?php } ?>
                                </ul>
                                <ul class="list list_2" style="line-height: 0px;">
                                    <li><a href="#" id="subtotal" name="subtotal" value="">Sub Total <span>Rp <?php echo format_rupiah($subtotal); ?></span></a></li>
                                    <li><a href="#" id="ongkir" name="ongkir" value="">Biaya Pengiriman <span>Rp </span>
                                        </a></li>
                                    <li><a href="#" id="total" name="total" value="">Total <span></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $('#provinsi').change(function() {

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
            var prov = $('#provinsi').val();
            var nama_provinsi = $(this).attr("nama_provinsi");
            $.ajax({
                type: 'GET',
                url: "<?php echo site_url('provinsi/get_kabupaten'); ?>",
                data: 'prov_id=' + prov,
                success: function(data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });


        $('#kurir').change(function() {

            //Mengambil value dari option select provinsi asal, kabupaten, kurir kemudian parameternya dikirim menggunakan ajax
            var kab = $('#kabupaten').val();
            var kurir = $('#kurir').val();

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('provinsi/get_kurir'); ?>",
                data: {
                    'kab_id': kab,
                    'kurir': kurir
                },
                success: function(data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam element div tampil_ongkir
                    $("#tampil_ongkir").html(data);
                }
            });
        });
    </script>
    </div>
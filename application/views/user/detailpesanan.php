<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-5EWduNowVRRy883-"></script>
<script src="<?= base_url('assets/user/js/jquery.min.js'); ?>"></script>

<?php echo $this->session->flashdata('success'); ?>
<form id="payment-form" method="post" action="<?= base_url() ?>snap/finish?invoice=<?= $data->order_number; ?>">
    <input type="hidden" name="result_type" id="result-type" value="">
    <input type="hidden" name="result_data" id="result-data" value="">
</form>

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
                        <li class="nav-item dropdown active">
                            <a class="nav-link" href="<?php echo base_url('user/order') ?>">
                                <i class="fa fa-clipboard-list"></i>
                                <span>Pesanan Saya</span></a>
                        </li>
                        <li>
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
                        <h1>Detail Pesanan</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item">Profile</div>
                        </div>
                    </div>

                    <?php if ($data->courier == "cod") { ?>
                        <?php if ($data->pesanan_status != "4") { ?>
                            <h2 class="title">COD (Cash of Delivery)</h2>
                            <p>Pesanan ini menggunakan metode COD (Cash of Delivery). Silakan menghubungi penjual melalui WhatsApp dengan cara </h2>
                                <hr>
                                <hr>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($data->pesanan_status == 3) { ?>
                            <div class="alert alert-info">Jika pesanan telah sampai tujuan, silakan tekan tombol dibawah</div>
                            <a href="<?= base_url(); ?>user/finish_transaction?invoice=<?= $data->order_number ?>&resi=<?= $data->resi ?>" class="btn btn-sm btn-secondary" onclick="return confirm('Yakin sudah sampai?');">Sudah Sampai & Selesai</a>

                        <?php } else if ($data->order_status == "") { ?>
                            <div class="alert alert-info">Kamu belum memilih metode pembayaran. Silakan klik tombol dibawah untuk memilih metode pembayaran yang diinginkan.</div>
                            <button id="pay-button" class="btn btn-sm btn-secondary">Pilih Metode Pembayaran</button>
                            <hr>
                        <?php } else if ($data->order_status == "pending") { ?>
                            <div class="alert alert-info">Kamu belum melakukan pembayaran. Klik tombol dibawah untuk melihat panduan pembayaran. (batas maksimal pembayaran 1x24jam)</div>
                            <a href="<?= $data->link_pay; ?>" target="_blank" class="btn btn-sm btn-secondary">Panduan Pembayaran</a>
                            <hr>
                        <?php } ?>
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
                                                    <td>Nomor</td>
                                                    <td><b>#<?php echo $data->order_number; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td><b><?php echo get_formatted_date($data->order_date); ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Item</td>
                                                    <td><b><?php echo $data->total_items; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Harga</td>
                                                    <td><b>Rp <?php echo format_rupiah($data->total_price); ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode pembayaran</td>
                                                    <td><b><?php echo ($data->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat'; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td><b>
                                                            <?php if ($data->order_status == 'pending' || $data->order_status == '') { ?>
                                                                Belum dibayar
                                                            <?php } else if ($data->order_status == 'settlement' && $data->pesanan_status == 0) { ?>
                                                                Menunggu konfirmasi
                                                            <?php } else if ($data->pesanan_status == 2) { ?>
                                                                Sedang diproses
                                                            <?php } else if ($data->pesanan_status == 3) { ?>
                                                                Sedang dikirim
                                                            <?php } else { ?>
                                                                Selesai
                                                            <?php } ?>
                                                        </b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Resi</td>
                                                    <td>#<?php echo $data->resi; ?></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h5 class="card-heading">Barang dalam pesanan</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-hover table-condensed">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Jumlah beli</th>
                                                    <th scope="col">Harga total</th>
                                                </tr>
                                                <?php foreach ($items as $items) : ?>
                                                    <tr>
                                                        <td>
                                                            <img style="width: 30%;" src="<?php echo base_url('assets/upload/image/' . $items->produk_gambar) ?>" alt="<?php echo $items->produk_gambar; ?>">
                                                        </td>
                                                        <td>
                                                            <h5 class="mb-0"><?php echo $items->produk_nama; ?></h5>
                                                        </td>
                                                        <td><b><?php echo $data->total_items; ?></td>
                                                        <td>Rp <?php echo format_rupiah($data->total_price); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h5 class="card-heading">Data Penerima</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-hover table-striped table-hover">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td><b><?php echo $delivery_data->user->nama_lengkap; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. HP</td>
                                                    <td><b><?php echo $delivery_data->user->notelp; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><b><?php echo $delivery_data->user->alamat; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Catatan</td>
                                                    <td><b><?php echo $delivery_data->note; ?></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card card-primary" style="margin-top: 270px;">
                                        <div class="card-header">
                                            <h5 class="card-heading">Status Pesanan</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <?php if ($data->payment_price == NULL) : ?>
                                                <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
                                            <?php else : ?>
                                                <table class="table table-hover table-striped table-hover">
                                                    <tr>
                                                        <td>Transfer</td>
                                                        <td><b>Rp <?php echo format_rupiah($data->payment_price); ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal</td>
                                                        <td><b><?php echo get_formatted_date($data->payment_date); ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                    </tr>
                                                </table>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="section-body">
                            <div class="card">
                                <div class="card-body">
                                    <p>Apabila mau Mengecek Resi dapat mengklik link dibawah ini :</p>
                                    <a href="https://rajaongkir.com/">Klik Disini</a>
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
</body>
<script type="text/javascript">
    console.log("123")
    const type_order = "<?= $data->order_status ?>";

    console.log(type_order, "order_status");
    if (type_order == "") {

        modalMidtrans();
        $("#pay-button").click(function() {
            modalMidtrans();
        })
    }

    function modalMidtrans() {
        $.ajax({
            url: '<?= base_url() ?>snap/token?invoice=<?= $data->order_number; ?>',
            cache: false,

            success: function(data) {
                //location = data;

                console.log(data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {
                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    }
</script>
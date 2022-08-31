<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <div class="search-element">

                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama'); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="<?= base_url('assets/images/Logo/logo.png'); ?>" class="img-sidebar" style="max-width: 170px; margin-top: 20px;">
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="nav-item dropdown ">
                            <a href="index" class="nav-link"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-user"></i> <span>Pelanggan</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-user-tag"></i> <span>Penjual</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fa fa-box"></i> <span>Produk</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url('admin/dataproduk') ?>">Data Produk</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="#">Edit Produk</a></li>
                                <li><a class="nav-link" href="<?php echo base_url('admin/datakategori') ?>">Kategori Produk</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('admin/datapesanan') ?>" class="nav-link"><i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link"><i class="fa fa-search-location"></i> <span>Tracking</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('admin/datapembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link"><i class="fas fa-pen"></i> <span>Ulasan Produk</span></a>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title; ?></h1>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-wrapper">
                                <div class="card">
                                    <?php if ($order_flash) : ?>
                                        <span class="float-right text-success font-weight-bold" style="margin-top: 20px; margin-left: 20px"><?php echo $order_flash; ?></span>
                                        <div class="card-header">
                                            <h3 class="mb-0">Data Produk</h3>
                                        <?php endif; ?>
                                        </div>

                                        <div class="card-body p-0">
                                            <table class="table align-items-center table-flush table-striped">
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
                                                    <td><b class="statusField"><?php echo get_order_status($data->order_status, $data->payment_method); ?></b></td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <form action="<?php echo site_url('admin/pesanan_status'); ?>" method="POST">
                                                <input type="hidden" name="order" value="<?php echo $data->id; ?>">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <?php if ($data->payment_method == 1) : ?>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="2" <?php echo ($data->order_status == 2) ? ' selected' : ''; ?>>Dalam proses</option>
                                                                    <option value="3" <?php echo ($data->order_status == 3) ? ' selected' : ''; ?>>Dalam pengiriman</option>
                                                                    <option value="4" <?php echo ($data->order_status == 4) ? ' selected' : ''; ?>>Selesai</option>
                                                                    <option value="5" <?php echo ($data->order_status == 5) ? ' selected' : ''; ?>>Batalkan</option>
                                                                </select>
                                                            <?php else : ?>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="1" <?php echo ($data->order_status == 1) ? ' selected' : ''; ?>>Dalam proses</option>
                                                                    <option value="2" <?php echo ($data->order_status == 2) ? ' selected' : ''; ?>>Dalam pengiriman</option>
                                                                    <option value="3" <?php echo ($data->order_status == 3) ? ' selected' : ''; ?>>Selesai</option>
                                                                    <option value="4" <?php echo ($data->order_status == 4) ? ' selected' : ''; ?>>Batalkan</option>
                                                                </select>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="text-right">
                                                            <input type="submit" value="OK" class="btn btn-md btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <form action="<?php echo site_url('admin/kirim_resi'); ?>" method="POST">
                                                <div class="col-md-10">
                                                    <label>Nomor Resi</label>
                                                    <input type="text" name="nomor_resi_order" id="nomor_resi_order" class="form-control" value="<?php echo $data->nomor_resi_order; ?>">
                                                </div>
                                                <div class="text-right">
                                                    <input type="submit" value="OK" class="btn btn-md btn-primary">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="mb-0">Barang dalam pesanan</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Produk</th>
                                                            <th scope="col">Jumlah beli</th>
                                                            <th scope="col">Harga satuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($items as $item) : ?>
                                                            <tr>
                                                                <td>
                                                                    <img class="img img-fluid rounded" style="width: 60px; height: 60px;" alt="<?php echo $item->produk_nama; ?>" src="<?php echo base_url('assets/upload/image/' . $item->produk_gambar); ?>">
                                                                </td>
                                                                <td>
                                                                    <h5 class="mb-0"><?php echo $item->produk_nama; ?></h5>
                                                                </td>
                                                                <td><?php echo $item->order_qty; ?></td>
                                                                <td>Rp <?php echo format_rupiah($item->order_price); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="mb-0">Data Penerima</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table align-items-center table-flush table-hover">
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
                                                <td>
                                                    <div style="white-space: initial;"><b><?php echo $delivery_data->user->alamat; ?></b></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Catatan</td>
                                                <td><b><?php echo $delivery_data->note; ?></b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="card card-primary" id="#payments">
                                    <div class="card-header">
                                        <h3 class="mb-0">Pembayaran</h3>
                                    </div>
                                    <div class="card-body <?php echo ($data->payment_method == 1) ? 'p-0' : ''; ?>">
                                        <?php if ($data->payment_method == 1) : ?>
                                            <?php if ($data->payment_price == NULL) : ?>
                                                <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
                                            <?php else : ?>

                                                <div>
                                                    <img class="img img-fluid" src="<?php echo base_url('assets/upload/payments/' . $data->picture_name); ?>">
                                                </div>

                                                <?php if ($payment_flash) : ?>
                                                    <br>
                                                    <div class="alert alert-info" id="payment_flash"><?php echo $payment_flash; ?></div>
                                                <?php endif; ?>

                                                <table class="table align-items-center table-flush table-hover">
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
                                                        <td><b>
                                                                <?php if ($data->payment_status == 1) : ?>
                                                                    <span class="badge badge-info">Menunggu konfirmasi</span>
                                                                <?php elseif ($data->payment_status == 2) : ?>
                                                                    <span class="badge badge-success">Dikonfirmasi</span>
                                                                <?php elseif ($data->payment_status == 3) : ?>
                                                                    <span class="badge badge-danger">Gagal</span>
                                                                <?php endif; ?>
                                                            </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transfer ke</td>
                                                        <td>
                                                            <div style="white-space: initial;"><b>
                                                                    <?php
                                                                    $bank_data = json_decode($data->payment_data);
                                                                    $bank_data  = (array) $bank_data;
                                                                    $transfer_to = $bank_data['transfer_to'];

                                                                    $transfer_to = $banks[$transfer_to];
                                                                    $transfer_from = $bank_data['source'];
                                                                    ?>
                                                                    <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                                                                </b></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transfer dari</td>
                                                        <td>
                                                            <div style="white-space: initial;">
                                                                <b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <div class="alert alert-info">
                                                Order ini menggunakan metode pembayaran ditempat. Tidak memerlukan konfirmasi pembayaran.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($data->payment_price != NULL) : ?>
                                        <div class="card-footer">
                                            <form action="<?php echo site_url('admin/payments/verify'); ?>" method="POST">
                                                <div class="row">
                                                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                                                    <input type="hidden" name="order" value="<?php echo $data->id; ?>">
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="action">
                                                            <?php if ($data->payment_status == 1) : ?>
                                                                <option value="1">Konfirmasi Pembayaran</option>
                                                                <option value="2">Pembayaran Tidak Ada</option>
                                                            <?php else : ?>
                                                                <option value="4" readonly>Tidak ada pilihan</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 text-right">
                                                        <input type="submit" class="btn btn-primary" value="OK">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Kelompok 15</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if ($this->session->flashdata('edit-produk-failed')) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Tidak Berhasil',
            text: 'Data Produk tidak sesuai'
        });
    </script>

<?php
}
if ($this->session->flashdata('edit-produk-success')) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Edit Produk'
        });
    </script>
    }

<?php
}
if ($this->session->flashdata('add-produk-success')) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Tambah Produk'
        });
    </script>
    }

<?php
}
if ($this->session->flashdata('hapus-produk-success')) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil hapus Produk'
        });
    </script>

    }

<?php
}
if ($this->session->flashdata('hapus-produk-failed')) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Tidak Berhasil',
            text: 'Produk Gagal Dihapus'
        });
    </script>
<?php
}

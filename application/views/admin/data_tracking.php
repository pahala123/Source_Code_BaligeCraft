<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
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
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('admin/datapesanan') ?>" class="nav-link" data-toggle="dropdown"><i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-search-location"></i> <span>Tracking</span></a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('admin/datapembayaran') ?>" class="nav-link" data-toggle="dropdown"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fas fa-pen"></i> <span>Ulasan Produk</span></a>
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
                        <div class="col-12 col-md-6 col-lg-12">

                            <div class="card">
                                <?php if (count($payments) > 0) : ?>
                                    <div class="card-body">

                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">NO RESI</th>
                                                    <th scope="col">NO PENGIRIMAN</th>
                                                    <th scope="col">NAMA PENERIMA</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orders as $order) : ?>
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo anchor('admin/pesanan_view/' . $order->id, '#' . $order->order_number); ?>
                                                        </th>
                                                        <td><?php echo $order->user; ?></td>
                                                        <td>
                                                            <?php echo $order->total_items; ?>
                                                        </td>
                                                        <td>
                                                            Rp <?php echo format_rupiah($order->total_price); ?>
                                                        </td>
                                                        <td><?php echo get_order_status($order->order_status, $order->payment_method); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <ul class="pagination mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <?php echo $pagination; ?>
                                <?php else : ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="alert alert-primary">
                                                    Belum ada data produk yang ditambahkan. Silahkan menambahkan baru.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i class="fa fa-plus"></i> Tambah produk baru</a>
                                                <br>
                                                <a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i> Kelola kategori</a>
                                            </div>
                                        </div>
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

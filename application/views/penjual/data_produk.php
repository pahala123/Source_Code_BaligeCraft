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
                        <li class="nav-item"><a href="<?php echo base_url('penjual') ?>" class="nav-link home">Beranda</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Produk</a></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Layanan</a>
                        </li>
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
                        </li>
                        <li class="nav-item submenu dropdown active">
                            <a href="#" class="nav-link dropdown user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hi, <?php echo $this->session->userdata('nama'); ?>
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('penjual/profile') ?>"><span class="lnr lnr-user">Akun Saya</span> </a></li>
                                <li class="nav-item"><a class="nav-link" href="penjual/settings"><span class="lnr lnr-cog"> Settings</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('penjual/logout') ?>"><span class="lnr lnr-exit"> Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Pembeli</li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/akun') ?>" class="nav-link">
                                <i class="fa fa-desktop"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/editprofile') ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span>Edit Profile</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url('penjual/order') ?>">
                                <i class="fa fa-clipboard-list"></i>
                                <span>Pesanan Saya</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url('penjual/pembayaran') ?>">
                                <i class="fa fa-credit-card"></i>
                                <span>Pembayaran Saya</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="credits.html">
                                <i class="fa fa-pen"></i>
                                <span>Ulasan Produk</span></a>
                        </li>
                        <li class="menu-header">Menu Penjual</li>
                        <li class="nav-item dropdown active">
                            <a href="<?php echo base_url('penjual/dataproduk') ?>" class="nav-link">
                                <i class="fa fa-box"></i> <span>Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/datapesanan') ?>" class="nav-link">
                                <i class="fa fa-clipboard-list"></i> <span>Pesanan Produk</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url('penjual/datapembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i> <span>Pembayaran</span></a>
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
                                <div class="card-body">
                                    <div>
                                        <a href="<?php echo base_url('penjual/tambahproduk') ?>" class="btn btn-success btn-lg" style="margin-bottom: 30px;">
                                            <i class="fa fa-plus"></i> Tambah Produk
                                        </a>
                                    </div>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($produk as $produk) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td style="padding: 30px 50px;"><?php echo $produk->produk_nama; ?></td>
                                                    <td style="padding: 30px 50px;"><img src="<?php echo base_url('assets/upload/image/' . $produk->produk_gambar); ?>" style="width:45%;" /></td>
                                                    <td style="padding: 30px 50px;"><?php echo $produk->kategori_nama; ?></td>
                                                    <td style="padding: 30px 50px;">
                                                        <?php

                                                        if ($produk->produk_status == 1) { ?>
                                                            <span class="badge badge-success">Published</span>
                                                        <?php
                                                        } else { ?>
                                                            <span class="badge badge-danger">Unpublished</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="padding: 30px 20px;">
                                                        <a class="btn btn-primary" href="<?php echo base_url('penjual/edit/' . $produk->produk_id); ?>" style="border-color: #e99c2e;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $produk->produk_id; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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

            <div class="modal fade" id="myModal<?php echo $produk->produk_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Hapus data?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        </div>
                        <div class="modal-body">
                            <p>Yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('penjual/delete_product/' . $produk->produk_id); ?>" class="btn btn-danger">
                                <i class="fa fa-trash-o"></i> Ya, Hapus data</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/pf-3.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (@$_SESSION['error']) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Tidak Berhasil',
                text: 'File Gambar tidak support'
            });
        </script>
    <?php unset($_SESSION['error']);
    } ?>

    <?php if (@$_SESSION['edit-produk-failed']) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Tidak Berhasil',
                text: 'Data Produk tidak sesuai'
            });
        </script>
    <?php unset($_SESSION['edit-produk-failed']);
    } ?>


    <?php if (@$_SESSION['edit-produk-success']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil Edit Produk'
            });
        </script>
    <?php unset($_SESSION['edit-produk-success']);
    } ?>


    <?php if (@$_SESSION['add-produk-success']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil Tambah Produk'
            });
        </script>
    <?php unset($_SESSION['add-produk-success']);
    } ?>

    <?php if (@$_SESSION['add-produk-failed']) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Tidak Berhasil',
                text: 'Tidak Berhasil Tambah Produk'
            });
        </script>
    <?php unset($_SESSION['add-produk-failed']);
    } ?>

    <?php if (@$_SESSION['hapus-produk-success']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil Hapus Produk'
            });
        </script>
    <?php unset($_SESSION['hapus-produk-success']);
    } ?>
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
						<li class="nav-item"><a href="#" class="nav-link">Layanan</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
					</ul>
				</div>
				<div class="attr-nav">
					<ul>
						<li class="dropdown">
							<a href="<?php echo base_url('produk/cart') ?>" class="dropdown" style="margin-left: 170px;" data-toggle="dropdown">
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
							<a href="<?php echo base_url('penjual/akun') ?>" class="nav-link">
								<i class="fa fa-desktop"></i>
								<span>Dashboard</span></a>
						</li>
						<li class="nav-item dropdown active">
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
					</ul>
				</aside>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Edit Profile</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item">Profile</div>
						</div>
					</div>
					<div class="section-body">
						<h2 class="section-title">Hi, <?php echo $this->session->userdata('nama'); ?></h2>
						<p class="section-lead">
							Kelola Informasi Profil Anda pada Halaman ini
						</p>

						<div class="card">
							<form method="post" class="needs-validation" action="<?php echo base_url('penjual/profile') ?>" enctype="multipart/form-data">
								<div class="card-body">
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Nama Lengkap</label>
											<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap; ?>" onkeyup="s_()">
											<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-6 col-12">
											<label>Tempat Lahir</label>
											<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>" onkeyup="s_()">
											<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Username</label>
											<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>" onkeyup="s_()">
											<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-6 col-12">
											<label>Tanggal Lahir</label>
											<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir; ?>" onkeyup="s_()">
											<?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Email</label>
											<input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" onchange="s_()" readonly>
											<?= form_error('email', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-6 col-12">
											<label>Alamat</label>
											<input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamat; ?>" onchange="s_()">
											<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Foto Profile</label>
											<input type="file" name="foto" id="foto" class="form-control" value="<?php echo $foto; ?>" onchange="s_()">
											<?= form_error('foto', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-6 col-12">
											<label>Kode Pos</label>
											<input type="text" name="kodepos" id="kodepos" class="form-control" value="<?php echo $kodepos; ?>" onchange="ss_()">
											<?= form_error('kodepos', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Nomor Telepon</label>
											<input type="text" name="notelp" id="notelp" class="form-control" value="<?php echo $notelp; ?>" onchange="ss_()">
											<?= form_error('notelp', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12 col-12">
											<label>Bio</label>
											<textarea class="form-control summernote-simple" name="bio" id="bio"><?php echo $bio; ?></textarea>
										</div>
									</div>
								</div>
								<div class="card-footer text-right">
									<button type="submit" name="submit" class="btn btn-primary" id="change_profil">Simpan</button>
								</div>
							</form>
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
	</div>
	</div>
	<script src="<?= base_url('assets/js/pf-3.js'); ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<?php if (@$_SESSION['edit-profil']) { ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil',
				text: 'Data Produk Sesuai'
			});
		</script>
	<?php unset($_SESSION['edit-profil']);
	} ?>

	<?php if (@$_SESSION['edit-profil-failed']) { ?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Tidak Berhasil',
				text: 'Data Produk tidak Sesuai'
			});
		</script>
	<?php unset($_SESSION['edit-profil-failed']);
	} ?>
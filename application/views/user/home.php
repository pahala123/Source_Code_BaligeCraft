	<!--welcome-hero start -->
	<header id="home" class="welcome-hero">


		<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<!--/.carousel-indicator -->
			<ol class="carousel-indicators">
				<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
				<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
				<li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
			</ol><!-- /ol-->
			<!--/.carousel-indicator -->

			<!--/.carousel-inner -->
			<div class="carousel-inner" role="listbox">
				<!-- .item -->
				<div class="item active">
					<div class="single-slide-item slide1">
						<div class="container">
							<div class="welcome-hero-content">
								<div class="row">
									<div class="col-sm-7">
										<div class="single-welcome-hero">
											<div class="welcome-hero-txt">
												<h2>Produk Kerajinan Toba yang berkualitas</h2>
												<p>
													Produk Kerajinan Toba yang berkualitas dan diproduksi oleh oleh pengrajin yang handal.
												</p>
												<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
													Beli Sekarang
												</button>
												<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
													more info
												</button>
											</div>
											<!--/.welcome-hero-txt-->
										</div>
										<!--/.single-welcome-hero-->
									</div>
									<!--/.col-->
									<div class="col-sm-5">
										<div class="single-welcome-hero">
											<div class="welcome-hero-img-1">
												<img src="assets/images/Produk/imgslider1.png" alt="slider image">
											</div>
											<!--/.welcome-hero-txt-->
										</div>
										<!--/.single-welcome-hero-->
									</div>
									<!--/.col-->
								</div>
								<!--/.row-->
							</div>
							<!--/.welcome-hero-content-->
						</div><!-- /.container-->
					</div><!-- /.single-slide-item-->

				</div><!-- /.item .active-->
				<div class="item">
					<div class="single-slide-item slide2">
						<div class="container">
							<div class="welcome-hero-content">
								<div class="row">
									<div class="col-sm-7">
										<div class="single-welcome-hero">
											<div class="welcome-hero-txt">
												<h2>Produk Kerajinan Toba yang berkualitas</h2>
												<p>
													Produk Kerajinan Toba yang berkualitas dan diproduksi oleh oleh pengrajin yang handal.
												</p>
												<div class="packages-price">
													<p>
														$ 199.00
														<del>$ 299.00</del>
													</p>
												</div>
												<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
													<span class="lnr lnr-plus-circle"></span>
													add <span>to</span> cart
												</button>
												<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
													more info
												</button>
											</div>
											<!--/.welcome-hero-txt-->
										</div>
										<!--/.single-welcome-hero-->
									</div>
									<!--/.col-->
									<div class="col-sm-5">
										<div class="single-welcome-hero">
											<div class="welcome-hero-img">
												<img src="assets/images/slider/slider2.png" alt="slider image">
											</div>
											<!--/.welcome-hero-txt-->
										</div>
										<!--/.single-welcome-hero-->
									</div>
									<!--/.col-->
								</div>
								<!--/.row-->
							</div>
							<!--/.welcome-hero-content-->
						</div><!-- /.container-->
					</div><!-- /.single-slide-item-->

				</div><!-- /.item .active-->

				<div class="item">
					<div class="single-slide-item slide3">
						<div class="container">
							<div class="welcome-hero-content">
								<div class="row">
									<div class="col-sm-7">
										<div class="single-welcome-hero">
											<div class="welcome-hero-txt">
												<h2>Produk Kerajinan Toba yang berkualitas</h2>
												<p>
													Produk Kerajinan Toba yang berkualitas dan diproduksi oleh oleh pengrajin yang handal.
												</p>
												<div class="packages-price">
													<p>
														$ 199.00
														<del>$ 299.00</del>
													</p>
												</div>
												<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
													<span class="lnr lnr-plus-circle"></span>
													add <span>to</span> cart
												</button>
												<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
													more info
												</button>
											</div>
											<!--/.welcome-hero-txt-->
										</div>
										<!--/.single-welcome-hero-->
									</div>
									<!--/.col-->
									<div class="col-sm-5">
										<div class="single-welcome-hero">
											<div class="welcome-hero-img">
												<img src="assets/images/slider/slider3.png" alt="slider image">
											</div>
											<!--/.welcome-hero-txt-->
										</div>
										<!--/.single-welcome-hero-->
									</div>
									<!--/.col-->
								</div>
								<!--/.row-->
							</div>
							<!--/.welcome-hero-content-->
						</div><!-- /.container-->
					</div><!-- /.single-slide-item-->

				</div><!-- /.item .active-->
			</div><!-- /.carousel-inner-->

		</div>
		<!--/#header-carousel-->

		<!-- top-area Start -->
		<div class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
				<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

					<div class="container">
						<!-- Start Atribute Navigation -->
						<div class="attr-nav">
							<ul>
								<li class="dropdown">
									<a href="<?php echo base_url('produk/cart') ?>" class="dropdown-toggle" data-toggle="dropdown">
										<span class="fa fa-shopping-cart"></span>
										<span class="badge badge-bg-1"><?php echo $this->cart->total_items(); ?></span>
									</a>
								</li>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										Hi, <?= $user["username"] ?>
										<span class="fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu menu">
										<li class="nav-item"><a class="nav-link" href="user/akun"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
										<li class="nav-item"><a class="nav-link" href="user/settings"><span class="lnr lnr-cog"> Settings</span></a></li>
										<li class="nav-item"><a class="nav-link" href="user/logout"><span class="lnr lnr-exit"> Logout</span></a></li>
									</ul>
								</li>
							</ul>

						</div>
						<!--/.attr-nav-->
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
								<li class=" scroll active"><a href="#home">Beranda</a></li>
								<li class="scroll"><a href="#new-arrivals">Produk</a></li>
								<li class="nav-item submenu dropdown">
									<a href="#">Layanan<span class="fa fa-angle-down"></span>
									</a>

									<ul class="dropdown-menu menu">
										<li class="nav-item"><a class="nav-link" href="<?php echo base_url('user/ulos') ?>">Custom Ulos</a></li>
										<li class="nav-item"><a class="nav-link" href="<?php echo base_url('user/bukatoko') ?>">Buka Toko</span></a>

									</ul>
								</li>
								<li class="scroll"><a href="#newsletter">Tentang</a></li>
							</ul>
							<!--/.nav -->
						</div>

					</div>
				</nav>
				<!--/nav-->
				<!-- End Navigation -->
			</div>
		</div><!-- /.top-area-->
		<!-- top-area End -->

	</header>

	<!--feature start -->
	<section id="feature" class="feature">
		<div class="container">
			<div class="section-header">
				<h2>Produk Terbaik</h2>
			</div>
			<!--/.section-header-->
			<div class="feature-content">
				<div class="row">
					<?php
					foreach ($best_products as $best_products) {
					?>
						<div class="col-sm-3">

							<div class="single-feature">

								<img src="<?php echo base_url('assets/upload/image/' . $best_products->produk_gambar) ?>" alt="feature image" class="best_products">
								<div class="single-feature-txt text-center">

									<h3><a href="#"><?php echo $best_products->produk_nama; ?></a></h3>
									<h5>Rp.<?php echo $this->cart->format_number($best_products->produk_harga); ?></h5>
								</div>

							</div>

						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<!--new-arrivals start -->
	<section id="new-arrivals" class="new-arrivals">
		<div class="container">
			<div class="section-header">
				<h2>Daftar Produk</h2>
			</div>
			<!--/.section-header-->
			<div class="new-arrivals-content">
				<div class="row">
					<?php
					foreach ($list_products as $list_products) {
					?>
						<div class="col-md-3 col-sm-4">

							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="<?php echo base_url('assets/upload/image/' . $list_products->produk_gambar) ?>" alt="new-arrivals images">
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
								<h4>
									<a href="<?php echo base_url('produk/userdetail/' . $list_products->produk_id); ?>"><?php echo $list_products->produk_nama; ?></a>
								</h4>
								<p class="arrival-product-price">Rp.<?php echo $this->cart->format_number($list_products->produk_harga); ?></p>
							</div>

						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!--/.container-->

	</section>
	<!--/.new-arrivals-->
	<!--new-arrivals end -->

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
									<li><a href="#">Custom Ulos</a></li>
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
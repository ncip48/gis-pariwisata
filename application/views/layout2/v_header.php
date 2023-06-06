<body class="animsition">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a class="logo" href="index.html">
							<h3>Halaman Admin</h3>
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>
							<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
								<li>
									<a href="index.html">Dashboard 1</a>
								</li>
								<li>
									<a href="index2.html">Dashboard 2</a>
								</li>
								<li>
									<a href="index3.html">Dashboard 3</a>
								</li>
								<li>
									<a href="index4.html">Dashboard 4</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="chart.html">
								<i class="fas fa-chart-bar"></i>Charts</a>
						</li>
						<li>
							<a href="table.html">
								<i class="fas fa-table"></i>Tables</a>
						</li>
						<li>
							<a href="form.html">
								<i class="far fa-check-square"></i>Forms</a>
						</li>
						<li>
							<a href="calendar.html">
								<i class="fas fa-calendar-alt"></i>Calendar</a>
						</li>
						<li>
							<a href="map.html">
								<i class="fas fa-map-marker-alt"></i>Maps</a>
						</li>
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-copy"></i>Pages</a>
							<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
								<li>
									<a href="login.html">Login</a>
								</li>
								<li>
									<a href="register.html">Register</a>
								</li>
								<li>
									<a href="forget-pass.html">Forget Password</a>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-desktop"></i>UI Elements</a>
							<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
								<li>
									<a href="button.html">Button</a>
								</li>
								<li>
									<a href="badge.html">Badges</a>
								</li>
								<li>
									<a href="tab.html">Tabs</a>
								</li>
								<li>
									<a href="card.html">Cards</a>
								</li>
								<li>
									<a href="alert.html">Alerts</a>
								</li>
								<li>
									<a href="progress-bar.html">Progress Bars</a>
								</li>
								<li>
									<a href="modal.html">Modals</a>
								</li>
								<li>
									<a href="switch.html">Switchs</a>
								</li>
								<li>
									<a href="grid.html">Grids</a>
								</li>
								<li>
									<a href="fontawesome.html">Fontawesome Icon</a>
								</li>
								<li>
									<a href="typo.html">Typography</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="#">
					<h3>Halaman Admin</h3>
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li>
							<a href="<?= base_url() ?>"><i class="fas fa-globe"></i>Website</a>
						</li>

						<li <?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('admin') ?>"><i class="fas fa-map"></i>Pemetaan</a>
						</li>

						<li <?= $this->uri->segment(1) == 'wisata' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('wisata') ?>"><i class="fas fa-location-arrow"></i>Pariwisata</a>
						</li>

						<li <?= $this->uri->segment(1) == 'icon' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('icon') ?>"> <i class="fas fa-map-marker"></i>Icon</a>
						</li>
						<li <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('user') ?>"> <i class="fas fa-user"></i>User</a>
						</li>
						<li <?= $this->uri->segment(1) == 'etiket' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('etiket') ?>"> <i class="fas fa-file"></i>E-Tiket</a>
						</li>

					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<h3>Pariwisata Kebumen</h3>
							<div class="header-button">

								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<div class="image">
											<img src="<?= base_url('foto/' . $this->session->userdata('foto')) ?>" alt="Raditya" />
										</div>
										<div class="content">
											<a class="js-acc-btn" href="#"><?= $this->session->userdata('nama_user') ?></a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<div class="image">
													<a href="#">
														<img src="<?= base_url('foto/' . $this->session->userdata('foto')) ?>" alt="Raditya" />
													</a>
												</div>
												<div class="content">
													<h5 class="name">
														<a href="#"><?= $this->session->userdata('nama_user') ?></a>
													</h5>
													<span class="email"><?= $this->session->userdata('email') ?></span>
												</div>
											</div>

											<div class="account-dropdown__footer">
												<a href="<?= base_url('auth/logout') ?>">
													<i class="zmdi zmdi-power"></i>Logout</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER DESKTOP-->
			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
<body class="animsition">
	<div class="page-wrapper">
		<!-- HEADER DESKTOP-->
		<header class="header-desktop3 d-none d-lg-block">
			<div class="section__content section__content--p35">
				<div class="header3-wrap">
					<h3 style="color:aliceblue">Pariwisata Kebumen</h3>


					<div class="header__navbar">
						<ul class="list-unstyled">
							<li <?= $this->uri->uri_string() == 'home' ? 'class="active"' : '' ?>>
								<a href="<?= base_url('home') ?>"><i class="fas fa-home"></i><span class="bot-line"></span>Home</a>
							</li>

							<li <?= $this->uri->uri_string() == 'home/wisata' ? 'class="active"' : '' ?>>
								<a href="<?= base_url('home/wisata') ?>"><span class="bot-line"></span>List Wisata</a>
							</li>

							<li <?= $this->uri->uri_string() == 'home/e_tiket' ? 'class="active"' : '' ?>>
								<a href="<?= base_url('home/e_tiket') ?>"><span class="bot-line"></span>E-Tiket</a>
							</li>

							<li <?= $this->uri->uri_string() == 'home/about' ? 'class="active"' : '' ?>>
								<a href="<?= base_url('home/about') ?>"><span class="bot-line"></span>Kontak Kami</a>
							</li>
						</ul>
					</div>


					<!-- <div class="header__tool">
						<div class="account-wrap">
							<div class="account-item account-item--style2 clearfix ">
								<a style="color:aliceblue" href="<?= base_url('auth/login') ?>"><i class="zmdi zmdi-account"></i> Login</a>

							</div>
						</div>
					</div> -->
				</div>
			</div>
		</header>
		<!-- END HEADER DESKTOP-->

		<!-- HEADER MOBILE-->
		<header class="header-mobile header-mobile-2 d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<h3 style="color:aliceblue">Pariwisata Kebumen</h3>
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
								>
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
		<div class="sub-header-mobile-2 d-block d-lg-none">
			<div class="header__tool">
				<div class="header-button-item has-noti js-item-menu">
					<i class="zmdi zmdi-notifications"></i>
					<div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
						<div class="notifi__title">
							<p>You have 3 Notifications</p>
						</div>
						<div class="notifi__item">
							<div class="bg-c1 img-cir img-40">
								<i class="zmdi zmdi-email-open"></i>
							</div>
							<div class="content">
								<p>You got a email notification</p>
								<span class="date">April 12, 2018 06:50</span>
							</div>
						</div>
						<div class="notifi__item">
							<div class="bg-c2 img-cir img-40">
								<i class="zmdi zmdi-account-box"></i>
							</div>
							<div class="content">
								<p>Your account has been blocked</p>
								<span class="date">April 12, 2018 06:50</span>
							</div>
						</div>
						<div class="notifi__item">
							<div class="bg-c3 img-cir img-40">
								<i class="zmdi zmdi-file-text"></i>
							</div>
							<div class="content">
								<p>You got a new file</p>
								<span class="date">April 12, 2018 06:50</span>
							</div>
						</div>
						<div class="notifi__footer">
							<a href="#">All notifications</a>
						</div>
					</div>
				</div>
				<div class="header-button-item js-item-menu">
					<i class="zmdi zmdi-settings"></i>
					<div class="setting-dropdown js-dropdown">
						<div class="account-dropdown__body">
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-account"></i>Account</a>
							</div>
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-settings"></i>Setting</a>
							</div>
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-money-box"></i>Billing</a>
							</div>
						</div>
						<div class="account-dropdown__body">
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-globe"></i>Language</a>
							</div>
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-pin"></i>Location</a>
							</div>
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-email"></i>Email</a>
							</div>
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-notifications"></i>Notifications</a>
							</div>
						</div>
					</div>
				</div>
				<div class="account-wrap">
					<div class="account-item account-item--style2 clearfix js-item-menu">
						<div class="image">
							<img src="<?= base_url() ?>template/images/icon/avatar-01.jpg" alt="Raditya Fajar" />
						</div>
						<div class="content">
							<a class="js-acc-btn" href="#">farida</a>
						</div>
						<div class="account-dropdown js-dropdown">
							<div class="info clearfix">
								<div class="image">
									<a href="#">
										<img src="<?= base_url() ?>template/images/icon/avatar-01.jpg" alt="Raditya Fajar" />
									</a>
								</div>
								<div class="content">
									<h5 class="name">
										<a href="#">farida</a>
									</h5>
									<span class="email">farida@example.com</span>
								</div>
							</div>
							<div class="account-dropdown__body">
								<div class="account-dropdown__item">
									<a href="#">
										<i class="zmdi zmdi-account"></i>Account</a>
								</div>
								<div class="account-dropdown__item">
									<a href="#">
										<i class="zmdi zmdi-settings"></i>Setting</a>
								</div>
								<div class="account-dropdown__item">
									<a href="#">
										<i class="zmdi zmdi-money-box"></i>Billing</a>
								</div>
							</div>
							<div class="account-dropdown__footer">
								<a href="#">
									<i class="zmdi zmdi-power"></i>Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END HEADER MOBILE -->

		<!-- PAGE CONTENT-->
		<div class="page-content--bgf7">

			<!-- WELCOME-->
			<section class="welcome p-t-10">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="title-4"><?= $title ?>
							</h1>
						</div>
						<hr>
						<br>
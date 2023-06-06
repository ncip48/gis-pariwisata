<?php
$this->user_login->cek_sudah_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Login</title>

	<!-- Fontfaces CSS-->
	<link href="<?= base_url() ?>template/css/font-face.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?= base_url() ?>template/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?= base_url() ?>template/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>template/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="<?= base_url() ?>template/css/theme.css" rel="stylesheet" media="all">

	<link rel="icon" href="<?php echo base_url('assets/images/logo_kebumen.png'); ?>" type="image/x-icon">
</head>

<body class="animsition">
	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="#">
								<h1>Login Admin</h1>
							</a>
						</div>
						<div class="login-form">
							<?php

							echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
							if ($this->session->flashdata('pesan')) {
								echo '<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								echo $this->session->flashdata('pesan');
								echo '</div>';
							}
							echo form_open('') ?>
							<div class="form-group">
								<label>Email</label>
								<input class="au-input au-input--full" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="au-input au-input--full" type="password" name="password" placeholder="Password">
							</div>
							<div class="login-checkbox">
								<button class="btn btn-primary" type="submit">Login</button>
								<a href="<?= base_url() ?>" class="btn btn-success ">Website</a>
							</div>


							<?php echo form_close() ?>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Jquery JS-->
	<script src="<?= base_url() ?>template/vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="<?= base_url() ?>template/vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="<?= base_url() ?>template/vendor/slick/slick.min.js">
	</script>
	<script src="<?= base_url() ?>template/vendor/wow/wow.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/animsition/animsition.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="<?= base_url() ?>template/vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="<?= base_url() ?>template/vendor/circle-progress/circle-progress.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?= base_url() ?>template/vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="<?= base_url() ?>template/vendor/select2/select2.min.js">
	</script>

	<!-- Main JS-->
	<script src="<?= base_url() ?>template/js/main.js"></script>
	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 3000);
		initSample();
	</script>
</body>

</html>
<!-- end document-->
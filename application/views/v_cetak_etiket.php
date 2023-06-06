<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Tiket</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/cetak.css') ?>">
</head>

<body>
	<div class="cardWrap">
		<div class="card cardLeft" style="background-color: #ecedef;padding-bottom:30px;">
			<h1 style="color:#e84c3d">Pariwisata <span>Kebumen</span></h1>
			<div class="title">
				<span>Nama Wisata</span>
				<h2><?= $tiket->nama_tempat ?></h2>
			</div>
			<div class="name">
				<span>Hari, Tanggal</span>
				<h2><?= $tiket->tanggal_rencana ?></h2>
			</div>
			<div class="seat">
				<span>Pemesan</span>
				<h2><?= $tiket->nama_pemesan ?></h2>
			</div>
			<div class="orang">
				<span>Jumlah</span>
				<h2><?= $tiket->jumlah_orang ?></h2>
			</div>
		</div>
		<div class="card cardRight" style="background-color: #ecedef;padding-bottom:30px">
			<div class="number">
				<!-- <h3><?= $tiket->jumlah_orang ?></h3>
				<span>orang</span> -->
				<img src="<?= base_url($qr['file']) ?>" height="100" width="100" />
				<h5><?= $tiket->kode_pesanan ?></h5>
			</div>
		</div>

	</div>
</body>

</html>
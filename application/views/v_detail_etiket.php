<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3"></strong>
		</div>
		<div class="card-body">
			<div class="mx-auto d-block">
				<h5 class="text-sm-center mt-2 mb-2">Detail Pemesanan E-Tiket</h5>
			</div>
			<div class="text-center">
				<h3 class="text-danger mt-4">Kode Pesanan : <?= $tiket->kode_pesanan ?></h3>
				<button class="btn btn-outline-danger mt-2 mb-3" onclick="copyToClipboard('<?= $tiket->kode_pesanan ?>')">Copy Kode Pesanan</button>
				<br />
				<img src="<?= base_url($qr['file']) ?>" height="200" width="200" />
				<h6>Nama Pemesan : <?= $tiket->nama_pemesan ?> (<?= $tiket->no_pemesan ?>)</h6>
				<h6>Tempat Wisata (Orang) : <?= $tiket->nama_tempat ?> (<?= $tiket->jumlah_orang ?>x)</h6>
				<h6>Jumlah Tagihan : Rp. <?= $tiket->total ?></h6>

				<hr />

				<a href="<?= base_url('etiket/cetak_e_tiket?kode=' . $tiket->kode_pesanan) ?>" class="btn btn-outline-success" target="_blank">Cetak E-Tiket</a>
				<a href="<?= base_url('home/e_tiket') ?>" class="btn btn-success">Kembali</a>
			</div>
		</div>
	</div>
</div>

<script>
	function copyToClipboard(element) {
		navigator.clipboard.writeText(element.toString());
		alert('Kode Pesanan Berhasil di Copy');
	}
</script>
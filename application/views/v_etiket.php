<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3"></strong>
		</div>
		<div class="card-body">
			<div class="mx-auto d-block">
				<h4 class="text-sm-center mt-2 mb-2">Formulir Pemesanan E-Tiket</h4>
			</div>
			<hr>
			<div>
				<?php
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
				echo form_open() ?>
				<div class="row">
					<div class="col-md-6 col-12">
						<b>Wisata</b>
						<div class="form-group">
							<label>Nama Tempat Wisata</label>
							<select class="form-control" name="id_wisata" id="wisata">
								<option value="">-Pilih Tempat Wisata-</option>
								<?php foreach ($wisata as $key => $value) { ?>
									<option value="<?= $value->id_wisata ?>" data-harga="<?= $value->harga ?>"><?= $value->nama_tempat ?></option>><?= $value->nama_tempat ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Pemesan</label>
							<input class="au-input au-input--full" name="nama_pemesan" placeholder="Misalnya : Raditya">
						</div>
						<div class="form-group">
							<label>No.Telp/HP Pemesan</label>
							<input class="au-input au-input--full" name="no_pemesan" placeholder="081.........">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>Tanggal Rencana Datang</label>
							<input class="au-input au-input--full" name="tanggal_rencana" type="date">
						</div>
						<div class="form-group">
							<label>Jumlah Orang</label>
							<input class="au-input au-input--full" name="jumlah_orang" placeholder="1" type="number" value="1" id="jumlah_orang">
						</div>
						<div class="form-group">
							<label>Total Tagihan Tiket</label>
							<input class="au-input au-input--full" id="total_harga" disabled>
							<input type="hidden" class="au-input au-input--full" name="total">
						</div>

					</div>
				</div>
				<b>Identitas Pengunjung</b>
				<div class="row">
					<div class="col-12" id='pengunjung_form'>
						<div class="form-group">
							<label>Nama Pengunjung 1</label>
							<input class="au-input au-input--full" name="nama_pengunjung[]" placeholder="Misalnya : Raditya">
						</div>
					</div>
				</div>
				<div class="login-checkbox">
					<button class="btn btn-primary" type="submit">Simpan E-Tiket</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#wisata').change(function() {
			var harga = $(this).find(':selected').data('harga');
			var jumlah_orang = $('#jumlah_orang').val();
			var total = harga * jumlah_orang;
			$('#total_harga').val(total);
			$('input[name="total"]').val(total);

			var form_pengunjung = $('#pengunjung_form');
			form_pengunjung.empty();
			for (var i = 0; i < jumlah_orang; i++) {
				if (jumlah_orang > 5) {
					alert('Maksimal 5 orang');
					$('#jumlah_orang').val(5);
					return;
				}
				form_pengunjung.append('<div class="form-group"><label>Nama Pengunjung ' + (i + 1) + '</label><input class="au-input au-input--full" name="nama_pengunjung[]" placeholder="Misalnya : Raditya"></div>');
			}
		});

		$('#jumlah_orang').keyup(function() {
			var harga = $('#wisata').find(':selected').data('harga');
			var jumlah_orang = $(this).val();
			var total = harga * jumlah_orang;
			$('#total_harga').val(total);
			$('input[name="total"]').val(total);

			var form_pengunjung = $('#pengunjung_form');
			form_pengunjung.empty();
			for (var i = 0; i < jumlah_orang; i++) {
				if (jumlah_orang > 5) {
					alert('Maksimal 5 orang');
					$('#jumlah_orang').val(5);
					return;
				}
				form_pengunjung.append('<div class="form-group"><label>Nama Pengunjung ' + (i + 1) + '</label><input class="au-input au-input--full" name="nama_pengunjung[]" placeholder="Misalnya : Raditya"></div>');
			}
		});
	});
</script>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 3000);
	initSample();
</script>
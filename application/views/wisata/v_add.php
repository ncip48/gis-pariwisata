<h3 class="title-5 m-b-35"><?= $title ?></h3>
<div class="row">

	<div class="col-lg-7">
		<div class="card">
			<div class="card-header">Lokasi Pariwisata</div>
			<div class="card-body">
				<div id="mapid" style="height: 700px;"></div>
			</div>
		</div>
	</div>

	<div class="col-lg-5">
		<div class="card">
			<div class="card-header">Data Tempat Pariwisata</div>
			<div class="card-body">
				<?php
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
				if (isset($error_upload)) {
					echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
				}


				echo form_open_multipart('wisata/add');
				?>


				<div class="form-group">
					<label>Nama Tempat</label>
					<input name="nama_tempat" placeholder="Nama Tempat" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<input name="alamat" placeholder="Alamat" class="form-control">
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Desa</label>
							<input name="desa" placeholder="Desa" class="form-control">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Kecamatan</label>
							<input name="kec" placeholder="Kecamatan" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Kabupaten</label>
							<input name="kab" placeholder="Kabupaten" type="text" class="form-control">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Provinsi</label>
							<input name="prov" placeholder="Provinsi" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Latitude</label>
							<input id="Latitude" name="latitude" placeholder="Latitude" type="text" class="form-control">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Longitude</label>
							<input name="longitude" id="Longitude" placeholder="Longitude" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Harga Tiket Masuk</label>
					<input name="harga" placeholder="Harga" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="deskripsi" id="" rows="2" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label>Icon Marker</label>
					<select name="id_icon" class="form-control">
						<?php foreach ($icon as $key => $value) { ?>
							<option value="<?= $value->id_icon ?>"><?= $value->nama_icon ?></option>
						<?php } ?>
					</select>

				</div>

				<div class="form-group">
					<label>Gambar</label>
					<input type="file" name="gambar" class="form-control" required>
				</div>

				<div>
					<button type="submit" class="btn btn-info">Simpan</button>
					<button type="reset" class="btn btn-success">Reset</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
	var curLocation = [0, 0];
	if (curLocation[0] == 0 && curLocation[1] == 0) {
		curLocation = [-7.676190, 109.663699];
	}

	var mymap = L.map('mapid').setView([-7.676190, 109.663699], 11);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	}).addTo(mymap);

	mymap.attributionControl.setPrefix(false);
	var marker = new L.marker(curLocation, {
		draggable: 'true'
	});

	marker.on('dragend', function(event) {
		var position = marker.getLatLng();
		marker.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();
		$("#Latitude").val(position.lat);
		$("#Longitude").val(position.lng).keyup();
	});

	$("#Latitude, #Longitude").change(function() {
		var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
		marker.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();
		mymap.panTo(position);
	});
	mymap.addLayer(marker);
</script>
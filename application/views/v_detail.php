<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3">Lokasi</strong>
		</div>
		<div class="card-body">
			<div id="map" style="width: 100%; height: 450px;"></div>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3">Gambar Lokasi</strong>
		</div>
		<div class="card-body">
			<img src="<?= base_url('gambar/' . $wisata->gambar) ?>" height="500px" width="100%">
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3">Data Tempat Wisata</strong>
		</div>
		<div class="card-body">
			<table class="table">
				<tr>
					<th width="200px">Nama Tempat</th>
					<th width="20px">:</th>
					<td><?= $wisata->nama_tempat ?></td>
				</tr>
				<tr>
					<th width="200px">Alamat</th>
					<th>:</th>
					<td><?= $wisata->alamat ?></td>
				</tr>
				<tr>
					<th width="200px">Desa</th>
					<th>:</th>
					<td><?= $wisata->desa ?></td>
				</tr>
				<tr>
					<th width="200px">Kecamatan</th>
					<th>:</th>
					<td><?= $wisata->kec ?></td>
				</tr>
				<tr>
					<th width="200px">Kabupaten</th>
					<th>:</th>
					<td><?= $wisata->kab ?></td>
				</tr>
				<tr>
					<th width="200px">Provinsi</th>
					<th>:</th>
					<td><?= $wisata->prov ?></td>
				</tr>
				<tr>
					<th width="200px">Deskripsi</th>
					<th>:</th>
					<td><?= $wisata->deskripsi ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>





<script>
	navigator.geolocation.getCurrentPosition(function(location) {
		var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
		var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
		});

		var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
			attribution: 'google'
		});

		var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});

		var map = L.map('map', {
			center: [<?= $wisata->latitude  ?>, <?= $wisata->longitude  ?>],
			zoom: 18,
			layers: [peta2]
		});

		var baseLayers = {
			"Grayscale": peta1,
			"Satelite": peta2,
			"Streets": peta3
		};
		L.control.layers(baseLayers).addTo(map);
		L.marker([<?= $wisata->latitude ?>, <?= $wisata->longitude ?>], {
			icon: L.icon({
				iconUrl: '<?= base_url('marker/' . $wisata->icon)  ?>',
				iconSize: [50, 50], // size of the icon
			})
		}).addTo(map).bindPopup("<img src='<?= base_url('gambar/' . $wisata->gambar) ?>' width='280px'>" +
			"Nama Tempat : <?= $wisata->nama_tempat ?></br>" +
			"Alamat : <?= $wisata->alamat ?></br>" +
			"Desa : <?= $wisata->desa ?></br>" +
			"<a href='https://www.google.com/maps/dir/?api=1&origin=" +
			location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $wisata->latitude ?>,<?= $wisata->longitude ?>' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a>").openPopup();
	});
</script>
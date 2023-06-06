<div class="col-md-12">
	<div id="map" style="width: 100%; height: 550px;"></div>
</div>


<script>
	navigator.geolocation.getCurrentPosition(function(location) {
		var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
		var grupwisata = L.layerGroup();
		var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
		});

		var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/satellite-v9'
		});

		var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});

		var map = L.map('map', {
			center: [-7.676190, 109.663699],
			zoom: 11,
			layers: [peta3, grupwisata]
		});

		var baseLayers = {
			"Grayscale": peta1,
			"Satelite": peta2,
			"Streets": peta3
		};

		var overlays = {
			"Wisata": grupwisata,
		};

		L.control.layers(baseLayers, overlays).addTo(map);


		<?php foreach ($wisata as $key => $value) { ?>

			L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
				icon: L.icon({
					iconUrl: '<?= base_url('marker/' . $value->icon)  ?>',
					iconSize: [50, 50], // size of the icon
				})
			}).addTo(grupwisata).bindPopup("<img src='<?= base_url('gambar/' . $value->gambar) ?>' width='280px'>" +
				"Nama Tempat : <?= $value->nama_tempat ?></br>" +
				"Alamat : <?= $value->alamat ?></br>" +
				"Desa : <?= $value->desa ?></br>" +
				"<a href='<?= base_url('home/detail/' . $value->id_wisata) ?>' class='btn btn-sm btn-outline-primary'>Detail</a>" +
				"<a href='https://www.google.com/maps/dir/?api=1&origin=" +
				location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value->latitude ?>,<?= $value->longitude ?>' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a>");
		<?php } ?>
	});
</script>
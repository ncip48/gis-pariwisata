<div class="col-md-12">
	<!-- DATA TABLE -->
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<div class="table-data__tool">
		<div class="table-data__tool-left">
			<div class="rs-select2--light rs-select2--md">
				<a href="<?= base_url('json/edit') ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
					<i class="zmdi zmdi-plus"></i> Ganti JSON</a>

			</div>
		</div>
	</div>

	<?php

	if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo $this->session->flashdata('pesan');
		echo '</div>';
	}

	?>
	<label for="">File GeoJSON : <a href="<?= base_url('geojson/' . $json->geojson) ?>"><?= $json->geojson ?></a> </label>
	<div id="mapid" style="height: 500px;"></div>


	<script>
		var mymap = L.map('mapid').setView([1.458558, 102.218316], 11);
		L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
			attribution: 'google'
		}).addTo(mymap);

		$.getJSON("<?= base_url('geojson/' . $json->geojson) ?>", function(data) {
			geoLayer = L.geoJson(data, {
				style: function(feature) {

				},
			}).addTo(mymap);

		});
	</script>

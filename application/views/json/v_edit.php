<div class="col-lg-12">
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<div class="card">
		<div class="card-header">Data JSON</div>
		<div class="card-body">
			<?php
			echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
			}


			echo form_open_multipart('json/edit/');
			?>


			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>Nama File</label>
						<input name="nama_file" value="<?= $json->nama_file ?>" placeholder="Nama File" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label>File GEOJSON</label>
					<input type="file" name="geojson" class="form-control">
				</div>
			</div>



			<div>
				<button type="submit" class="btn btn-info">Simpan</button>
				<a href="<?= base_url('json') ?>" type="reset" class="btn btn-success">Kembali</a>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

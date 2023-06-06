<div class="col-lg-12">
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<div class="card">
		<div class="card-header">Edit Data Icon</div>
		<div class="card-body">
			<?php
			echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
			}


			echo form_open_multipart('icon/add');
			?>

			<div class="form-group">
				<label>*) Format Icon Harus .PNG</label>

			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>Nama Icon</label>
						<input name="nama_icon" placeholder="Nama Icon" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label>Icon</label>
					<input type="file" name="marker" placeholder="No Telpon" class="form-control" required>
				</div>
			</div>



			<div>
				<button type="submit" class="btn btn-info">Simpan</button>
				<button type="reset" class="btn btn-success">Reset</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
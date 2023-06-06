<div class="col-lg-12">
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<div class="card">
		<div class="card-header">Data User</div>
		<div class="card-body">
			<?php
			echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
			}


			echo form_open_multipart('user/edit/' . $user->id_user);
			?>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>Nama User</label>
						<input name="nama_user" value="<?= $user->nama_user ?>" placeholder="Nama User" type="text" class="form-control">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label>E-Mail</label>
						<input name="email" value="<?= $user->email ?>" placeholder="Nama User" class="form-control">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>Password</label>
						<input name="password" value="<?= $user->password ?>" placeholder="Password" class="form-control">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label>No Telpon</label>
						<input name="no_telpon" value="<?= $user->no_telpon ?>" placeholder="No Telpon" class="form-control">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Foto</label>
				<img src="<?= base_url('foto/' . $user->foto) ?>" width="150px">
			</div>

			<div class="form-group">
				<label>Ganti Foto</label>
				<input type="file" name="foto" placeholder="No Telpon" class="form-control">
			</div>

			<div>
				<button type="submit" class="btn btn-info">Simpan</button>
				<button type="reset" class="btn btn-success">Reset</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

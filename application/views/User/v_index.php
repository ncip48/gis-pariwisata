<div class="col-md-12">
	<!-- DATA TABLE -->
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<div class="table-data__tool">
		<div class="table-data__tool-left">
			<div class="rs-select2--light rs-select2--md">
				<a href="<?= base_url('user/add'); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
					<i class="zmdi zmdi-plus"></i> Add</a>
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
	<table class="table table-borderless table-striped table-earning table-responsive">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>E-Mail</th>
				<th>Password</th>
				<th>No Telpon</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($user as $key => $value) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $value->nama_user ?></td>
					<td><?= $value->email ?></td>
					<td><?= $value->password ?></td>
					<td><?= $value->no_telpon ?></td>
					<td><img src="<?= base_url('foto/' . $value->foto)  ?>" width="200px"></td>
					<td>
						<a href="<?= base_url('user/edit/' . $value->id_user) ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
						<a href="<?= base_url('user/delete/' . $value->id_user) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

<div class="col-md-12">
	<!-- DATA TABLE -->
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<!-- <div class="table-data__tool">
		<div class="table-data__tool-left">
			<div class="rs-select2--light rs-select2--md">
				<a href="<?= base_url('icon/add'); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
					<i class="zmdi zmdi-plus"></i> Add</a>
			</div>
		</div>
	</div> -->

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
				<th>Nama Wisata</th>
				<th>Pemesan</th>
				<th>Jumlah Orang</th>
				<th>Total</th>
				<th>Identitas Pengunjung</th>
				<th>Tanggal Rencana</th>
				<th>Tanggal Expired</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($etiket as $key => $value) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $value->nama_tempat ?></td>
					<td><b><?= $value->nama_pemesan ?></b> (No Pemesan : <?= $value->no_pemesan ?>)</td>
					<td><?= $value->jumlah_orang ?></td>
					<td><?= $value->total ?></td>
					<td><?= $value->nama_pengunjung ?></td>
					<td><?= $value->tanggal_rencana ?></td>
					<td><?= $value->tanggal_expired ?></td>
					<td>
						<a target="_blank" href="<?= base_url('etiket/cetak_e_tiket?kode=' . $value->kode_pesanan) ?>" class="btn btn-xs btn-success"><i class="fa fa-print"></i></a>
						<a href="<?= base_url('etiket/delete/' . $value->id_etiket) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
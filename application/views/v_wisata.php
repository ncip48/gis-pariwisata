<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="row align-items-center">
				<div class="col-md-8 col-12">
					<?php if ($keyword != null) : ?>
						Mencari dengan keyword : <b><?= $keyword ?></b>
						<a href="<?= base_url('home/wisata') ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Clear</a>
					<?php endif ?>
				</div>
				<div class="col-md-4 col12 p-0 pull-right">
					<form action="<?= base_url('home/wisata') ?>" method="GET" autocomplete="off">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari Tempat Wisata" value="<?= $keyword ?>">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="card-body">

			<table class="table table-borderless table-striped table-earning table-responsive">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Tempat</th>
						<th>Alamat</th>
						<th>Desa</th>
						<th>Kec</th>
						<th>Gambar</th>
						<th>Harga Tiket Masuk</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($wisata as $key => $value) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->nama_tempat ?></td>
							<td><?= $value->alamat ?></td>
							<td><?= $value->desa ?></td>
							<td><?= $value->kec ?></td>

							<td><img src="<?= base_url('gambar/' . $value->gambar)  ?>" width="200px"></td>
							<td>Rp. <?= $value->harga ?></td>
							<td>
								<a href="<?= base_url('home/detail/' . $value->id_wisata) ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Detail</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>


		</div>
	</div>
</div>
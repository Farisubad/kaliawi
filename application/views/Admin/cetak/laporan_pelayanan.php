<div class="container-fluid">
	<h1 class="h4 mb-4 text-gray-800">Laporan Data pelayanan</h1>
	<hr>
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold text-primary">Cetak Laporan Pelayanan Per Tanggal</h6>
					</center>
				</div>
				<?php if ($this->session->flashdata('danger')) : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('danger'); ?>
					</div>
				<?php endif; ?>
				<div class="card-body">
					<form method="get" action="<?php echo base_url("Cetak/cetaktgl") ?>">


						<div class="form-group">
							<label>Tanggal Mulai</label>
							<br>
							<input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Tanggal Akhir</label>
							<input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">

						</div>
						<br>
						<div class="float-right">
							<!-- <a href="<?= base_url('cetak/cetak_datapelayanan') ?>" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;&nbsp;Semua pelayanan</a> -->
							<button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak</button>

						</div>
				</div>

				</form>

			</div>
		</div>

		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<center>
						<h6 class="m-0 font-weight-bold text-primary">Cetak Laporan Pelayanan Per Jenis Pelayanan</h6>
					</center>
				</div>
				<?php if ($this->session->flashdata('danger')) : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('danger'); ?>
					</div>
				<?php endif; ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>

									<th scope="col" class="text-center">No</th>
									<th scope="col" class="text-center">Nama Pelayanan</th>
									<th scope="col" class="text-center">Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$no = 1;
								foreach ($surat as $s) {
								?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $s['nama_pelayanan'] ?></td>
										<td>
											<a href="<?= base_url('Cetak/cetak_persurat/' . $s['id_jenis']) ?>" class="btn btn-dark btn-sm"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak</a>

										</td>
									</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


</div>

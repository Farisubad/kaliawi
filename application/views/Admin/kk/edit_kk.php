<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Edit Data KK</h6>
				</div>
				<?php foreach ($kk as $kk) { ?>

					<div class="row">
						<div class="col-md-6">
							<div class="card-body">

								<?= form_open('kartu_keluarga/update'); ?>
								<div class="form-group">
									<label for="username">No KK</label>
									<input type="hidden" name="id_kk" id="id_kk" value="<?php echo $kk->id_kk; ?>">
									<input type="text" class="form-control" id="no_kk" value="<?php echo $kk->no_kk ?>" id="no_kk" name="no_kk">
								</div>

								<div class="form-group">
									<label for="username">Alamat</label>
									<input type="text" class="form-control" id="alamat" value="<?php echo $kk->alamat ?>" name="alamat" placeholder="">
								</div>

								<div class="form-group">
									<label for="username">Rt/Rw</label>
									<input type="text" class="form-control" id="rt_rw" value="<?php echo $kk->rt_rw ?>" name="rt_rw" placeholder="">
								</div>

								<div class="form-group">
									<label for="username">Desa / Kelurahan</label>
									<input type="text" class="form-control" id="desa" value="<?php echo $kk->desa_kelurahan ?>" name="desa_kelurahan" placeholder="">
								</div>

							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<div class="card-body">

									<div class="form-group">
										<label for="username">Kecamatan</label>
										<input type="text" class="form-control" id="kecamatan" value="<?php echo $kk->kecamatan ?>" name="kecamatan" placeholder="">
									</div>

									<div class="form-group">
										<label for="username">Kabupaten / Kota</label>
										<input type="text" class="form-control" id="kabupaten_kota" value="<?php echo $kk->kabupaten_kota ?>" name="kabupaten_kota" placeholder="">
									</div>

									<div class="form-group">
										<label for="username">Provinsi</label>
										<input type="text" class="form-control" id=provinsi" value="<?php echo $kk->provinsi ?>" name="provinsi" placeholder="">
									</div>
									<div class="float-right">
										<a href="<?= base_url('kartu_keluarga') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
										<button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
									</div>
								</div>
							</div>
							<?= form_close(); ?>
						<?php } ?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
</div>

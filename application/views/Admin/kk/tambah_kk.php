<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data kk</h1> -->
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Tambah Data KK</h6>
				</div>
				<?php if ($this->session->flashdata('danger')) : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('danger'); ?>
					</div>
				<?php endif; ?>
				

								<?= form_open('kartu_keluarga/tambahdata'); ?>
								
					<div class="row">
						<div class="col-md-6">
							<div class="card-body">
								<div class="form-group">
									<label for="nama">No Kartu Keluarga</label>
									<input type="number" class="form-control" id="no_kk" placeholder="" name="no_kk">
									<?= form_error('no_kk', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="nama">Alamat</label>
									<input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
									<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="nama">Rt/Rw</label>
									<input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="">
									<?= form_error('rt_rw', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="nama">Desa / Kelurahan</label>
									<input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" placeholder="">
									<?= form_error('desa_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
					
					 <div class="col-md-6">
						<div class="form-group">
							<div class="card-body">


								<div class="form-group">
									<label for="nama">Kecamatan</label>
									<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="">
									<?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="nama">Kabupaten / Kota</label>
									<input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" placeholder="">
									<?= form_error('kabupaten_kota', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="nama">Provinsi</label>
									<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="">
									<?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="float-right">
						<a href="<?= base_url('kartu_keluarga') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
						<button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Tambah</button>
						<button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-eraser "></i>&nbsp;&nbsp; Reset</button>
					</div>
								


							</div>
						</div>

				</div>
				
			</div>
			
			
			</div>
			
			
			
		</div>
		<?= form_close(); ?>
		</div></div></div>

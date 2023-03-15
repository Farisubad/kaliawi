<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Edit Password </h6>
				</div>
				<div class="card-body">

				<?= form_open_multipart('Profile/updatepw_masyarakat'); ?>

					<div class="form-group">
						<label for="username">Password Baru </label>
						<input type="password" class="form-control" id="pw_baru" name="pw_baru" placeholder="Isi Password">
                                        <?= form_error('pw_baru', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="username">Konfirmasi Password Baru</label>
						<input type="password" class="form-control"  id="konfir_pw" name="konfir_pw" placeholder="Ulangi Password">
                                        <?= form_error('konfir_pw', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="float-right">
                                <a href="<?= base_url('Dashboard') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                <button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                            </div> 
					
					
					<?= form_close(); ?>



				</div>
			</div>
		</div>
	</div>
</div>
</div>

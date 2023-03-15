<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="row justify-content-center">
		<div class="col-lg-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Tambah Data Penduduk</h6>
				</div>
				<?php if ($this->session->flashdata('danger')) : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('danger'); ?>
					</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-md-6">
						<div class="card-body">

							<?= form_open('Penduduk/tambahdata'); ?>
							<div class="form-group">
								<label for="nama">No KK</label>
								<input type="hidden" name="id_kk" id="id_kk" value="<?php echo $kk['id_kk'] ?>">
								<input type="number" class="form-control" value="<?php echo $kk['no_kk'] ?>" readonly id="kk_no" placeholder="" name="kk_no">
								
							</div>

							<div class="form-group">
								<label for="nama">NIK</label>
								<input type="number" class="form-control" id="nik" placeholder="" name="nik">
								<?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="form-group">
								<label for="nama">Nama Penduduk</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="">
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="form-group">
								<label for="nama">Tempat Lahir</label>
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="">
								<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="form-group">
								<label for="nama">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="">
								<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							
								
								
						


						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<div class="card-body">

						<label for="">Jenis Kelamin</label>
								<div class="form-group">
									<select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
										<option value="" selected disabled>Pilih</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

							<label for="">Agama</label>
							<div class="form-group">
								<select name="agama" id="agama" class="custom-select">
									<option value="" selected disabled>Pilih</option>
									<option value="Islam">Islam</option>
									<option value="Hindu">Hindu</option>
									<option value="Kristen">Kristen</option>
									<option value="Buddha">Buddha</option>
									<option value="Khonghucu">Khonghucu</option>
								</select>
								<?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>


							

							<label for="">Status</label>
							<div class="form-group">
								<select name="status" id="status" class="custom-select">
									<option value="" selected disabled>Pilih</option>
									<option value="Menikah">Menikah</option>
									<option value="Belum Menikah">Belum Menikah</option>
									<option value="Cerai Hidup">Cerai Hidup</option>
									<option value="Cerai Mati">Cerai Mati</option>
								</select>
								<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<label for="">Pekerjaan</label>
							<div class="form-group">
								<select name="pekerjaan" id="pekerjaan" class="custom-select">
									<option value="" selected disabled>Pilih</option>
									<option value="Tni/Polri">TNI/POLRI</option>
									<option value="Pns">PNS</option>
									<option value="Guru">Guru</option>
									<option value="Pedagang">Pedagang</option>
									<option value="Wiraswasta">Wiraswasta/Pegawai Swasta</option>
									<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
									<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
									<option value="Tidak Bekerja">Tidak Bekerja</option>
								</select>
								<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>


							<label for="">Kedudukan</label>
							<div class="form-group">
								<select name="kedudukan" id="kedudukan" class="custom-select">
									<option value="" selected disabled>Pilih</option>
									<option value="Kepala Keluarga">Kepala Keluarga</option>
									<option value="Istri">Istri</option>
									<option value="Anak">Anak</option>
									<option value="Keluarga Lain">Keluarga Lain</option>
								</select>
								<?= form_error('kedudukan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="float-right">
								<a href="<?= base_url('Penduduk/tambah') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
								<button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Tambah</button>
								<button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-eraser "></i>&nbsp;&nbsp; Reset</button>
							</div>


						</div>


					</div>

				</div>

			</div>
			

			<?= form_close(); ?>
		</div>
	</div>
</div>
</div>
</div>

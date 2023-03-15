<div class="container-fluid">

	
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Edit Data Penduduk</h6>
				</div>
				<?php foreach ($penduduk as $pe) { ?>

					<div class="row">
						<div class="col-md-6">
							<div class="card-body">

								<?= form_open('penduduk/update'); ?>
								<input type="hidden" class="form-control" id="id_m" value="<?php echo $pe->id_m ?>" id="id_m" name="id_m">
                                <div class="form-group">
									<label for="username">No KK</label>
                                    <select name="kk_id" id="kk_id" class="form-control" readonly value="<?php echo $pe->kk_id ?>" name="kk_id" placeholder="">
                                    <option hidden>Pilih Nama</option>
                                    <?php foreach ($kartu as $nm) : ?>
                                        <option <?= $pe->kk_id == $nm['id_kk'] ? 'selected' : ''; ?> hidden<?= set_select('kk_id', $nm['id_kk']) ?> <?= $nm['id_kk'] ?>><?= $nm['no_kk'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
								</div>

								<div class="form-group">
									<label for="username">NIK</label>
									<input type="number" class="form-control" id="nik" value="<?php echo $pe->nik ?>" name="nik" placeholder="">
								</div>

								<div class="form-group">
									<label for="username">Nama Penduduk</label>
									<input type="text" class="form-control" id="nama" value="<?php echo $pe->nama ?>" name="nama" placeholder="">
								</div>

								<div class="form-group">
									<label for="username">Tempat Lahir </label>
									<input type="text" class="form-control" id="tempat_lahir" value="<?php echo $pe->tempat_lahir ?>" name="tempat_lahir" placeholder="">
								</div>

                                <div class="form-group">
									<label for="username">Tanggal Lahir</label>
									<input type="date" class="form-control" id="tanggal_lahir" value="<?php echo $pe->tanggal_lahir ?>" name="tanggal_lahir" placeholder="">
								</div>

							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<div class="card-body">

									<label for="">Jenis Kelamin</label>
								<div class="form-group">
									<select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
										<?php foreach ($penduduk as $je) { ?>
											<option value="" selected disabled>Pilih</option>
											<option <?= $pe->jenis_kelamin == $je->jenis_kelamin ? 'selected' : ''; ?> <?= set_select('jenis_kelamin', $je->jenis_kelamin) ?> value="<?= $je->jenis_kelamin ?>"><?= $je->jenis_kelamin ?></option>
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
									</select>
								<?php } ?>
								<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

                                <label for="">Agama</label>
								<div class="form-group">
									<select name="agama" id="agama" class="custom-select">
										<?php foreach ($penduduk as $ag) { ?>
											<option value="" selected disabled>Pilih</option>
											<option <?= $pe->agama == $ag->agama ? 'selected' : ''; ?> <?= set_select('agama', $ag->agama) ?> value="<?= $ag->agama ?>"><?= $ag->agama ?></option>
											<option value="Islam">Islam</option>
											<option value="Hindu">Hindu</option>
											<option value="Kristen">Kristen</option>
											<option value="Buddha">Buddha</option>
											<option value="Khonghucu">Khonghucu</option>
									</select>
								<?php } ?>
								</div>

                                <label for="">Status</label>
								<div class="form-group">
									<select name="status" id="status" class="custom-select">
										<?php foreach ($penduduk as $sta) { ?>
											<option value="" selected disabled>Pilih</option>
											<option <?= $pe->status == $sta->status ? 'selected' : ''; ?> hidden<?= set_select('status', $sta->status) ?> value="<?= $sta->status ?>"><?= $sta->status ?></option>
											<option value="Menikah">Menikah</option>
											<option value="Belum Menikah">Belum Menikah</option>
											<option value="Cerai Hidup">Cerai Hidup</option>
											<option value="Cerai Mati">Cerai Mati</option>
									</select>
								<?php } ?>
								</div>

                                <label for="">Pekerjaan</label>
								<div class="form-group">
									<select name="pekerjaan" id="pekerjaan" class="custom-select">
										<?php foreach ($penduduk as $pkn) { ?>
											<option value="" selected disabled>Pilih</option>
											<option <?= $pe->pekerjaan == $pkn->pekerjaan ? 'selected' : ''; ?> hidden<?= set_select('pekerjaan', $pkn->pekerjaan) ?> value="<?= $pkn->pekerjaan ?>"><?= $pkn->pekerjaan ?></option>
											<option value="Tni/Polri">TNI/POLRI</option>
											<option value="Pns">PNS</option>
											<option value="Guru">Guru</option>
											<option value="Pedagang">Pedagang</option>
											<option value="Wiraswasta/Pegawai Swasta">Wiraswasta/Pegawai Swasta</option>
											<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
											<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
											<option value="Tidak Bekerja">Tidak Bekerja</option>
									</select>
								<?php } ?>
								</div>

                                <label for="">Kedudukan</label>
							<div class="form-group">
								<select name="kedudukan" id="kedudukan" class="custom-select">
									<?php foreach ($penduduk as $kdn) { ?>
										<option value="" selected disabled>Pilih</option>
										<option <?= $pe->kedudukan == $kdn->kedudukan ? 'selected' : ''; ?> <?= set_select('kedudukan', $kdn->kedudukan) ?> value="<?= $kdn->kedudukan ?>"><?= $kdn->kedudukan ?></option>
										<option value="Kepala Keluarga">Kepala Keluarga</option>
										<option value="Istri">Istri</option>
										<option value="Anak">Anak</option>
										<option value="Keluarga Lain">Keluarga Lain</option>
								</select>
							<?php } ?>
							</div>
									<div class="float-right">
										<a href="<?= base_url('Penduduk') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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

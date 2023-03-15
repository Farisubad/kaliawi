<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Detail Pelayanan</h6>
				</div>


				<div class="row">
					<div class="col-md-6">
						<div class="card-body">

							<?= form_open_multipart('pelayanan/update')  ?>
							<?php foreach ($pelayanann as $pj) { ?>

								<label for="">Nama</label>
								<div class="form-group">
								<input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?php echo $pj->id_pelayanan; ?>">
									<select name="nik_m" id="nik_m" class="form-control" readonly value="<?php echo $pj->m_id ?>" name="alamat" placeholder="">
										<option hidden>Pilih Nama</option>
										<?php foreach ($nama as $nm) : ?>
											<option <?= $pj->m_id == $nm['id_m'] ? 'selected' : ''; ?> hidden<?= set_select('m_id', $nm['id_m']) ?> <?= $nm['id_m'] ?>><?= $nm['nama'] ?> </option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label for="username">Tanggal pelayanan</label>
									<input type="text" class="form-control" readonly value="<?php echo $pj->tanggal_pelayanan ?>" name="alamat" placeholder="">
								</div>
								<div class="form-group">
									<label for="username">File Syarat pelayanan</label>
									<input type="text" class="form-control" readonly value="<?php echo $pj->syarat ?>">
									<br>
									<a class="btn btn-dark btn-sm" href="<?= base_url('pelayanan/download_syarat/' . $pj->id_pelayanan) ?>"><i class="fas fa-download"></i> Download</a>
								</div>

						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="card-body">

								<div class="form-group">
									<label for="">Jenis Pelayanan</label>
									<div class="form-group">
										<select name="jenis_id" id="jenis_id" class="form-control" readonly value="<?php echo $pj->jenis_id ?>" name="alamat" placeholder="">>>
											<option hidden>Pilih Pelayanan</option>
											<?php foreach ($jenis as $dk) : ?>
												<option <?= $pj->jenis_id == $dk['id_jenis'] ? 'selected' : ''; ?> hidden<?= set_select('jenis_id', $dk['id_jenis']) ?> hidden<?= $dk['id_jenis'] ?>><?= $dk['nama_pelayanan'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="form-group">
										<label for="username">Balasan Pelayanan</label>
										<!-- <input type="text" class="form-control" readonly value="<?php echo $pj->file ?>"> -->
										<br>
										<div>
											<input type="file" id="file" name="file">
										</div>
									</div>


									<label for="username">Status pelayanan</label>
									<input type="text" class="form-control" readonly value="<?php echo $pj->status_p ?>" name="alamat" placeholder="">



									<br>
									<div class="form-group">
										<div class="float-right">

											<a href="<?= base_url('pelayanan') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
											<button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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
</div>
</div>

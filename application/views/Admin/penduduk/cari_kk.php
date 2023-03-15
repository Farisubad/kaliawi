<div class="container-fluid">

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
	<div class="row justify-content-center">
		<div class="col-lg-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Tambah Data Penduduk</h6>
				</div>
				<?php

				use LDAP\Result;

				if ($this->session->flashdata('danger')) : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('danger'); ?>
					</div>
				<?php endif; ?>
				<div class="card-body">

					<form method="get" action="<?php echo base_url("Penduduk/cari") ?>">

						<!-- <div class="form-group">
                         <label for="nama">No KK</label>
                        <input type="number" class="form-control" id="no_kk" placeholder="" name="no_kk">
                        <?= form_error('no_kkel', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>  -->

						<!-- <div class="form-group">
							<label for="">No Kartu Keluarga</label>
							<select name="id_kk" id="id_kk" class="form-control select2" required>
								<option value="">Cari Kartu Keluarga</option>
								<?php
								$cari = $this->db->get_where('kartu_keluarga');
								foreach ($cari->result() as $cr) {
								?>
									<option value="<?= $cr->id_kk ?> "> <?= $cr->no_kk ?></option>
								<?php } ?>
							</select>
							<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
						</div> -->

						<div class="form-group">
							<select class="js-example-basic-single" id="id_kk" name="id_kk">

								<option value="">Cari Kartu Keluarga</option>
								<?php
								$cari = $this->db->get_where('kartu_keluarga');
								foreach ($cari->result() as $cr) {

								?>
									<option value="<?= $cr->id_kk ?> "> <?= $cr->no_kk ?></option>

								<?php } ?>


								<!-- <option value="AL">Alabama</option>
  <option value="W1">Wyoming</option>
  <option value="W3">bebas</option>
  <option value="W4">taing</option>
  <option value="Wfg">eaoming</option>
  <option value="Wg">l12ming</option>
  <option value="Ws">qqming</option> -->
							</select>

						</div>


						<div class="float-right">
							<a href="<?= base_url('Penduduk') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
							<button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-fw fa-users"></i>&nbsp;&nbsp;Lanjut</button>

						</div>

					</form>

				</div>

			</div>

		</div>
	</div>
</div>
</div>
<script>
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
		$('#id_kk').select2();
	});
</script>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Profile Penduduk</h6>
            </div>
            <div class="card-body">
                <?php foreach ($penduduk as $p) { ?>
                    <?= form_open('profile/update'); ?>

                    <div class="row">
						<div class="col-md-6">
							<div class="card-body">
                    <div class="form-group">
                        <label for="username">No KK</label>
						<select name="kk_id" id="kk_id" class="form-control" readonly value="<?php echo $p->kk_id ?>" name="kk_id" placeholder="">
                                    <option hidden>Pilih Nama</option>
                                    <?php foreach ($kartu as $nm) : ?>
                                        <option <?= $p->kk_id == $nm['id_kk'] ? 'selected' : ''; ?> hidden<?= set_select('kk_id', $nm['id_kk']) ?> <?= $nm['id_kk'] ?>><?= $nm['no_kk'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                    </div>

                    <div class="form-group">
                        <label for="username">NIK</label>
                        <input type="text" class="form-control" readonly value="<?php echo $p->nik ?>" id="nik" name="nik">
                    </div>

                    <div class="form-group">
                        <label for="username">Nama Penduduk</label>
                        <input type="text" class="form-control" id="nama" value="<?php echo $p->nama ?>" name="nama" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="username">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" value="<?php echo $p->tempat_lahir ?>" name="tempat_lahir" placeholder="">
                    </div>

					</div>
						</div>
					
					 <div class="col-md-6">
						<div class="form-group">
							<div class="card-body">

                    <div class="form-group">
                        <label for="username">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" value="<?php echo $p->tanggal_lahir ?>" name="tanggal_lahir" placeholder="">
                    </div>

                    <label for="">Jenis Kelamin</label>
                    <div class="form-group">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                             <?php foreach ($penduduk as $j) { ?>
                            <option value="" selected disabled>Pilih</option>
                             <option <?= $j->jenis_kelamin == $j->jenis_kelamin ? 'selected' : ''; ?> <?= set_select('jenis_kelamin', $j->jenis_kelamin) ?> value="<?= $j->jenis_kelamin ?>"><?= $j->jenis_kelamin ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?php } ?>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label for="">Agama</label>
                    <div class="form-group">
                        <select name="agama" id="agama" class="custom-select">
                             <?php foreach ($penduduk as $a) { ?>
                            <option value="" selected disabled>Pilih</option>
                             <option <?= $p->agama == $a->agama ? 'selected' : ''; ?> <?= set_select('agama', $a->agama) ?> value="<?= $a->agama ?>"><?= $a->agama ?></option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Budha">Budha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                        <?php } ?>
                    </div>

                    

							<div class="float-right">
                                <a href="<?= base_url('Profile') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                <button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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
</div>

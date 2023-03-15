<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Layanan</h6>
                </div>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('tambah')) : ?>
      <div class="alert alert-danger">
    <?php echo $this->session->flashdata('tambah'); ?>
      </div>
    <?php endif; ?>
                <div class="card-body">
                    <div class="card mb-4">
                            <div class="card-header py-3">
                                <label><i class="fa fa-info"></i> Informasi</label>
                                <h6>Format File :<br> <b>Persyaratan dijadikan 1 File Menggunakan Format .PDF</b> <br>
                                </h6>
                            </div>
                        </div>
                    <?= form_open_multipart('permohonan/tambahdata'); ?>
                    <div class="form-group">
                        <label for="nama">NIK</label>
                        <input type="text" class="form-control" id="m_id" placeholder="" readonly value =" <?= $users['nik']; ?>" name="id">
                        <?= form_error('m_id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <label for="">Jenis Surat</label>
                    <div class="form-group">
                        <select name="jenis_id" id="jenis_id" class="custom-select">
                            <option value="" selected disabled>Pilih Jenis Surat</option>
                            <?php foreach ($jenis_surat as $js) : ?>
                                <option <?= set_select('id_jenis', $js['id_jenis']) ?> value="<?= $js['id_jenis'] ?>"><?= $js['nama_pelayanan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                     <div class="row col-sm-10">
                                    <label class="col-sm-10">Syarat pelayanan Layanan</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div>
                                                    <input type="file" id="syarat" name="syarat">
                                        <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

								<div class="float-right">
						<a href="<?= base_url('Permohonan') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
						<button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Tambah</button>
						<button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-eraser "></i>&nbsp;&nbsp; Reset</button>
					</div>

                    
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



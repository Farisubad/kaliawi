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
                <div class="card-body">

                    <?= form_open_multipart('surat/tambahdata'); ?>

                    <div class="form-group">
                        <label for="nama">Nama Pelayanan</label>
                        <input type="text" class="form-control" id="nama_pelayanan" name="nama_pelayanan" placeholder="">
                        <?= form_error('nama_pelayanan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="nama">Syarat 1</label>
                            <input type="text" class="form-control" id="syarat1" name="syarat1" placeholder="">
                            <?= form_error('syarat1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama">Syarat 2</label>
                            <input type="text" class="form-control" id="syarat2" name="syarat2" placeholder="">
                            <?= form_error('syarat2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="nama">Syarat 3</label>
                            <input type="text" class="form-control" id="syarat3" name="syarat3" placeholder="">
                            <?= form_error('syarat3', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama">Syarat 4</label>
                            <input type="text" class="form-control" id="syarat4" name="syarat4" placeholder="">
                            <?= form_error('syarat4', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="<?= base_url('surat') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i>&nbsp;&nbsp;Tambah</button>
                        <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-eraser "></i>&nbsp;&nbsp; Reset</button>
                    </div>
                    <!-- <div class="float-right">
                        <a href="<?= base_url('surat') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div> -->
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Layanan</h6>
            </div>
            <div class="card-body">
                <?php foreach ($surat as $s) { ?>
                    <?= form_open_multipart('surat/update'); ?>

                    <div class="form-group">
                        <label for="username">Nama Layanan</label>
                        <input type="hidden" class="form-control" value="<?php echo $s->id_jenis ?>" id="id_jenis" name="id_jenis">
                        <input type="text" class="form-control" value="<?php echo $s->nama_pelayanan ?>" id="nama_pelayanan" name="nama_pelayanan">
                    </div>
                    
                    <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama">Syarat 1</label>
                        <input type="text" class="form-control" value="<?php echo $s->syarat1 ?>"  name="syarat1" placeholder="">
                        <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama">Syarat 2</label>
                        <input type="text" class="form-control" value="<?php echo $s->syarat2 ?>"  name="syarat2" placeholder="">
                        <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama">Syarat 3</label>
                        <input type="text" class="form-control" value="<?php echo $s->syarat3 ?>" name="syarat3" placeholder="">
                        <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama">Syarat 4</label>
                        <input type="text" class="form-control" value="<?php echo $s->syarat4 ?>" name="syarat4" placeholder="">
                        <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>

					<div class="float-right">
                                <a href="<?= base_url('surat') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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

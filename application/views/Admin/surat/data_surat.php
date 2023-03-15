<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Jenis Pelayanan</h1>
    <hr>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="float-left"><a href="<?= base_url('Surat/tambah/') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
        </div>

        <div class="row no-gutters">
            <div class="table-responsive">

                <?php if ($this->session->flashdata('succses')) : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('succses'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('primary')) : ?>
                    <div class="alert alert-primary">
                        <?php echo $this->session->flashdata('primary'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama Pelayanan</th>
                                    <th scope="col" class="text-center">Syarat Pelayanan </th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($surat as $s) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $s['nama_pelayanan']; ?></td>
                                        <td><span class="badge alert-info"><?= $s['syarat1']; ?></span><br>
                                            <span class="badge alert-info"><?= $s['syarat2']; ?></span><br>
                                            <span class="badge alert-info"><?= $s['syarat3']; ?></span><br>
                                            <span class="badge alert-info"><?= $s['syarat4']; ?></span>
                                        </td>

                                        <td>
                                            <a href="<?= base_url('surat/edit/' . $s['id_jenis']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                            <a href="<?= base_url('surat/hapus/' . $s['id_jenis']) ?>" onclick="return confirm('Apakah ingin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--End of Main Content -->
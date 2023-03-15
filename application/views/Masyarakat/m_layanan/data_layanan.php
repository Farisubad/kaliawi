<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Jenis Layanan</h1>
    <hr>

    <div class="card shadow mb-4">

            <div class="card-header py-3"></div>

        <div class="row no-gutters">
            <div class="table-responsive">

                <?php if ($this->session->flashdata('succses')) : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('succses'); ?>
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
                                    <th scope="col" class="text-center">Nama Layanan</th>
                                    <th scope="col" class="text-center">Syarat Pengajuan Layanan</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_permohonan as $dp) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dp['nama_pelayanan']; ?></td>
                                            <td><span class="badge alert-info"><?= $dp['syarat1']; ?></span><br>
                                            <span class="badge alert-info"><?= $dp['syarat2']; ?></span><br>
                                            <span class="badge alert-info"><?= $dp['syarat3']; ?></span><br>
                                            <span class="badge alert-info"><?= $dp['syarat4']; ?></span></td>

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


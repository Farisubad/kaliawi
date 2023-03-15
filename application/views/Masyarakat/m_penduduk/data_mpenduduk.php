<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Penduduk</h1>
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
                                    <th scope="col" class="text-center">Nama Penduduk</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Desa/Kelurahan</th>
                                    <th scope="col" class="text-center">Kecamatan</th>
                                    <th scope="col" class="text-center">Agama</th>

                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mpenduduk as $mp) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $mp['nama']; ?></td>
                                            <td><?= $mp['jenis_kelamin']; ?></td>
                                            <td><?= $mp['desa_kelurahan']; ?></td>
                                            <td><?= $mp['kecamatan']; ?></td>
                                            <td><?= $mp['agama']; ?></td>


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


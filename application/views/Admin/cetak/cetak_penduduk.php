<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Penduduk</h1>
    <hr>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="float-left"><a href="<?= base_url('cetak/cetak_pdf') ?>" class="btn btn-dark btn-sm"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak</a></div>
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
                                    <th scope="col" class="text-center">No KK</th>
                                    <th scope="col" class="text-center">NIK</th>
                                    <th scope="col" class="text-center">Nama Penduduk</th>
                                    <th scope="col" class="text-center">Tempat Tanggal Lahir</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Agama</th>
                                    
                                    <th scope="col" class="text-center">Pekerjaan</th>
                                    <th scope="col" class="text-center">Kedudukan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($penduduk as $p) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p['no_kk']; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['tempat_lahir']; ?>,<?= $p['tanggal_lahir']; ?> </td>
                                        <td><?= $p['jenis_kelamin']; ?></td>
                                        <td><?= $p['agama']; ?></td>
                                        

                                        <td><?= $p['pekerjaan']; ?></td>
                                        <td><?= $p['kedudukan']; ?></td>
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
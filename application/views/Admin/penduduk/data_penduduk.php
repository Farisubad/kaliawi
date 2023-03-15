<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Penduduk</h1>
    <hr>

    <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="float-left"><a href="<?= base_url('Penduduk/tambah/') ?>"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
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
                                    
									<th scope="col" class="text-center">Status Pernikahan</th>
                                    <th scope="col" class="text-center">Pekerjaan</th>
                                    <th scope="col" class="text-center">Kedudukan</th>

                                    <th scope="col" class="text-center">Aksi</th>
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
                                          
											<td><?= $p['status']; ?></td>
                                            <td><?= $p['pekerjaan']; ?></td>
                                            <td><?= $p['kedudukan']; ?></td>


                                            <td>
                                                <a href="<?= base_url('penduduk/edit/' . $p['id_m']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                 <a href="<?= base_url('penduduk/hapus/' . $p['id_m']) ?>" onclick="return confirm('Apakah ingin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                                <a href="<?= base_url('penduduk/detail/' . $p['id_m']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Detail</a>
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


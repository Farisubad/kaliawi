<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Pelayanan Baru</h1>
    <hr>

    <div class="card shadow mb-4">

            <div class="card-header py-3">

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
                                    <th scope="col" class="text-center">NIK</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Tanggal Pelayanan</th>
                                    <th scope="col" class="text-center">Jenis Pelayanan</th>
                
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pelayanann as $pj) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pj['nik']; ?></td>
                                            <td><?= $pj['nama']; ?></td>
                                            <td><?= $pj['tanggal_pelayanan']; ?></td>
                                            <td><?= $pj['nama_pelayanan']; ?></td>
                                            
                                            <td>
                                            <?php if ($pj['status_p'] == 'Diproses') { ?>
                                                <span class="badge alert-info"><?php echo 'Belum Diproses' ?></span>
                                            <?php } ?>
                                        </td>

                                            <td>
                                                <?php if ($pj['status_p'] == 'Telah Diupload') { ?>
                                                <span class="badge alert-success"><?php echo 'Selesai' ?></span>
                                            <?php } else { ?>
												<a href="<?= base_url('pelayanan/ditolak/' . $pj['id_pelayanan']) ?>"  class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;&nbsp;Ditolak</a>
                                                <a href="<?= base_url('pelayanan/detail/' . $pj['id_pelayanan']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Detail</a>
                                            <?php } ?>
                                                
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
</div>
<!--End of Main Content -->


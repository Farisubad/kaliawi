<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Pelayanan Selesai</h1>
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
                                    <th scope="col" class="text-center">Syarat</th>
                                    <th scope="col" class="text-center">File</th>
                                    <th scope="col" class="text-center">Status</th>
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
                                            <td><a href="<?= base_url('d_layanan/aksi_download/' . $pj['syarat']) ?>" onclick="return confirm('Apakah ingin download?')" class="btn btn-info btn-sm"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a></td>
                                               <!-- <td><a href="<?= base_url('d_layanan/aksi_download/' . $pj['file']) ?>" onclick="return confirm('Apakah ingin download?')" class="btn btn-success btn-sm"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a></td> -->
                                            <td> 

                                            <?php if ($pj['status_p'] == 'Telah di Upload') { ?>
                                                <a href="<?= base_url('d_layanan/aksi_download/' . $pj['file']) ?>" onclick="return confirm('Apakah ingin download?')" class="btn btn-success btn-sm"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a>
                                            <?php } elseif ($pj['status_p'] == 'Ditolak') { ?>
                                                <span class="badge alert-danger"><?php echo $pj['status_p'] ?></span>
                                            <?php } else { ?>
                                                <span class="badge alert-warning"><?php echo'Belum Diproses'?></span>
                                            <?php } ?>
                                            </td>
                                                <td>
                                            <?php if ($pj['status_p'] == 'Telah di Upload') { ?>
                                                <span class="badge alert-info"><?php echo $pj['status_p'] ?></span>
                                            <?php } elseif ($pj['status_p'] == 'Ditolak') { ?>
                                                <span class="badge alert-danger"><?php echo $pj['status_p'] ?></span>
                                            <?php } else { ?>
                                                <span class="badge alert-warning"><?php echo'Belum Diproses'?></span>
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


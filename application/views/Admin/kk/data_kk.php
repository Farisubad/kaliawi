<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Data Kartu Keluarga</h1>
    <hr>

    <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="float-left"><a href="<?= base_url('kartu_keluarga/tambah/') ?>"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
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
                                    <th scope="col" class="text-center">No.KK</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">Rt/Rw</th>
                                    <th scope="col" class="text-center">Desa/Kelurahan</th>
                                    <th scope="col" class="text-center">Kecamatan</th>
									<th scope="col" class="text-center">Kabupaten/Kota</th>
									<th scope="col" class="text-center">Provinsi</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kk as $kk) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $kk['no_kk']; ?></td>
                                            <td><?= $kk['alamat']; ?></td>
                                            <td><?= $kk['rt_rw']; ?></td>
                                            <td><?= $kk['desa_kelurahan']; ?></td>
                                            <td><?= $kk['kecamatan']; ?></td>
											<td><?= $kk['kabupaten_kota']; ?></td>
											<td><?= $kk['provinsi']; ?></td>

                                            <td>
                                                 <a href="<?= base_url('kartu_keluarga/edit/' . $kk['id_kk']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                <a href="<?= base_url('kartu_keluarga/hapus/' . $kk['id_kk']) ?>" onclick="return confirm('Apakah ingin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                                <a href="<?= base_url('kartu_keluarga/detail/' . $kk['id_kk']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Detail</a>
                                                <a href="<?= base_url('kartu_keluarga/cetak_kk/' . $kk['id_kk']) ?>" onclick="return confirm('Apakah ingin cetak?')" class="btn btn-dark btn-sm"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak</a>
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


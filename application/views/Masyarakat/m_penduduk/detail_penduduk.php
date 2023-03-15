<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Detail Anggota KK</h1>
    <hr>

        <?php
                foreach ($detail_ as $kk) {
                    ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                        <div class="row">
                        <div class="col-md-5">
                            <label><b>No Keluarga : </b><?php echo $kk['no_kk']; ?></label>
                            <br> <label><b>Alamat : </b><?php echo $kk['alamat']; ?></label>
                            <br> <label><b>RT/RW : </b><?php echo $kk['rt_rw']; ?></label>
							<br><label><b>Desa : </b><?php echo $kk['desa_kelurahan']; ?></label>
                            
                           

                        </div>
                        <div class="col-md-5">

                            <label><b>Kecamatan : </b><?php echo $kk['kecamatan']; ?></label>
							<br> <label><b>Kabupaten / Kota : </b><?php echo $kk['kabupaten_kota']; ?></label>
                            <br> <label><b>Provinsi : </b><?php echo $kk['provinsi']; ?></label>

                        </div>
                    </div>
                </div>
            </div>
            

                    <?php } ?>

    <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="float-left"><a href="<?= base_url('kartu_keluarga/') ?>"  class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a></div>
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
                                    <th scope="col" class="text-center">NIK</th>
                                    <th scope="col" class="text-center">Nama Penduduk</th>
                                    <th scope="col" class="text-center">Tempat Tanggal Lahir</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Agama</th>
									<th scope="col" class="text-center">Status Pernikahan</th>
                                    <th scope="col" class="text-center">Pekerjaan</th>
                                    <th scope="col" class="text-center">Kedudukan</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail_kk as $dk) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                           <td><?= $dk['nik']; ?></td>
                                            <td><?= $dk['nama']; ?></td>
                                            <td><?= $dk['tempat_lahir']; ?>,<?= $dk['tanggal_lahir']; ?> </td>
                                            <td><?= $dk['jenis_kelamin']; ?></td>
                                            <td><?= $dk['agama']; ?></td>
											<td><?= $dk['status']; ?></td>
                                            <td><?= $dk['nama_pekerjaan']; ?></td>
                                            <td><?= $dk['kedudukan']; ?></td>

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


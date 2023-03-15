<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- /.container-fluid -->

    <h1 class="h4 mb-4 text-gray-800">Pengajuan Layanan</h1>
    <hr>

    <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="float-left"><a href="<?= base_url('Permohonan/tambah/') ?>"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></div>
            </div>

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
                                    <th scope="col" class="text-center">Tanggal pelayanan</th>
                                    <th scope="col" class="text-center">Jenis Surat</th>
                                    
                                    <th scope="col" class="text-center">Status</th>
                                
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mpelayanan as $pm) {
                                    ?>
                                    
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pm['nik']; ?></td>
                                            <td><?= $pm['nama']; ?></td>
                                            <td><?= $pm['tanggal_pelayanan']; ?></td>
                                            <td><?= $pm['nama_pelayanan']; ?></td>
                                            <td
                                                <?php if ($pm['status_p']== 'Ditolak') { ?>
                                              
                                                   <center><a href="<?= base_url('pelayanan/detail_penolakan/' . $pm['id_pelayanan']) ?>"  class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;&nbsp;Ditolak</a>
                                                </center> 
                                            <?php } 
                                            
                                            elseif ($pm['file'] == null) {?>
                                                <center><span class="badge alert-warning"><?php echo 'Belum Diproses' ?></span></center>
                                            <?php } 
                                            else { ?>
                                                <center><a href="<?= base_url('permohonan/aksi_download/' . $pm['file']) ?>" onclick="return confirm('Apakah ingin download?')" class="btn btn-success btn-sm"><i class="fa fa-download"></i>&nbsp;&nbsp;Selesai</a></center>
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
<!--End of Main Content -->


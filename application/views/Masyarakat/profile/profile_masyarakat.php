<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil Penduduk</h6>
                </div>

                <div class="card-body">
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
                    <div class="col-md-12">
                     <?php foreach ($penduduk as $p) { ?>
                    <table class="table table-bordered table-striped w-90" id="dataTable" width="100%">
                                <thead></thead>

                                <tbody>
                                     <tr>
                                        <td>No KK</td>
                                        <td><?php echo $p['no_kk'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td><?php echo $p['nik'] ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Nama Penduduk</td>
                                        <td><?php echo $p['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ttl</td>
                                        <td><?php echo $p['tempat_lahir'] ?>, <?php echo $p['tanggal_lahir'] ?></td>
                                    </tr>
                
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?php echo $p['jenis_kelamin'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?php echo $p['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td><?php echo $p['agama'] ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <?php } ?>
                            </div>
                    <br>
                    <div class="float-right">
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                        <a href="<?= base_url('profile/edit') ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                    </div>
                    </div>
                </div>
                </div>
            
        </div>
    </div>
    </div>

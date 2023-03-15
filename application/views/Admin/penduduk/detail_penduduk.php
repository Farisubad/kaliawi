<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">

        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Penduduk</h6>
                </div>

                <?php foreach ($penduduk as $pe) { ?>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">

                                <table class="table table-bordered table-striped w-90" id="dataTable">


                                    <tbody>
                                        <tr>
                                            <td>No KK</td>
                                            <td><?php echo $pe['no_kk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td><?php echo $pe['nik'] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Nama Penduduk</td>
                                            <td><?php echo $pe['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ttl</td>
                                            <td><?php echo $pe['tempat_lahir'] ?>, <?php echo $pe['tanggal_lahir'] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?php echo $pe['jenis_kelamin'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?php echo $pe['alamat'] ?></td>
                                        </tr>



                                    </tbody>
                                </table>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">



                                <div class="card-body">


                                    <table class="table table-bordered table-striped w-90" id="dataTable">


                                        <tbody>
                                            <tr>
                                                <td>Rt/Rw</td>
                                                <td><?php echo $pe['rt_rw'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Desa</td>
                                                <td><?php echo $pe['desa_kelurahan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td><?php echo $pe['kecamatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td><?php echo $pe['agama'] ?></td>
                                            </tr>



                                            <tr>
                                                <td>Status</td>
                                                <td><?php echo $pe['status'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td><?php echo $pe['pekerjaan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan</td>
                                                <td> <?php echo $pe['kedudukan'] ?></td>
                                            </tr>
                                        </tbody>

                                    </table>




                                </div>

                                <div class="row">
                                    <div class="col-md-11">


                                        <div class="float-right">
                                            <a href="<?= base_url('penduduk') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>






                <?php } ?>





            </div>

        </div>
    </div>
</div>
</div>
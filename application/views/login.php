<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pengelolaan Data Kelurahan dan Pengajuan Layanan Masyarakat</title>

 
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">

<style>
       .bg-dark {
  background-color: #778899 !important;
}
.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #f1f1f1;
  background-clip: border-box;
  border: 1px solid #e3e6f0;
  border-radius: 0.35rem;
}

 .bg-login-cs {
  background: url("<?= base_url('assets/'); ?>/img/kelurahan.jpg");
  background-position: center;
  background-size: cover;
}



          </style>
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">
            <br><br><br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-cs">
                            <br><br>
                            
                        </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                             <br><br>
                             <div class="text-center">
                                        <h1 style="font-family: 'Times New Roman' ;" class="h4 text-gray-900 mb-4">Silahkan Login </h1>
                                    </div>
                                                    <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>
                                    <?php echo form_open('login/auth') ?>
                                    <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                 placeholder="Masukkan Username">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                         
                                        placeholder="Masukkan Password">
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="LOGIN">

          
                              
                                        <hr>
                                        <div class="text-center">
                                        <span style="font-family: 'Times New Roman' ; font-size: 14px;" class="h4 text-gray-900 mb-4">Jl. Mayor Infantri Hi.Syohimin Hasan Gg. Bengkel No 1 , Kelurahan Kaliawi Persada, Kota Bandar Lampung Kode Pos 35115</span>
                                    </div>
                                    <?php echo form_close(); ?>
                                    <hr>
                         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>
</html>

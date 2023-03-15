<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
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

				<div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah pelayanan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            	<?php echo ($count['pelayanan']); ?>
                            	</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Jenis Pelayanan
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($jumlah['jenis_pelayanan']); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ($this->session->userdata('akses') == 'admin') : ?>
		<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kartu Keluarga
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($jumlah['kartu_keluarga']); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->session->userdata('akses') == 'admin') : ?>
    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Penduduk
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                             <?php echo ($masyarakat['masyarakat']); ?> 
                            	</div>
                        </div>
                        <div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php endif; ?>
				</div>

    <br>
<br>
<br>
<br><br><br>
    <div class="row justify-content-center">
    <div class="col-lg-6 mb-4">
    <canvas id="myChart"></canvas>
    <?php
    //Inisialisasi nilai variabel awal
    $jenis_kelamin= "";
    $jumlah=null;
    foreach ($hasil as $item)
    {
        $ag=$item->jenis_kelamin;
        $jenis_kelamin .= "'$ag'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $jenis_kelamin; ?>],
            datasets: [{
                label:'Grafik Jenis Kelamin Kelurahan Kaliawi Persada ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)',],
              
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
    </div>

   
    </div> 

</div>
</div>
<!-- /.container-fluid -->

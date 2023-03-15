  <!-- Sidebar -->
  <style>
  	.bg-gray {
  		background-color: #7081FF !important;
  	}
  </style>

  <ul class="navbar-nav bg-dark sidebar sidebar-dark bg-gray accordion" id="accordionSidebar">

  	<!-- Sidebar - Brand -->
  	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
  		<div class="sidebar-brand-icon rotate-n-10">
  			<img width="50px" height="60px" src="<?= base_url() ?>assets/img/logo_2.png" />

  		</div>
  		<div class="sidebar-brand-text mx-0">SIP3L<sup><br />KALIAWI PERSADA</sup></div>
  	</a>

  	<!-- Divider -->
  	<hr class="sidebar-divider">

  	<?php if ($this->session->userdata('akses') == 'admin') : ?>

  		<!-- Nav Item - Dashboard -->
  		<div class="sidebar-heading">
  			Administrator
  		</div>

  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('dashboard') ?>">
  				<i class="fas fa-fw fa-tachometer-alt"></i>
  				<span>Dashboard</span></a>
  		</li>
  	<?php endif; ?>



  	<!-- Divider -->
  	<hr class="sidebar-divider">

  	<?php if ($this->session->userdata('akses') == 'admin') : ?>

  		<div class="sidebar-heading">
  			Menu
  		</div>

  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('kartu_keluarga') ?>">
  				<i class="fas fa-fw fa-users"></i>
  				<span>Data Kartu Keluarga</span></a>
  		</li>
  	<?php endif; ?>


  	<?php if ($this->session->userdata('akses') == 'admin') : ?>

  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('penduduk') ?>">
  				<i class="fas fa-fw fa-user"></i>
  				<span>Data Penduduk</span></a>
  		</li>
  	<?php endif; ?>

  	

	  <?php if ($this->session->userdata('akses') == 'admin') : ?>

<li class="nav-item">
	   <a class="nav-link" href="<?= base_url('surat')?>">
		   <i class="fas fa-list "></i>
		   <span>Jenis pelayanan</span></a>
   </li>
	 <?php endif; ?>

  

  	<?php if ($this->session->userdata('akses') == 'admin') : ?>

  		<li class="nav-item">
  			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
  				<i class="fas fa-fw fa-edit fa-1x"></i>
  				<span>Pelayanan <sup>
  						<font color="red"><?php echo ($pelayanan['pelayanan']); ?></font>
  					</sup> </span>

  			</a>
  			<div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
  				<div class="bg-white py-2 collapse-inner rounded">
  					<!-- header
                                <h6 class="collapse-header">Custom Utilities:</h6> -->
  					<a class="collapse-item" href="<?= base_url('pelayanan'); ?>">Pelayanan Baru <sup><span class="badge alert-danger"><?php echo ($pelayanan['pelayanan']); ?></span></sup></a>
  					<a class="collapse-item" href="<?= base_url('pelayanan/pelayanan_selesai'); ?>">Pelayanan Selesai</a>


  				</div>
  			</div>
  		</li>
  	<?php endif; ?>

  	<?php if ($this->session->userdata('akses') == 'admin') : ?>

  		<li class="nav-item">
  			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser2" aria-expanded="true" aria-controls="collapseUser2">
  				<i class="fas fa-fw fa-print"></i>
  				<span>Cetak Laporan</span>
  			</a>
  			<div id="collapseUser2" class="collapse" aria-labelledby="headingUser2" data-parent="#accordionSidebar">
  				<div class="bg-white py-2 collapse-inner rounded">
  					<!-- header
                                <h6 class="collapse-header">Custom Utilities:</h6> -->
  					<a class="collapse-item" href="<?= base_url('cetak'); ?>">Cetak Penduduk</a>
  					<a class="collapse-item" href="<?= base_url('cetak/pelayanan'); ?>">Cetak Pelayanan</a>



  				</div>
  			</div>
  		</li>
  	<?php endif; ?>

  	<!-- Nav Item - Charts -->

  	<?php if ($this->session->userdata('akses') == 'masyarakat') : ?>
  		<div class="sidebar-heading">
  			UMUM
  		</div>

  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('dashboard') ?>">
  				<i class="fas fa-fw fa-tachometer-alt"></i>
  				<span>Dashboard</span></a>
  		</li>
  	<?php endif; ?>

  	<!-- Nav Item - Tables -->

  	<?php if ($this->session->userdata('akses') == 'masyarakat') : ?>
  		<div class="sidebar-heading">
  			Menu
  		</div>

  		<li class="nav-item">
		 
  			<a class="nav-link" href="<?= base_url('kartu_keluarga/m_detail/' ) ?>">

  				<i class="fas fa-fw fa-users"></i>
  				<span>Data Keluarga</span></a>
  		</li>
		
  	<?php endif; ?>


	  <?php if ($this->session->userdata('akses') == 'masyarakat') : ?>

<li class="nav-item">
 <a class="nav-link" href="<?= base_url('D_layanan/')?>">
	 <i class="fas fa-list"></i>
	 <span>Jenis Pelayanan</span></a>
</li>
<?php endif; ?>

  	<?php if ($this->session->userdata('akses') == 'masyarakat') : ?>

  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('permohonan/') ?>">

  				<i class="fas fa-fw fa-edit fa-2x"></i>
  				<span>Pelayanan</span></a>
  		</li>
  	<?php endif; ?>



  	<!-- Divider -->
  	<hr class="sidebar-divider d-none d-md-block">

  	<!-- Sidebar Toggler (Sidebar) -->
  	<div class="text-center d-none d-md-inline">
  		<button class="rounded-circle border-0" id="sidebarToggle"></button>
  	</div>

  </ul>
  <!-- End of Sidebar -->

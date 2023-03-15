<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Data pelayanan</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <style>
    .line-title {
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>

</head>

<body>
  <img src="assets/img/Logo_Balam.png" style=" float: left; position: absolute; width: 75px; height: auto;">
  <img src="assets/img/Logo_Provinsi.png" style=" float: right; position: absolute; width: 60px; height: auto;">

  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.1; font-size: 18px; font-family:'Times New Roman'; font-weight: bold;">&nbsp;
          PEMERINTAH KOTA BANDAR LAMPUNG
        </span>

        <span style="line-height: 1.1; font-size: 14px; font-family:'Times New Roman'; font-weight: bold;">
				<br>&nbsp;&nbsp;KECAMATAN TANJUNG KARANG PUSAT
          <br>&nbsp;&nbsp;KELURAHAN KALIAWI PERSADA
        </span>

        <span style="line-height: 1.1; font-size: 11px;font-family:'Times New Roman';">
        <br>&nbsp;&nbsp;Alamat : Jl. Mayor Infantri Hi.Syohimin Hasan, Gg. Bengkel 
          <br>&nbsp;&nbsp;Kota Bandar Lampung Kode Pos 35115
        </span>
      </td>
    </tr>

  </table>

  <hr class="line-title">
  <?php
  $kalimat_new = strtoupper($nama_pelayanan['nama_pelayanan']);

  ?>
  
  <p align="center" style="font-weight: bold;">LAPORAN DATA PELAYANAN <?php echo $kalimat_new ?></p><br>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nama Penduduk</th>
        <th class="text-center">Tanggal Pelayanan</th>
        <th class="text-center">Jenis Pelayanan</th>
      </tr>

      <?php
      $no = 1;
      foreach ($pelayanan as $cp) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td><?= $cp['nik']; ?></td>
          <td><?= $cp['nama']; ?></td>
          <td><?= $cp['tanggal_pelayanan']; ?></td>
          <td><?= $cp['nama_pelayanan']; ?></td>
        </tr>

      <?php endforeach ?>

    </table>

  </div>
  <p style="float:right; text-align:center"> <br>
      Bandar Lampung, <?php echo date("d-m-Y") ?> <br>
      Kepala Kelurahan Kaliawi Persada <br> <br> <br> <br> <br>
      <?php echo '.....'?><br>
 
    </p>
</body>

</html>
</html>

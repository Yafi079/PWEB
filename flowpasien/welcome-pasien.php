<?php
// $idpemeriksaan = $_GET['ID_pemeriksaan'];


session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

if (isset($_POST["subreq"])) {

  header("location:request-pasien.php");
  exit;
}

$idpasien = $_SESSION['id'];

$resultpas = mysqli_query($conn, "SELECT * FROM hasil_pemeriksaan WHERE ID_pasien = '$idpasien'");

// var_dump($resultpas);

  if (mysqli_num_rows($resultpas) != 0 ) {
    // $hasilpemeriksaan = query("SELECT * FROM hasil_pemeriksaan
    //   JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
    //   JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
    //   JOIN rujukan ON rujukan.ID_pasien = hasil_pemeriksaan.ID_pasien
    //   JOIN nik ON pasien.nik_pasien = nik.NIKPasien
    //   JOIN dokter ON dokter.ID_dokter = hasil_pemeriksaan.ID_dokter
    //   JOIN poliklinik on dokter.ID_Poli = poliklinik.id_pol
    //   where hasil_pemeriksaan.ID_pasien = '$idpasien'")[0];

      $hasilpemeriksaan = query("SELECT * FROM hasil_pemeriksaan
        JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
        JOIN nik ON pasien.nik_pasien = nik.NIKPasien
        JOIN dokter ON dokter.ID_dokter = hasil_pemeriksaan.ID_dokter
        JOIN poliklinik on dokter.ID_Poli = poliklinik.id_pol
        JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
        where hasil_pemeriksaan.ID_pasien = '$idpasien'")[0];

      // var_dump($hasilpemeriksaan);
  } else {
      $hasilpemeriksaan = query("SELECT * FROM pas_kosong WHERE ID_kos = 1")[0];
  }


 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" />
  <link rel="stylesheet" href="css/coba.css" />
  <script src="//code.tidio.co/vqk1rdvmddzjtkratdhvradewart7maw.js" async></script>
</head>

<body>
  <!-- INI ADALAH HEADER -->
  <?php include_once('includes/navbar.php'); ?>
  <div class="sb-nav-fixed">
    <!-- INI ADALAH SIDEBAR ALIAS MENU BAR -->
    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php') ?>

      <!-- INI ADALAH DIV TERBESAR KONTEN -->
      <div class="dashboard-pasien">
        <!-- TULIS CONTENT DI SINI -->
        <div class="diagnosis-upcomming">
          <div class="diagnosis-baris1">
            <div class="diagnosis">Diagnosis</div>
            <div class="chronic"><?= $hasilpemeriksaan["Diagnosa_utama"] ?></div>
            <div class="status">Status</div>
            <div class="membaik"><?= $hasilpemeriksaan["Kondisi_pasien"] ?></div>
          </div>
          <div class="upcomming-baris2">
            <div class="upcom">Upcomming Appointments</div>
            <div class="tanggal"><?= $hasilpemeriksaan["Tanggal_pemeriksaan"] ?></div>
            <div class="medic">Medical Checkup</div>
            <div class="yafi"><?= $hasilpemeriksaan["Nama_dokter"] ?></div>
          </div>
        </div>
        <div class="pemeriksaan-dasar">
          <div class="grid-suhu">
            <div class="judulsuhu">
              <i class="uil uil-temperature-plus"></i>Suhu Badan
            </div>
            <div class="datasuhu"><?= $hasilpemeriksaan["Suhu_badan"] ?></div>
            <div class="satuansuhu">Celcius</div>
          </div>
          <div class="grid-tekanan">
            <div class="judultekanan">
              <i class="uil uil-heartbeat"></i>Tekanan Darah
            </div>
            <div class="datatekanan"><?= $hasilpemeriksaan["Tekanan_darah"] ?></div>
            <div class="satuantekanan">mmHg</div>
          </div>
          <div class="grid-berat">
            <div class="judulberat">
              <i class="uil uil-weight"></i>Berat Badan
            </div>
            <div class="databerat"><?= $hasilpemeriksaan["Berat_badan"] ?></div>
            <div class="satuanberat">Kg</div>
          </div>
        </div>
        <div class="rawat-jalan">
          <div class="rawatjalanjudul">
            <h2>Rawat Jalan</h2>
          </div>
          <div class="tabelrawatjalan">
            <div class="nomorantrian">
              <h3>Nomor Antrian</h3>
              <div class="datanomorantrian"></div>
            </div>
            <div class="poliklinik">
              <h3>Poliklinik</h3>
              <div class="datapoliklinik"><?= $hasilpemeriksaan["nama_pol"] ?></div>
            </div>
            <div class="pilihandokter">
              <h3>Pilihan Dokter</h3>
              <div class="datapilihandokter"><?= $hasilpemeriksaan["Nama_dokter"] ?></div>
            </div>
            <div class="tanggalpemesanan">
              <h3>Tanggal Pemesanan</h3>
              <div class="datatanggalpemesanan"><?= $hasilpemeriksaan["Tanggal_pemeriksaan"] ?></div>
            </div>
          </div>
        </div>
        <div class="medicine-guide-dashboard">
          <div class="judulmedicineguide">
            <h2>Medicine Guide</h2>
          </div>
          <div class="judultabelmedicineguide">
            <div class="namaobat">
              <h3>Nama Obat</h3>
            </div>
            <div class="dosis">
              <h3>Dosis</h3>
            </div>
            <div class="keterangan">
              <h3>Keterangan</h3>
            </div>
          </div>
          <div class="datamedicineguide">
            <div class="datanamaobat"><?= $hasilpemeriksaan["Nama_obat"] ?></div>
            <div class="datadosis"><?= $hasilpemeriksaan["Dosis"] ?></div>
            <div class="dataketerangan"><?= $hasilpemeriksaan["Keterangan"] ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

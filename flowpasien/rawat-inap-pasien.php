<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$idpasien = $_SESSION['id'];;

$resultpas = mysqli_query($conn, "SELECT * FROM hasil_pemeriksaan WHERE ID_pasien = '$idpasien'");

$hasilpemeriksaan = query("SELECT * FROM pas_kosong WHERE ID_kos = 1")[0];

if (mysqli_num_rows($resultpas) == 1) {
  $hasilpemeriksaan = query("SELECT * FROM hasil_pemeriksaan
    JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
    JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
    JOIN nik ON pasien.nik_pasien = nik.NIKPasien
    JOIN dokter ON dokter.ID_dokter = hasil_pemeriksaan.ID_dokter
    JOIN poliklinik ON poliklinik.id_pol = dokter.ID_poli
    where pasien.ID_pasien = '$idpasien'")[0];
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
  <?php include_once('includes/navbar.php') ?>
  <div class="sb-nav-fixed">
    <!-- INI ADALAH SIDEBAR ALIAS MENU BAR -->
    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php') ?>

      <!-- INI ADALAH DIV TERBESAR KONTEN -->
      <div class="patient-inap">
        <!-- TULIS CONTENT DI SINI -->
        <div class="card-info-inap">
          <div class="information-inap">
            <div class="information-inap-judul">
              <h2>Information</h2>
            </div>
            <div class="informatiom-inap-roomcat">
              <h3>Kamar No <?= $hasilpemeriksaan["Ruang_rawat"] ?></h3>
            </div>
          </div>
          <div class="total-payment-inap">
            <div class="total-payment-inap-judul">
              <h2>Total Payment</h2>
            </div>
            <div class="total-payment-inap-nominal">
              <h1><?= $hasilpemeriksaan["Total"] ?></h1>
            </div>
          </div>
          <div class="nurse-visit-inap">
            <div class="nurse-visit-inap-judul">
              <h2>Nurse Visit</h2>
            </div>
            <div class="nurse-visit-inap-tindakan">
              <h2>Ganti Infus</h2>
            </div>
            <div class="nurse-visit-inap-waktu">
              <h3>29-10-2022 at 07.00 </h3>
            </div>
            <div class="nurse-visit-inap-namaperawat">
              <h3>Sarah Aulia S.Kep</h3>
            </div>
          </div>
        </div>
        <div class="finance-medicine-inap">
          <div class="finance-report-inap">
            <div class="finance-report-inap-judul">
              <h2>Financial report</h2>
            </div>
            <div class="finance-report-inap-judul-tabel">
              <div class="finance-report-inap-judul-tabel-tanggal">
                <h3>Tanggal</h3>
              </div>
              <div class="finance-report-inap-judul-tabel-kategori">
                <h3>Kategori</h3>
              </div>
              <div class="finance-report-inap-judul-tabel-detail">
                <h3>Detail</h3>
              </div>
              <div class="finance-report-inap-judul-tabel-total">
                <h3>Total</h3>
              </div>
            </div>
            <div class="finance-report-inap-data-tabel">
              <div class="finance-report-inap-data-tabel-tanggal">
                <h3><?= $hasilpemeriksaan["Tanggal"] ?></h3>
              </div>
              <div class="finance-report-inap-data-tabel-kategori">
                <h3>Kamar</h3>
              </div>
              <div class="finance-report-inap-data-tabel-detail">
                <h3>VIP</h3>
              </div>
              <div class="finance-report-inap-data-tabel-total">
                <h3>Rp <?= $hasilpemeriksaan["Total"] ?></h3>
              </div>
            </div>
          </div>
          <div class="medicine-guide-inap">
            <div class="judulmedicineguide-inap">
              <h2>Medicine Guide</h2>
            </div>
            <div class="judultabelmedicineguide-inap">
              <div class="namaobat-inap">
                <h3>Nama Obat</h3>
              </div>
              <div class="dosis-inap">
                <h3>Dosis</h3>
              </div>
              <div class="keterangan-inap">
                <h3>Keterangan</h3>
              </div>
            </div>
            <div class="datamedicineguide-inap">
              <div class="datanamaobat-inap"><?= $hasilpemeriksaan["Nama_obat"] ?></div>
              <div class="datadosis-inap"><?= $hasilpemeriksaan["Dosis"] ?></div>
              <div class="dataketerangan-inap"><?= $hasilpemeriksaan["Keterangan"] ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

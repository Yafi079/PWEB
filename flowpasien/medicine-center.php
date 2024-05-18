<!-- Berhasil gk rapi -->
<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$idpasien = $_SESSION['id'];

$resultpas = mysqli_query($conn, "SELECT * FROM hasil_pemeriksaan WHERE ID_pasien = '$idpasien'");

$medicine = query("SELECT * FROM pas_kosong WHERE ID_kos = 1")[0];

if (mysqli_num_rows($resultpas) == 1){

  $medicine = query("SELECT * FROM hasil_pemeriksaan
    JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
    JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
    JOIN   rujukan ON rujukan.ID_pasien = hasil_pemeriksaan.ID_pasien
    JOIN nik ON pasien.nik_pasien = nik.NIKPasien
    JOIN dokter ON dokter.ID_dokter = hasil_pemeriksaan.ID_dokter
    JOIN poliklinik ON poliklinik.id_pol = dokter.ID_poli
    JOIN financial_report ON pasien.ID_pasien = financial_report.ID_pasien
    where pasien.ID_pasien = '$idpasien'")[0];

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PATIENT MEDICINE</title>
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
      <div class="kotak2">
        <!-- TULIS CONTENT DI SINI -->
        <div class="jud-1">
          <span>Berlangsung</span>
        </div>
        <div class="kotak-isi">
          <div class="isi-1">
            <img src="img/QR-code.png" alt="qr-code" />
          </div>
        </div>

        <div class="jud-2">
          <span>Selesai</span>
        </div>
        <div class="isi-2">
          <div class="data-21">
            <div class="layanan"><?= $medicine["kategori_pasien"] ?></div>
            <div class="tanggal"><?= $medicine["Tanggal_pemeriksaan"] ?></div>
            <div class="obat-1"><?= $medicine["Nama_obat"] ?></div>
            <div class="jumlah-1">2x</div>
            <div class="obat-2">Alfentanil</div>
            <div class="jumlah-2">1x</div>
            <div class="obat-3">Benazepril</div>
            <div class="jumlah-3">1x</div>
            <div class="total">Total Biaya</div>
            <div class="rp">Rp 20.000</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

<!-- Berhasil gk rapi -->

<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$idpasien = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PATIENT RECAP</title>
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
      <div class="kotak3">
        <!-- TULIS CONTENT DI SINI -->
        <div class="jud-1">
          <span>Dipesan</span>
        </div>
        <div class="isi-1">
          <div class="data-11">
            <div class="layanan">Rawat Inap</div>
            <div class="tanggal">14 Desember 2022</div>
          </div>
        </div>

        <div class="jud-2">
          <span>Sedang Berjalan</span>
        </div>
        <div class="isi-2">
          <div class="data-21">
            <div class="layanan">Rawat Jalan</div>
            <div class="tanggal">11 Desember 2022</div>
          </div>
        </div>

        <div class="jud-3">
          <span>Selesai</span>
        </div>
        <div class="isi-3">
          <div class="data-31">
            <div class="layanan">Rawat Jalan</div>
            <div class="tanggal">7 Desember 2022</div>
            <div class="total">Total Biaya</div>
            <div class="rp">Rp 2.573.000</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/coba.js"></script>
</body>

</html>

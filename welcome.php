<?php
session_start();

require 'includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$iddokter = $_SESSION['id'];

$upcomming = query("SELECT * FROM req_pasien
join hasil_pemeriksaan ON hasil_pemeriksaan.ID_dokter = req_pasien.id_dokter
join pasien ON pasien.ID_pasien = req_pasien.id_pasien
join nik on nik.NIKPasien = pasien.nik_pasien
where req_pasien.id_dokter = '$iddokter'");
//ambil data dokter query
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
      <div class="main-content">
        <!-- TULIS CONTENT DI SINI -->
        <div class="upcomming-appointment">
          <h2>Upcomming Appointment</h2>

          <div class="sub-appointment">
            <?php foreach ($upcomming as $row) :  ?>
              <div class="garis-ungu">

              </div>
              <div class="periksa">
                <?= $row["aktivitas"]; ?>
              </div>
              <div class="date">
                <?= $row["tgl_periksa"]; ?>
              </div>
              <div class="namaPasien">
                <?= $row["nama"]; ?>
              </div>
              <div class="kamar">
                Room <?= $row["Ruang_rawat"]; ?>
              </div>
            <?php endforeach ?>

          </div>
        </div>

        <!-- STATISTIC 1 -->
        <div class="statistic1">
          <div class="statistic1-head">
            <h3>Kategori Layanan Pasien</h3>
            <br>
          </div>
          <div class="chart-statistic">
            <div id="statistic"></div>
          </div>
        </div>

        <!-- STATISTIC 2 -->
        <div class="statistic2">
          <div class="statistic2-head">
            <h3>Kepuasan Pasien</h3>
            <br>
          </div>
          <div class="chart-kepuasan">
            <div id="kepuasan"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="js/coba.js"></script>

</body>

</html>

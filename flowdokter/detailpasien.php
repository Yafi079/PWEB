<?php
session_start();

require 'includes/functions.php';

$idpasien = $_GET['ID_pasien'];


$hasil_detail = query(
  "SELECT * FROM pasien
  right JOIN hasil_pemeriksaan ON pasien.ID_pasien = hasil_pemeriksaan.ID_pasien
  join nik on pasien.nik_pasien=nik.NIKPasien
  WHERE pasien.ID_pasien='$idpasien'
  ORDER BY Tanggal_pemeriksaan DESC"
);

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

// $buttadd = query("SELECT * FROM req_pasien WHERE id_pasien='$idpasien' limit 1")[0];

?>
<?php

// echo('<pre>');
// var_dump($hasil_detail);
// die;
// $pasien_detail = queri("SELECT * FROM pasien where ID_pasien= '$idpasien'  ")[0];
// $hasil = queri("SELECT * FROM hasil_pemeriksaan where ID_pemeriksaan = '$idpemeriksaan'")[0];
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
</head>

<body>
  <?php include_once('includes/navbar.php') ?>
  <div class="sb-nav-fixed">
    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php') ?>

      <div class="detail-pasien">
        <div class="header-detail-pasien">
          <h2><?= $hasil_detail[0]["nama"] ?></h2>
          <div class="search">
            <input type="text" class="searchTerm" placeholder="Apa yang anda cari ?" />
            <button type="submit" class="searchButton">
              <i class="uil uil-search"></i>
            </button>
          </div>
        </div>

        <?php foreach ($hasil_detail as $row) : ?>
          <div class="list-detail-pasien">
            <div class="tanggal">
              <h3><?= $row["Tanggal_pemeriksaan"] ?></h3>
            </div>
            <div class="vis-butt">
              <a href="medicalrecord.php?idperiksa=<?= $row['ID_pemeriksaan']; ?>"><button class="notebutton btn">
                  <i class="uil uil-stethoscope-alt"></i></button></a>
            </div>
            <div class="kategori-status">
              <div class="kategori"><?= $row["kategori_pasien"] ?></div>
              <div class="room">| Room : <?= $row["Ruang_rawat"] ?></div>
              <div class="status">| Status : <?= $row["Kondisi_pasien"] ?></div>
            </div>
          </div>


        <?php endforeach ?>

        <div class="addBut">
          <a href="formpemeriksaan.php?idpasien=<?= $row['ID_pasien']; ?>"><button class="addButton btn">
              <i class="uil uil-file-plus-alt"></i></button></a>
        </div>


      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>
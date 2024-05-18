<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$dokter = query("SELECT * FROM dokter join poliklinik where poliklinik.id_pol=dokter.ID_Poli");
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
  <?php include_once('includes/navbar.php') ?>
  <div class="sb-nav-fixed">
    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php') ?>

      <div class="daftar-dokter">
        <div class="header-daftar-dokter">
          <h2>Daftar Dokter</h2>
          <div class="search">
            <input type="text" class="searchTerm" placeholder="Siapa yang anda cari ?" />
            <button type="submit" class="searchButton">
              <i class="uil uil-search"></i>
            </button>

          </div>
        </div>
        <?php foreach ($dokter as $row) :  ?>
          <div class="list-daftar-dokter">
            <div class="namPas">
              <h3><?= $row["Nama_dokter"] ?></h3>
            </div>
            <div class="vis-butt">
              <a href="profildokter.php?ID_Dokter=<?= $row["ID_Dokter"] ?>"><button class="notebutton btn">
                  <i class="uil uil-user-md"></i></button></a>
            </div>
            <div class="poli-hp-jaga">
              <div class="poli"><?= $row["nama_pol"] ?></div>
              <div class="hp">| <?= $row["Nomor_telepon"] ?></div>

            </div>

          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

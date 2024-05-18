<?php
session_start();
require 'includes/functions.php';

$iddokter = $_SESSION['id'];
$dokter = query("SELECT * FROM dokter where dokter.ID_dokter = '$iddokter'")[0];
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

      <div class="profile-doctor">
        <!-- TULIS CONTENT DI SINI -->

        <!-- PHOTO PROFIL DOKTER -->
        <div class="profile-tab">
          <div class="photodokter">
            <img src="./img/Dokter1.jpg" />
          </div>
        </div>


        <!-- INFORMASI DOKTER -->
        <div class="profile-info">
          <div>
            <h4> <?= $dokter["Nama_dokter"]; ?></h4>
          </div>
        </div>

        <!-- DETAIL INFORMASI DOKTER -->
        <div class="profile-detail">
          <span><i class="uil uil-user"></i>
            <h3>About</h3>
          </span>
          <br />
          <div class="contactinformation">
            <h4>CONTACT INFORMATION</h4>
            <br />
            <div class="profile-content">
              Nomor Handphpone :
              <div class="content">
                <h4><?= $dokter["Nomor_telepon"]  ?></h4>
              </div>
            </div>
            <br />
            <div class="profile-content">
              Alamat :
              <div class="content">
                <h4><?= $dokter["Alamat"] ?></h4>
              </div>
            </div>
            <br />
            <div class="profile-content">
              E - Mail :
              <div class="content">
                <h4> <?= $dokter["emailDokter"]; ?></h4>
              </div>
            </div>
          </div>
          <br />
          <div class="basicinformation">
            <h4>BASIC INFORMATION</h4>
            <br />
            <div class="profile-content">
              Tanggal Lahir :
              <div class="content">
                <h4><?= $dokter["Tanggal_lahir"] ?></h4>
              </div>
            </div>
            <br />
            <div class="profile-content">
              Jenis Kelamin :
              <div class="content">
                <h4><?= $dokter["Jenis_kelamin"] ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="js/coba.js"></script>
</body>

</html>

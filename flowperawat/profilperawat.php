<?php

session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}
$idperawat = $_SESSION['id'];
$perawatpprofil = query("SELECT * FROM perawat where ID_perawat = '$idperawat'")[0];


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

      <div class="profile-perawat">
        <!-- TULIS CONTENT DI SINI -->

        <!-- PHOTO PROFIL PERAWAT -->
        <div class="profile-tab">
          <div class="photoperawat">
            <img src="./img/perawat.jpeg" />
          </div>
        </div>
        <?php
        // foreach ($perawat as $row) :
        ?>
        <!-- INFORMASI PEWRAWAT -->
        <div class="profile-info">
          <div>
            <h4><?= $perawatpprofil["nama_perawat"] ?></h4>
          </div>
        </div>

        <!-- DETAIL INFORMASI PERAWAT -->
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
                <h4><?= $perawatpprofil["no_telepon"] ?></h4>
              </div>
            </div>
            <br />
            <div class="profile-content">
              Alamat :
              <div class="content">
                <h4><?= $perawatpprofil["alamat"] ?></h4>
              </div>
            </div>
            <br />
            <div class="profile-content">
              E - Mail :
              <div class="content">
                <h4><?= $perawatpprofil["emailPerawat"] ?></h4>
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
                <h4><?= $perawatpprofil["tanggal_lahir"] ?></h4>
              </div>
            </div>
            <br />
            <div class="profile-content">
              Jenis Kelamin :
              <div class="content">
                <h4><?= $perawatpprofil["jenis_kelamin"] ?></h4>
              </div>
            </div>
            <?php
            // endforeach
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

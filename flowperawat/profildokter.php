<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$ID_Dokter = $_GET["ID_Dokter"];

$dokter = query("SELECT * FROM dokter where ID_Dokter = '$ID_Dokter'");
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

        <?php foreach ($dokter as $row) :  ?>
          <!-- INFORMASI DOKTER -->
          <div class="profile-info">
            <div>
              <h4> <?= $row["Nama_dokter"]; ?></h4>
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
                  <h4><?= $row["Nomor_telepon"]  ?></h4>
                </div>
              </div>
              <br />
              <div class="profile-content">
                Alamat :
                <div class="content">
                  <h4><?= $row["Alamat"] ?></h4>
                </div>
              </div>
              <br />
              <div class="profile-content">
                E - Mail :
                <div class="content">
                  <h4> <?= $row["emailDokter"]; ?></h4>
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
                  <h4><?= $row["Tanggal_lahir"] ?></h4>
                </div>
              </div>
              <br />
              <div class="profile-content">
                Jenis Kelamin :
                <div class="content">
                  <h4><?= $row["Jenis_kelamin"] ?></h4>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

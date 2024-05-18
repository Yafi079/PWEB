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
  <title>Document</title>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" />
  <link rel="stylesheet" href="css/coba.css" />
  <script src="//code.tidio.co/vqk1rdvmddzjtkratdhvradewart7maw.js" async></script>
  <script async defer src="https://formfacade.com/include/112874529423591495034/form/1FAIpQLSdlGBbWtyf-_LplA-41BTGYBEyeYDAWDrKVC9Kw0PAN9QCeYg/classic.js?div=ff-compose"></script>
</head>

<body>
  <!-- INI ADALAH HEADER -->
  <?php include_once('includes/navbar.php') ?>
  <div class="sb-nav-fixed">
    <!-- INI ADALAH SIDEBAR ALIAS MENU BAR -->
    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php') ?>

      <!-- INI ADALAH DIV TERBESAR KONTEN -->
      <div class="patient-feedback">
        <!-- TULIS CONTENT DI SINI -->
        <div class="foto-feedback">
          <img src="img/foto2.png" alt="" />
        </div>

        <div class="feedback">
          <div class="textline-feedback">
            <h2>
              Demi peningkatan kinerja kami terhadap kepuasan Anda, harap isi
              feedback berikut:
            </h2>
          </div>
          <div class="form-feedback-content">
            <div id="ff-compose">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

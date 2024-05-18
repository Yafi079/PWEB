<?php
session_start();
require '../includes/functions.php';

$idper = $_SESSION['id'];

var_dump($idper);

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}
$baru = query('SELECT nik.nama, pasien.ID_pasien,
  (SELECT Kondisi_pasien FROM hasil_pemeriksaan WHERE ID_pasien = pasien.ID_pasien ORDER BY Tanggal_pemeriksaan DESC LIMIT 1) as statusterakhir,
  (SELECT kategori_pasien FROM hasil_pemeriksaan WHERE ID_pasien = pasien.ID_pasien ORDER BY Tanggal_pemeriksaan DESC LIMIT 1) as kategoriterakhir
  FROM nik
  join pasien on nik.NIKPasien=pasien.nik_pasien
  ');

 ?>
<?php
// $hasil = queri('SELECT * FROM pasien left JOIN (select * from hasil_pemeriksaan order by Tanggal_pemeriksaan desc limit 1) as hp ON hp.ID_pasien = pasien.ID_pasien ');

// JOIN req_pasien on pasien.ID_pasien = req_pasien.id_pasien
//ambil data dokter query
// echo("<pre>");
// var_dump($baru);
// die;
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

      <div class="daftar-pasien">
        <div class="header-daftar-pasien">
          <h2>Pasien Anda</h2>
          <div class="search">
            <input type="text" class="searchTerm" placeholder="Siapa yang anda cari ?" />
            <button type="submit" class="searchButton">
              <i class="uil uil-search"></i>
            </button>
          </div>
        </div>
        <?php foreach ($baru as $row) : ?>
          <div class="list-daftar-pasien">
            <div class="namPas">
              <h3><?= $row["nama"] ?></h3>
            </div>
            <div class="vis-butt">
              <a href="detailpasien.php?ID_pasien=<?= $row['ID_pasien'] ?>"><button class="notebutton btn">
                  <i class="uil uil-stethoscope-alt"></i></button></a>
            </div>
            <div class="kategori-status">
              <div class="kategori"><?= $row["kategoriterakhir"] ?></div>
              <div class="status">| Status : <?= $row["statusterakhir"] ?></div>
            </div>
          </div>

        <?php endforeach ?>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

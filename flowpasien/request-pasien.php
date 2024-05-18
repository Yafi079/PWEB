<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

function tambah($data)
{

  global $conn;
  $idpasien = $_SESSION['id'];

  // ambil data dari tiap elemen dalam form
  $dokter = htmlspecialchars($data["pilihdokter"]);
  $tgl = htmlspecialchars($data["date"]);

  //query insert Data
  $query = "INSERT INTO req_pasien
            VALUES
            ('','$idpasien','$dokter','','$tgl','','')
          ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

if (isset($_POST["bookup1"])) {
  $tempdr = $_POST["pilihdokter"];

  if (tambah($_POST) > 0) {
    echo "
            <script>
            alert('berhasil book appointment');
              document.location.href = 'welcome-pasien.php';
            </script>
         ";

    exit;
  } else {
    echo "
            <script>
              alert('gagal book appointment');
              document.location.href = 'request-pasien.php';
            </script>
        ";
  }
}

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
      <div class="requestpasien">
        <!-- TULIS CONTENT DI SINI -->
        <div class="gambarreq">
          <img src="img/request.jpg" alt="" />
        </div>
        <div class="formreq">
          <div class="textline">
            <h2>Nikmati Layanan Tepat Waktu, Transparan, & Akuntabel</h2>
            <br>
            <ul>
              <h4>Poliklinik Gizi</h4>
              <li>Dr. Muhammad Yafi</li>
              <br>

              <h4>Poliklinik Umum</h4>
              <li>Dr. Almendo</li>
              <li>Dr. Novandy Dzaky</li>
              <br>

              <h4>Poliklinik Penyakit Dalam</h4>
              <li>Dr. Miranda Tedjasaputra</li>
            </ul>
          </div>
          <div class="formreqcontent">
            <div class="formbold-form-wrapper">


              <!-- FORM -->

              <form action="" class="form-content" method="post">
                <!-- <div class="formbold-mb-5">


                  </div> -->
                <div class="formbold-mb-5">
                  <label for="phone" class="formbold-form-label">
                    Pilihan Dokter
                  </label>
                  <select class="formbold-form-input" name="pilihdokter" id="phone">
                    <option value="1">Dr. Muhammad Yafi</option>
                    <option value="2">Dr. Almendo</option>
                    <option value="3">Dr. Novandy Dzaky</option>
                    <option value="4">Dr. Miranda Tedjasaputra</option>
                  </select>

                </div>
                <div class="flex flex-wrap formbold--mx-3">
                  <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5 w-full">
                      <label for="date" class="formbold-form-label">
                        Tanggal Pemesanan
                      </label>
                      <input type="date" name="date" id="date" class="formbold-form-input" />
                    </div>
                  </div>
                </div>

                <div>

                  <button type="sumbit" name="bookup1" class="formbold-btn">Book Appointment</button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/coba.js"></script>
</body>

</html>

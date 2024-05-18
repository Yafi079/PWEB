<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$idpasien = $_GET['idpasien'];

require '../includes/functions.php';

// $hasilpemeriksaan = query("SELECT * FROM pasien
//   JOIN hasil_pemeriksaan ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
//   JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
//   JOIN rujukan ON rujukan.ID_pasien = hasil_pemeriksaan.ID_pasien
//   JOIN nik ON pasien.nik_pasien = nik.NIKPasien
//   where pasien.ID_pasien = '$idpasien'")[0];

$hasilpemeriksaan = query("SELECT * FROM pasien
                    join nik on pasien.nik_pasien = nik.NIKPasien
                    where ID_pasien = '$idpasien'")[0];


function tambah($data)
{
  global $conn;
  $idpasien = $_GET['idpasien'];
  $iddokter = query("SELECT * FROM req_pasien WHERE id_pasien=$idpasien
                ORDER BY id_upco DESC limit 1");

  $halo = $iddokter[0]["id_dokter"];

  // var_dump($halo);

  $Tanggal_pemeriksaan = htmlspecialchars($data["Tanggal_pemeriksaan"]);
  $Waktu_pemeriksaan = htmlspecialchars($data["Waktu_pemeriksaan"]);
  // $Jenis_kelamin = htmlspecialchars($data["Jenis_kelamin"]);
  // $Usia_pasien = htmlspecialchars($data["Usia_pasien"]);
  $Ruang_rawat = htmlspecialchars($data["Ruang_rawat"]);

  $Suhu_badan = htmlspecialchars($data["Suhu_badan"]);
  $Tekanan_darah = htmlspecialchars($data["Tekanan_darah"]);
  $Berat_badan = htmlspecialchars($data["Berat_badan"]);
  $Riwayat_alergi = htmlspecialchars($data["Riwayat_alergi"]);
  $Keluhan_masuk = htmlspecialchars($data["Keluhan_masuk"]);

  // var_dump($iddokter);
  // var_dump($Tanggal_pemeriksaan);
  // var_dump($Waktu_pemeriksaan);
  // var_dump($Ruang_rawat);
  // var_dump($Suhu_badan);
  // var_dump($Tekanan_darah);
  // var_dump($Berat_badan);
  // var_dump($Riwayat_alergi);
  // var_dump($Keluhan_masuk);


  $query = "INSERT INTO hasil_pemeriksaan
      VALUES ('','$halo','$idpasien','$Tanggal_pemeriksaan','$Suhu_badan',' $Tekanan_darah','$Berat_badan','$Riwayat_alergi','$Keluhan_masuk','','','$Waktu_pemeriksaan','','','','','','','','','','$Ruang_rawat')
      ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

if (isset($_POST["submitperiksaperawat"])) {

  if (tambah($_POST) > 0) {
    // $url = "detailpasien.php?ID_pasien=".$hasilpemeriksaan['ID_pasien'];
    echo "
              <script>
              alert('data berhasil ditambahkan!');
              document.location.href = 'detailpasien.php?ID_pasien=" . $hasilpemeriksaan['ID_pasien'] . "';
              </script>
              ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
  <link rel="stylesheet" href="css/coba.css">
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
      <div class="form-pemeriksaan">
        <div class="header-form">
          <h2>Entry Pemeriksaan Baru</h2>
        </div>
        <div class="nomor-antrian">
          <h3>Nomor Rekam Medis</h3>
          <div>
            <h3>B314</h3>
          </div>
        </div>
        <form action="" class="form-content" method="post">

          <!-- INI ADALAH FORM IDENTITAS PASIEN -->
          <div class="identitas-pasien">
            <div>
              <h3>Identitas Pasien</h3>
            </div>
            <div>
              <label for="namapasien" class="formbold-form-label"> Nama Pasien </label>
              <input type="text" name="namapasien" id="namapasien" placeholder="" class="formbold-form-input" disabled="disabled" value="<?= $hasilpemeriksaan["nama"] ?>" />
            </div>

            <div>
              <label for="tanggalpemeriksaan" class="formbold-form-label"> Tanggal Pemeriksaan </label>
              <input type="date" name="Tanggal_pemeriksaan" id="waktupemeriksaan" placeholder="" class="formbold-form-input" />
            </div>

            <div>
              <label for="waktupemeriksaan" class="formbold-form-label"> Waktu Pemeriksaan </label>
              <input type="time" name="Waktu_pemeriksaan" id="waktupemeriksaan" placeholder="" class="formbold-form-input" />
            </div>

            <div>
              <label for="jeniskelamin" class="formbold-form-label"> Jenis Kelamin </label>

              <input type="text" name="Jenis_kelamin" id="jeniskelamin" placeholder="" class="formbold-form-input" disabled="disabled" value="<?= $hasilpemeriksaan["jenis_kelamin"] ?>" />
            </div>

            <div>
              <label for="usiapasien" class="formbold-form-label"> Usia Pasien </label>

              <input type="text" name="Usia_pasien" id="usiapasien" placeholder="" class="formbold-form-input" disabled="disabled" value="<?php $dateofBirth = $hasilpemeriksaan["tanggal_lahir"];
                                                                                                                                          $today = date("Y-m-d");
                                                                                                                                          $diff = date_diff(date_create($dateofBirth), date_create($today));
                                                                                                                                          $usianow = $diff->format('%y');
                                                                                                                                          echo $usianow . " tahun"; ?>" />
            </div>

            <div>
              <label for="ruangrawat" class="formbold-form-label"> Ruang Rawat </label>
              <input type="text" name="Ruang_rawat" id="ruangrawat" placeholder="" class="formbold-form-input" />
            </div>
          </div>

          <!-- INI ADALAH FORM PEMERIKSAAN AWAL -->
          <div class="pemeriksaan-awal">
            <div>
              <h3>Pemeriksaan Awal</h3>
            </div>
            <div>
              <label for="suhubadan" class="formbold-form-label"> Suhu Badan </label>
              <input type="text" name="Suhu_badan" id="suhubadan" placeholder="" class="formbold-form-input" />
            </div>

            <div>
              <label for="tekanandarah" class="formbold-form-label"> Tekanan Darah </label>
              <input type="text" name="Tekanan_darah" id="tekanandarah" placeholder="" class="formbold-form-input" />
            </div>

            <div>
              <label for="beratbadan" class="formbold-form-label"> Berat Badan </label>
              <input type="text" name="Berat_badan" id="beratbadan" placeholder="" class="formbold-form-input" />
            </div>

            <div>
              <label for="alergi" class="formbold-form-label"> Riwayat Alergi </label>
              <input type="text" name="Riwayat_alergi" id="alergi" placeholder="" class="formbold-form-input" />
            </div>

            <div>
              <label for="keluhan" class="formbold-form-label"> Keluhan Saat Masuk </label>
              <input type="text" name="Keluhan_masuk" id="keluhan" placeholder="" class="formbold-form-input" />
            </div>
          </div>

          <button class="formbold-btn" type="submit" name="submitperiksaperawat">
            Tambahkan
          </button>

        </form>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="js/coba.js"></script>
</body>

</html>

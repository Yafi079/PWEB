<?php
session_start();
require 'includes/functions.php';


function update($datanyapost)
{
  global $conn;

  $idpasien = $_GET['idpasien'];
  // $id = htmlspecialchars($datanyapost["ID_pasien"]);
  $diagnosa_utama = htmlspecialchars($datanyapost["Diagnosa_utama"]);
  $diagnosa_sekunder = htmlspecialchars($datanyapost["Diagnosa_sekunder"]);
  $tindakan = htmlspecialchars($datanyapost["Tindakan"]);
  $instruksi = htmlspecialchars($datanyapost["Instruksi_lanjutan"]);
  $pemeriksaanfisik = htmlspecialchars($datanyapost["Pemeriksaan_fisik"]);
  $hasilpemeriksaanpenunjang = htmlspecialchars($datanyapost["Hasil_pemeriksaan_penunjang"]);
  $catatan = htmlspecialchars($datanyapost["Catatan"]);
  $kategori_pasien = htmlspecialchars($datanyapost["kategori_pasien"]);
  $Kondisi_pasien = htmlspecialchars($datanyapost["Kondisi_pasien"]);
  $Cara_keluar = htmlspecialchars($datanyapost["Cara_keluar"]);
  // $Nama_obat = htmlspecialchars($datanyapost["Nama_obat"]);
  // $Dosis = htmlspecialchars($datanyapost["Dosis"]);
  // $Keterangan = htmlspecialchars($datanyapost["Keterangan"]);
  // $Tujuan_rujukan = htmlspecialchars($datanyapost["Tujuan_rujukan"]);
  // $Dari_rujukan  = htmlspecialchars($datanyapost["Dari_rujukan"]);

  $queryid = query("SELECT * FROM hasil_pemeriksaan WHERE ID_pasien = $idpasien
              ORDER BY ID_pemeriksaan DESC limit 1");

  $querylagi = $queryid[0]["ID_pemeriksaan"];


  $query = "UPDATE hasil_pemeriksaan SET
            Diagnosa_utama = '$diagnosa_utama',
            Diagnosa_sekunder = '$diagnosa_sekunder',
            Tindakan = '$tindakan',
            Instruksi_lanjutan = '$instruksi',
            Pemeriksaan_fisik = '$pemeriksaanfisik',
            Hasil_pemeriksaan_penunjang = '$hasilpemeriksaanpenunjang',
            Catatan = '$catatan',
            kategori_pasien = '$kategori_pasien',
            Kondisi_pasien = '$Kondisi_pasien',
            Cara_keluar = '$Cara_keluar'
            WHERE ID_pemeriksaan = $querylagi";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// INSERT TO RESEP

function updateresep($datanyapost)
{
  global $conn;

  $idpasien = $_GET['idpasien'];
  // $id = htmlspecialchars($datanyapost["ID_pasien"]);
  $Nama_obat = htmlspecialchars($datanyapost["namaobat"]);
  $Dosis = htmlspecialchars($datanyapost["dosis"]);
  $Keterangan = htmlspecialchars($datanyapost["ketobat"]);
  // $Tujuan_rujukan = htmlspecialchars($datanyapost["Tujuan_rujukan"]);
  // $Dari_rujukan  = htmlspecialchars($datanyapost["Dari_rujukan"]);

  $queryiddokter = query("SELECT * FROM req_pasien WHERE id_pasien = $idpasien
                    ORDER BY id_upco DESC limit 1");
  $querydok = $queryiddokter[0]["id_dokter"];

  $queryid = query("SELECT * FROM hasil_pemeriksaan WHERE ID_pasien = $idpasien
              ORDER BY ID_pemeriksaan DESC limit 1");

  $querylagi = $queryid[0]["ID_pemeriksaan"];

  $query2 = "INSERT INTO resep VALUES ('','$querylagi','$querydok','$idpasien','$Nama_obat','$Dosis','$Keterangan')";


  mysqli_query($conn, $query2);

  return mysqli_affected_rows($conn);
}


$idpasien = $_GET['idpasien'];

// $hasilpemeriksaan = query("SELECT * FROM hasil_pemeriksaan
//   JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
//   JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
//   JOIN rujukan ON rujukan.ID_pasien = hasil_pemeriksaan.ID_pasien
//   JOIN nik ON pasien.nik_pasien=nik.NIKPasien
//   where hasil_pemeriksaan.ID_pasien = '$idperiksa'
//   ORDER BY hasil_pemeriksaan.ID_pemeriksaan DESC limit 1")[0];
//
// $hasilpemeriksaan = query("SELECT * FROM hasil_pemeriksaan
//                     JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
//                     JOIN nik ON pasien.nik_pasien=nik.NIKPasien ");

$hasilpemeriksaan = query("SELECT * FROM pasien
                          join nik on pasien.nik_pasien = nik.NIKPasien
                          join hasil_pemeriksaan on pasien.ID_pasien = hasil_pemeriksaan.ID_pasien
                          where hasil_pemeriksaan.ID_pasien = '$idpasien' ORDER BY hasil_pemeriksaan.Tanggal_pemeriksaan DESC limit 1")[0];

if (isset($_POST["submitpemeriksaan"])) {

  if (update($_POST) > 0) {

    if (updateresep($_POST) > 0) {
      echo "
              <script>
              alert('data berhasil ditambahkan!');
              document.location.href = 'detailpasien.php?ID_pasien=" . $hasilpemeriksaan['ID_pasien'] . "';
              </script>
              ";
    }
  }

  echo "
          <script>
          alert('data gagal ditambahkan!');
          </script>
          ";
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
          <h3>ID Rekam Medis</h3>
          <div>
            <h3><?= $hasilpemeriksaan["ID_pemeriksaan"] ?></h3>
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
              <input type="text" name="namapasien" id="namapasien" disabled="disabled" placeholder="" value="<?= $hasilpemeriksaan["nama"] ?>" class="formbold-form-input" />
            </div>

            <div>
              <label for="waktupemeriksaan" class="formbold-form-label"> Waktu Pemeriksaan </label>
              <input type="text" name="waktupemeriksaan" id="waktupemeriksaan" disabled="disabled" placeholder="" class="formbold-form-input" value="<?= $hasilpemeriksaan["Tanggal_pemeriksaan"] ?> | <?= $hasilpemeriksaan["Waktu_pemeriksaan"] ?>" />
            </div>

            <div>
              <label for="jeniskelamin" class="formbold-form-label"> Jenis Kelamin </label>
              <input type="text" name="jeniskelamin" id="jeniskelamin" disabled="disabled" placeholder="" value="<?= $hasilpemeriksaan["jenis_kelamin"] ?>" class="formbold-form-input" />
            </div>

            <div>
              <label for="usiapasien" class="formbold-form-label"> Usia Pasien </label>
              <input disabled="disabled" type="text" name="usiapasien" id="usiapasien" placeholder="" class="formbold-form-input" value="<?php $dateofBirth = $hasilpemeriksaan["tanggal_lahir"];
                                                                                                                                          $today = date("Y-m-d");
                                                                                                                                          $diff = date_diff(date_create($dateofBirth), date_create($today));
                                                                                                                                          $usianow = $diff->format('%y');
                                                                                                                                          echo $usianow . " tahun"; ?>
              " />
            </div>

            <div>
              <label for="ruangrawat" class="formbold-form-label"> Ruang Rawat </label>
              <input type="text" name="ruangrawat" id="ruangrawat" disabled="disabled" placeholder="" value="<?= $hasilpemeriksaan["Ruang_rawat"] ?>" class="formbold-form-input" />
            </div>
          </div>

          <!-- INI ADALAH FORM PEMERIKSAAN AWAL -->
          <div class="pemeriksaan-awal">
            <div>
              <h3>Pemeriksaan Awal</h3>
            </div>
            <div>
              <label for="suhubadan" class="formbold-form-label"> Suhu Badan </label>
              <input type="text" name="suhubadan" id="suhubadan" disabled="disabled" placeholder="" class="formbold-form-input" value="<?= $hasilpemeriksaan["Suhu_badan"] ?>" />
            </div>

            <div>
              <label for="tekanandarah" class="formbold-form-label"> Tekanan Darah </label>
              <input type="text" name="tekanandarah" id="tekanandarah" disabled="disabled" placeholder="" value="<?= $hasilpemeriksaan["Tekanan_darah"] ?>" class="formbold-form-input" />
            </div>

            <div>
              <label for="beratbadan" class="formbold-form-label"> Berat Badan </label>
              <input type="text" name="beratbadan" disabled="disabled" id="beratbadan" disabled="disabled" placeholder="" value="<?= $hasilpemeriksaan["Berat_badan"] ?>" class="formbold-form-input" />
            </div>

            <div>
              <label for="alergi" class="formbold-form-label"> Riwayat Alergi </label>
              <input type="text" name="alergi" disabled="disabled" id="alergi" placeholder="" value="<?= $hasilpemeriksaan["Riwayat_alergi"] ?>" class="formbold-form-input" />
            </div>

            <div>
              <label for="keluhan" class="formbold-form-label"> Keluhan Saat Masuk </label>
              <input type="text" disabled="disabled" name="keluhan" id="keluhan" placeholder="" value="<?= $hasilpemeriksaan["Keluhan_masuk"] ?>" class="formbold-form-input" />
            </div>
          </div>

          <!-- INI ADALAH FORM REKAM MEDIS -->
          <div class="rekam-medis">
            <div>
              <h3>Rekam Medis</h3>
            </div>
            <div>
              <label for="Diagnosa_utama" class="formbold-form-label"> Diagnosa Utama / Akhir : </label>
              <textarea rows="6" name="Diagnosa_utama" id="Diagnosa_utama" placeholder="" class="formbold-form-input"></textarea>
            </div>

            <div>
              <label for="Diagnosa_sekunder" class="formbold-form-label"> Diagnosa Sekunder (Komplikasi+Penyerta) : </label>
              <textarea rows="6" name="Diagnosa_sekunder" id="Diagnosa_sekunder" placeholder="" class="formbold-form-input"></textarea>
            </div>

            <div>
              <label for="Tindakan" class="formbold-form-label"> Nama Operasi/Tindakan : </label>
              <textarea rows="6" name="Tindakan" id="Tindakan" placeholder="" class="formbold-form-input"></textarea>
            </div>

            <div>
              <label for="Instruksi_lanjutan" class="formbold-form-label"> Insturksi untuk tindak lanjut : </label>
              <textarea rows="6" name="Instruksi_lanjutan" id="Instruksi_lanjutan" placeholder="" class="formbold-form-input"></textarea>
            </div>

            <div>
              <label for="Pemeriksaan_fisik" class="formbold-form-label"> Pemeriksaan Fisik : </label>
              <textarea rows="6" name="Pemeriksaan_fisik" id="Pemeriksaan_fisik" placeholder="" class="formbold-form-input"></textarea>
            </div>

            <div>
              <label for="Hasil_pemeriksaan_penunjang" class="formbold-form-label"> Hasil pemeriksaan penunjang : </label>
              <textarea rows="6" name="Hasil_pemeriksaan_penunjang" id="Hasil_pemeriksaan_penunjang" placeholder="" class="formbold-form-input"></textarea>
            </div>

            <div>
              <label for="Catatan" class="formbold-form-label"> Catatan tambahan : </label>
              <textarea rows="6" name="Catatan" id="Catatan" placeholder="Isi jika ada catatan tambahan" class="formbold-form-input"></textarea>
            </div>
            <br>

            <!-- RESEP -->

            <h3>Resep: </h3>
            <br>
            <div class="grid-container">
              <div class="grid-child">
                <div class="name">
                  <label for="namaobat">Nama Obat</label>
                </div>
                <input type="text" id="namaobat" name="namaobat" value="">
              </div>
              <div class="grid-child">
                <div class="name">
                  <label for="dosis">Dosis</label>
                </div>
                <input type="text" id="dosis" name="dosis" value="">
              </div>
              <div class="grid-child">
                <div class="name">
                  <label for="ket">Keterangan</label>
                </div>
                <input type="text" id="ket" name="ketobat" value="">
              </div>
            </div>

            <br>
            <h3>Rujukan Pasien</h3>
            <div class="name">
              <br>
              <label for="namaobat">Fasilitas Kesehatan Rujukan:</label>
            </div>
            <input type="text" id="namaobat" value="">
            <div class="name">
              <br>
              <label for="cattam">Catatan Tambahan:</label>
            </div>
            <textarea id="cattam" rows="5" cols="70" placeholder="Tulis catatan tambahan rujukan di sini"></textarea>

            <!-- INI ADALAH CARA KELUAR PASIEN -->
            <div class="formbold-input-radio-wrapper">
              <label for="carakeluar" class="formbold-form-label">
                <h4>Cara Keluar</h4>
              </label>

              <div class="formbold-radio-flex">
                <div class="kumpulan-radio">
                  <div class="formbold-radio-group">
                    <label class="formbold-radio-label">
                      <input class="formbold-input-radio" type="radio" name="Cara_keluar" id="keluar" value="Dijinkan pulang">
                      Diijinkan Pulang
                      <span class="formbold-radio-checkmark"></span>
                    </label>
                  </div>

                  <div class="formbold-radio-group">
                    <label class="formbold-radio-label">
                      <input class="formbold-input-radio" type="radio" name="Cara_keluar" id="keluar" value="Melarikan diri">
                      Melarikan Diri
                      <span class="formbold-radio-checkmark"></span>
                    </label>
                  </div>

                  <div class="formbold-radio-group">
                    <label class="formbold-radio-label">
                      <input class="formbold-input-radio" type="radio" name="Cara_keluar" id="keluar" value="Pindah rumah sakit">
                      Pindah Rumah Sakit
                      <span class="formbold-radio-checkmark"></span>
                    </label>
                  </div>

                  <div class="formbold-radio-group">
                    <label class="formbold-radio-label">
                      <input class="formbold-input-radio" type="radio" name="Cara_keluar" id="keluar" value="Pulang paksa">
                      Pulang Paksa
                      <span class="formbold-radio-checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>

              <!-- INI ADALAH KONDISI PASIEN -->
              <div class="formbold-input-radio-wrapper">
                <label for="kondisipasien" class="formbold-form-label">
                  <h4>Kondisi pasien</h4>
                </label>

                <div class="formbold-radio-flex">
                  <div class="kumpulan-radio">
                    <div class="formbold-radio-group">
                      <label class="formbold-radio-label">
                        <input class="formbold-input-radio" type="radio" name="Kondisi_pasien" id="kondisipasien" value="Sembuh">
                        Sembuh
                        <span class="formbold-radio-checkmark"></span>
                      </label>
                    </div>

                    <div class="formbold-radio-group">
                      <label class="formbold-radio-label">
                        <input class="formbold-input-radio" type="radio" name="Kondisi_pasien" id="kondisipasien" value="Membaik">
                        Membaik
                        <span class="formbold-radio-checkmark"></span>
                      </label>
                    </div>

                    <div class="formbold-radio-group">
                      <label class="formbold-radio-label">
                        <input class="formbold-input-radio" type="radio" name="Kondisi_pasien" id="kondisipasien" value="Belum sembuh">
                        Belum Sembuh
                        <span class="formbold-radio-checkmark"></span>
                      </label>
                    </div>

                    <div class="formbold-radio-group">
                      <label class="formbold-radio-label">
                        <input class="formbold-input-radio" type="radio" name="Kondisi_pasien" id="kondisipasien" value="Meninggal">
                        Meninggal
                        <span class="formbold-radio-checkmark"></span>
                      </label>
                    </div>

                    <div class="formbold-radio-group">
                      <label class="formbold-radio-label">
                        <input class="formbold-input-radio" type="radio" name="Kondisi_pasien" id="kondisipasien" value="Perlu pengawasan">
                        Perlu Pengawasan
                        <span class="formbold-radio-checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- INI ADALAH KATEGORI PASIEN BERDASARKAN PUTUSAN DOKTER -->
                <div class="formbold-input-radio-wrapper">
                  <label for="kondisipasien" class="formbold-form-label">
                    <h4>Kategorikan Pasien</h4>
                  </label>

                  <div class="formbold-radio-flex">
                    <div class="kumpulan-radio">
                      <div class="formbold-radio-group">
                        <label class="formbold-radio-label">
                          <input class="formbold-input-radio" type="radio" name="kategori_pasien" id="kategori" value="Rawat inap">
                          Rawat Inap
                          <span class="formbold-radio-checkmark"></span>
                        </label>
                      </div>

                      <div class="formbold-radio-group">
                        <label class="formbold-radio-label">
                          <input class="formbold-input-radio" type="radio" name="kategori_pasien" id="kategori" value="Rawat jalan">
                          Rawat Jalan
                          <span class="formbold-radio-checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="rujukanresep">
                    <!-- <button class="rujukanresep-btn">
                      <a href="#Resep">Resep</a>
                    </button> -->

                    <div class="overlay-resep" id="Resep">
                      <div class="wrapper-resep">
                        <h2>Entry Resep</h2>
                        <a href="#" class="close">&times;</a>
                        <div class="content-resep">
                          <div class="container-resep">
                            <form class="container-resep">

                              <label for="namapasien-resep">Nama Pasien:</label>
                              <input type="text" id="namapasien-resep" value="<?= $hasilpemeriksaan["nama"] ?>">
                              <div class="tulisanresep">Resep: </div>
                              <div class="grid-container-resep">
                                <div class="grid-child-resep">
                                  <div class="name-resep">
                                    <label for="namaobat-resep">Nama Obat</label>
                                  </div>
                                  <input type="text" id="namaobat-resep" name="Nama_obat" value="">
                                </div>
                                <div class="grid-child-resep">
                                  <div class="name-resep">
                                    <label for="dosis-resep">Dosis</label>
                                  </div>
                                  <input type="text" id="dosis-resep" name="Dosis" value="">
                                </div>
                                <div class="grid-child-resep">
                                  <div class="name-resep">
                                    <label for="ket-resep">Keterangan</label>
                                  </div>
                                  <input type="text" id="ket-resep" name="Keterangan" value="">
                                </div>
                              </div>
                              <a href="#">
                                <div class="butt-resep">
                                  <button class="button-resep" type="submit" name="Resepklik">Tambahkan</button>
                                </div>
                              </a>
                              <!-- Resepklik -->
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- <button class="rujukanresep-btn">
                      <a href="#Rujukan">Rujukan</a>
                    </button> -->

                    <div class="overlay-rujukan" id="Rujukan">
                      <div class="wrapper-rujukan">
                        <h2>Rujukan Pasien</h2>
                        <a href="#" class="close">&times;</a>
                        <div class="content-rujukan">
                          <div class="container-rujukan">
                            <form class="container-rujukan">

                              <label for="namapasien-rujukan">Nama Pasien:</label>
                              <input type="text" id="namapasien-rujukan" value="<?= $hasilpemeriksaan["nama"] ?>">
                              <div class="name-rujukan">
                                <br>
                                <label for="namaobat-rujukan">Fasilitas Kesehatan Rujukan:</label>
                              </div>
                              <input type="text" id="namaobat-rujukan" value="" name="Tujuan_rujukan">
                              <div class="name-rujukan">
                                <br>
                                <label for="cattam-rujukan">Catatan Tambahan:</label>
                              </div>
                              <textarea id="cattam-rujukan" rows="5" cols="70" name="Dari_rujukan" placeholder="Tulis catatan tambahan di sini"></textarea>


                              <!-- Rujukanklik -->
                              <div class="butt-rujukan">
                                <button class="button-rujukan" type="submit" name="Rujukanklik">Tambahkan</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <button type="submit" name="submitpemeriksaan" class="formbold-btn">
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
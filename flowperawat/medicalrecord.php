<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

$idperiksa = $_GET['idperiksa'];
// $idpasien=$_GET['ID_pasien'];

$enumcarakeluar = ['Melarikan diri', 'Dijinkan pulang', 'Pindah rumah sakit', 'Pulang paksa'];
$enumkondisi = ['Membaik', 'Sembuh', 'Belum sembuh', 'Meninggal', 'Perlu pengawasan'];
$enumkategori = ['Rawat inap', 'Rawat jalan'];

$hasilpemeriksaan = query("SELECT * FROM hasil_pemeriksaan
  JOIN pasien ON pasien.ID_pasien= hasil_pemeriksaan.ID_pasien
  JOIN resep ON resep.ID_pasien=hasil_pemeriksaan.ID_pasien
  JOIN nik ON pasien.nik_pasien = nik.NIKPasien
  where hasil_pemeriksaan.ID_pemeriksaan = '$idperiksa'")[0];
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
      <div class="medical-record">
        <div class="medical-record-header">
          <div class="medical-record-header-tanggal">
            <h2><?= $hasilpemeriksaan["Tanggal_pemeriksaan"] ?> | <?= $hasilpemeriksaan["Waktu_pemeriksaan"] ?></h2>
          </div>
          <div class="medical-record-header-pasien">
            <h3><?= $hasilpemeriksaan["nama"] ?></h3>
          </div>
        </div>
        <div class="medical-record-rujukanresep">
          <div class="medical-record-resep">

            <a href="#ResepShow">
              <h3>Resep</h3>
            </a>


            <div class="overlay-resep" id="ResepShow">
              <div class="wrapper-resep">
                <h2>Rekap Entry Resep</h2>
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
                          <input type="text" id="namaobat-resep" value="<?= $hasilpemeriksaan["Nama_obat"] ?>">
                        </div>
                        <div class="grid-child-resep">
                          <div class="name-resep">
                            <label for="dosis-resep">Dosis</label>
                          </div>
                          <input type="text" id="dosis-resep" name="" value="<?= $hasilpemeriksaan["Dosis"] ?>">
                        </div>
                        <div class="grid-child-resep">
                          <div class="name-resep">
                            <label for="ket-resep">Keterangan</label>
                          </div>
                          <input type="text" id="ket-resep" name="" value="<?= $hasilpemeriksaan["Keterangan"] ?>">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="medical-record-rujukan">

            <a href="#RujukanShow">
              <h3>Rujukan</h3>
            </a>


            <div class="overlay-rujukan" id="RujukanShow">
              <div class="wrapper-rujukan">
                <h2>Rekap Data Rujukan Pasien</h2>
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
                      <input type="text" id="namaobat-rujukan" value="<?= $hasilpemeriksaan["Tujuan_rujukan"] ?>">
                      <div class="name-rujukan">
                        <br>
                        <label for="cattam-rujukan">Catatan Tambahan:</label>
                      </div>
                      <textarea id="cattam-rujukan" rows="5" cols="70" placeholder="Tulis catatan tambahan di sini"><?= $hasilpemeriksaan["Dari_rujukan"] ?></textarea>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="medical-record-description">
          <div class="medical-record-description-header">
            <h2>Hasil Pemeriksaan</h2>
          </div>
          <div class="medical-record-description-card">
            <div class="medical-record-description-card-suhu">
              <h3>Suhu Badan :</h3>
              <div class="data-suhu">
                <h3><?= $hasilpemeriksaan["Suhu_badan"] ?></h3>
              </div>
              <h3>C</h3>
            </div>
            <div class="medical-record-description-card-darah">
              <h3>Tekanan Darah :</h3>
              <div class="data-darah">
                <h3><?= $hasilpemeriksaan["Tekanan_darah"] ?></h3>
              </div>
              <h3>mmHG</h3>
            </div>
            <div class="medical-record-description-card-berat">
              <h3>Berat Badan :</h3>
              <div class="data-berat">
                <h3><?= $hasilpemeriksaan["Berat_badan"] ?></h3>
              </div>
              <h3>Kg</h3>
            </div>
          </div>
          <div class="medical-record-description-textarea">
            <br>

            <!-- INI ADALAH FORM REKAM MEDIS -->
            <div class="rekam-medis">
              <div>
                <h3>Rekam Medis</h3>
              </div>
              <div>
                <label for="utama" class="formbold-form-label"> Diagnosa Utama / Akhir : </label>
                <textarea disabled="disabled" rows="6" name="utama" id="utama" placeholder="" class="formbold-form-input"><?= $hasilpemeriksaan["Diagnosa_utama"] ?></textarea>
              </div>

              <div>
                <label for="sekunder" class="formbold-form-label"> Diagnosa Sekunder (Komplikasi+Penyerta) : </label>
                <textarea rows="6" name="sekunder" id="sekunder" placeholder="" class="formbold-form-input"><?= $hasilpemeriksaan["Diagnosa_sekunder"] ?></textarea>
              </div>

              <div>
                <label for="namatindak" class="formbold-form-label"> Nama Operasi/Tindakan : </label>
                <textarea rows="6" name="namatindak" id="namatindak" placeholder="" class="formbold-form-input"><?= $hasilpemeriksaan["Tindakan"] ?></textarea>
              </div>

              <div>
                <label for="tindak" class="formbold-form-label"> Insturksi untuk tindak lanjut : </label>
                <textarea rows="6" name="tindak" id="tindak" placeholder="" class="formbold-form-input"><?= $hasilpemeriksaan["Instruksi_lanjutan"] ?></textarea>
              </div>

              <div>
                <label for="fisik" class="formbold-form-label"> Pemeriksaan Fisik : </label>
                <textarea rows="6" name="fisik" id="fisik" placeholder="" class="formbold-form-input"><?= $hasilpemeriksaan["Pemeriksaan_fisik"] ?></textarea>
              </div>

              <div>
                <label for="penunjang" class="formbold-form-label"> Hasil pemeriksaan penunjang : </label>
                <textarea rows="6" name="penunjang" id="penunjang" placeholder="" class="formbold-form-input"><?= $hasilpemeriksaan["Hasil_pemeriksaan_penunjang"] ?></textarea>
              </div>

              <div>
                <label for="note" class="formbold-form-label"> Catatan tambahan : </label>
                <textarea rows="6" name="note" id="note" placeholder="Isi jika ada catatan tambahan" class="formbold-form-input"><?= $hasilpemeriksaan["Catatan"] ?></textarea>
              </div>

              <!-- INI ADALAH CARA KELUAR PASIEN -->
              <div class="formbold-input-radio-wrapper">
                <label for="carakeluar" class="formbold-form-label">
                  <h4>Cara Keluar</h4>
                </label>

                <div class="formbold-radio-flex">
                  <div class="kumpulan-radio">
                    <?php foreach ($enumcarakeluar as $enum) : ?>
                      <div class="formbold-radio-group">
                        <label class="formbold-radio-label">
                          <input class="formbold-input-radio" type="radio" name="keluar" value="<?= $enum ?>" <?= $hasilpemeriksaan["Cara_keluar"] == $enum ? 'checked' : '' ?>>
                          <?= $enum ?>
                          <span class="formbold-radio-checkmark"></span>
                        </label>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>

                <!-- INI ADALAH KONDISI PASIEN -->
                <div class="formbold-input-radio-wrapper">
                  <label for="kondisipasien" class="formbold-form-label">
                    <h4>Kondisi pasien</h4>
                  </label>

                  <div class="formbold-radio-flex">
                    <div class="kumpulan-radio">
                      <?php foreach ($enumkondisi as $enumsikon) : ?>
                        <div class="formbold-radio-group">
                          <label class="formbold-radio-label">
                            <input class="formbold-input-radio" type="radio" name="kondisipasien" value="<?= $enumsikon ?>" <?= $hasilpemeriksaan["Kondisi_pasien"] == $enumsikon ? 'checked' : '' ?>>
                            <?= $enumsikon ?>


                            <span class="formbold-radio-checkmark"></span>

                          </label>
                        </div>
                      <?php endforeach ?>
                    </div>

                  </div>

                  <!-- INI ADALAH KATEGORI PASIEN BERDASARKAN PUTUSAN DOKTER -->
                  <div class="formbold-input-radio-wrapper">
                    <label for="kondisipasien" class="formbold-form-label">
                      <h4>Kategorikan Pasien</h4>
                    </label>

                    <div class="formbold-radio-flex">
                      <div class="kumpulan-radio">
                        <?php foreach ($enumkategori as $enumrawat) : ?>
                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input class="formbold-input-radio" type="radio" name="kategori" id="kategori" value="<?= $enumrawat ?>" <?= $hasilpemeriksaan["kategori_pasien"] == $enumrawat ? 'checked' : '' ?>>
                              <?= $enumrawat ?>
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
          <script src="js/coba.js"></script>
</body>

</html>

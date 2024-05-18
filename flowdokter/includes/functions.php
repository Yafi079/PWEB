<?php
//koneksi ke SQL database
$conn = mysqli_connect("localhost","root","","bismillah");

function query($query) {
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result)) {
    $rows [] = $row;
  }
  return $rows;
}

function cari($keyword){
  $query = "SELECT nik.nama FROM nik
            join pasien on nik.NIKPasien = pasien.nik_pasien
            join hasil_pemeriksaan on pasien.ID_pasien = hasil_pemeriksaan.ID_pasien
            WHERE
            nama LIKE  '%$keyword%' OR
            Status LIKE  '%$keyword%' OR
            kategori_pasien LIKE  '%$keyword%'
              ";

  $iddokter = 1;

              $query = "SELECT * FROM (SELECT *,
                (SELECT Kondisi_pasien FROM hasil_pemeriksaan WHERE ID_pasien = pasien.ID_pasien ORDER BY Tanggal_pemeriksaan DESC LIMIT 1) as statusterakhir,
                (SELECT kategori_pasien FROM hasil_pemeriksaan WHERE ID_pasien = pasien.ID_pasien ORDER BY Tanggal_pemeriksaan DESC LIMIT 1) as kategoriterakhir
              FROM nik join pasien on nik.NIKPasien=pasien.nik_pasien join dokter ON ID_Dokter = '$iddokter')
              WHERE
              statusterakhir LIKE  '%$keyword%' OR
              kategoriterakhir LIKE  '%$keyword%'";

  return query($query);
}

 ?>

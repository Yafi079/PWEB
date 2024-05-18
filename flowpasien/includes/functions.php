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

// function registrasi($data){
//   global $conn;
//
//   $password = mysqli_real_escape_string($conn,$data["password"]);
//   $password2 = mysqli_real_escape_string($conn,$data["password2"]);
//   $email = mysqli_real_escape_string($conn,$data["emailPasien"]);
//
//   $result = mysqli_query($conn, "SELECT emailPasien FROM pasien WHERE
//   emailPasien = '$email'");
//
//   if(mysqli_fetch_assoc($result)){
//     echo "<script>
//             alert('email sudah terdaftar!')
//           </script>";
//           return false;
//   }
//
//   if ($password !== $password2) {
//     echo "<script>
//             alert('konfirmasi password tidak sesuai!');
//           </script>";
//     return false;
//   }
//
//   //enkripsi password
//     $password = password_hash($password, PASSWORD_DEFAULT);
//
//     mysqli_query($conn, "INSERT INTO pasien(ID_pasien, emailPasien, passPasien, Nama_pasien, Usia, Jenis_kelamin, Ruang_rawat, verification_code, email_verified_at) VALUES ('', '', '$password', '', '', '', '', '', '')";
//
//     return mysqli_affected_rows($conn);
//
// }


 ?>

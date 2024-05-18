<?php

session_start();

require 'includes/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


//FUNGSI REGISTRASI

$passwordfix = "";
$verification_code = "";
$emailPas = "";
$verif_temp = "";



function registrasi($data)
{
  global $conn;

  $NIKPas = mysqli_real_escape_string($conn, $data["NIK"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $email = mysqli_real_escape_string($conn, $data["emailPasien"]);

  $result = mysqli_query($conn, "SELECT emailPasien FROM pasien WHERE
  emailPasien = '$email'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('email sudah terdaftar!')
          </script>";
    return false;
  }

  if ($password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!')
          </script>";
    return false;
  }

  //enkripsi password
  $passwordfix = password_hash($password, PASSWORD_DEFAULT);
  $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
  $emailPas = $_POST["emailPasien"];

  // mysqli_query($conn, "INSERT INTO pasien(ID_pasien, emailPasien, passPasien, Nama_pasien, Usia, Jenis_kelamin, Ruang_rawat, verification_code, email_verified_at) VALUES ('', '$emailPas', '$passwordfix', '', '', '', '', '$verification_code', '')");
  mysqli_query($conn, "INSERT INTO pasien(ID_pasien, nik_pasien, emailPasien, passPasien, Ruang_rawat, Nomor_telepon, verification_code, email_verified_at) VALUES ('', '$NIKPas', '$emailPas', '$passwordfix', '', '', '$verification_code', '')");

  return mysqli_affected_rows($conn);
}

//SIGN UP

if (isset($_POST["sign-up"])) {
  $NIK = $_POST["NIK"];
  $emailPas = $_POST["emailPasien"];


  $resultNIK = mysqli_query($conn, "SELECT * FROM nik WHERE NIKPasien = '$NIK'");


  if (mysqli_num_rows($resultNIK) == 1) {

    $skip_alert_NIK = true;

    if (registrasi($_POST) > 0) {

      $resultOTP = mysqli_query($conn, "SELECT * FROM pasien WHERE emailPasien = '$emailPas'");

      $mail = new PHPMailer(true);
      $row = mysqli_fetch_assoc($resultNIK);
      $row2 = mysqli_fetch_assoc($resultOTP);
      $temp_otp = $row2["verification_code"];
      $name = "";


      try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'tatrilp52@gmail.com';

        //SMTP password
        $mail->Password = 'fpcryhotaiyelquv';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('tatrilp52@gmail.com', 'rsbhayangkara.com');

        //Add a recipient
        $mail->addAddress($emailPas, $name);

        //Set email format to HTML
        $mail->isHTML(true);

        $mail->Subject = 'RS Bhayangkara | Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $temp_otp . '</b></p>';

        $mail->send();

        // insert in users table
        // $sql = "INSERT INTO pasien(ID_pasien, emailPasien, passPasien, Nama_pasien, Usia, Jenis_kelamin, Ruang_rawat, verification_code, email_verified_at) VALUES ('', '$emailPas', '', '', '', '', '', '$verification_code', '')
        // WHERE passPasien = '$passwordfix'";

        // $sql = "UPDATE pasien SET emailPasien='$emailPas', verification_code = '$verification_code' WHERE  passPasien = '$passwordfix'";
        //
        // mysqli_query($conn, $sql);
        echo "<script>
            alert('registrasi berhasil!')
            </script>";
        header("Location: registrasi.php?email=" . $emailPas);
        exit();
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    } else {
      echo mysqli_error($conn);
    }
  }

  if (isset($skip_alert_NIK)) {
  } else {
    echo "<script>
            alert('NIK yang anda masukkan tidak sesuai!');
            </script>";
  }
}


// LOGIN

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result_dok = mysqli_query($conn, "SELECT * FROM dokter WHERE emailDokter = '$email'");
  $result_per = mysqli_query($conn, "SELECT * FROM perawat WHERE emailPerawat = '$email'");
  $result_pas = mysqli_query($conn, "SELECT * FROM pasien WHERE emailPasien = '$email'");

  if (mysqli_num_rows($result_dok) == 1) {
    // cek passwords
    $row = mysqli_fetch_assoc($result_dok);
    $id = $row["ID_Dokter"];
    if (password_verify($password, $row["passDokter"])) {
      // set session
      $_SESSION["login"] = true;
      $_SESSION["id"] = $id;
      header("Location: welcome.php?");


      exit;
    }
  } elseif (mysqli_num_rows($result_per) == 1) {
    // cek passwords
    $row = mysqli_fetch_assoc($result_per);
    $id = $row["ID_perawat"];
    if (password_verify($password, $row["passPerawat"])) {
      // set session
      // $_SESSION["login"] = true;
      $_SESSION["login"] = true;
      $_SESSION["id"] = $id;
      header("Location: flowperawat/welcome-perawat.php?");
      exit;
    }
  } elseif (mysqli_num_rows($result_pas) == 1) {
    // cek passwords
    $row = mysqli_fetch_assoc($result_pas);
    $id = $row['ID_pasien'];
    if (password_verify($password, $row["passPasien"])) {
      // set session
      // $_SESSION["login"] = true;
      $_SESSION["login"] = true;
      $_SESSION["id"] = $id;
      header("Location: flowpasien/welcome-pasien.php?");
      exit;
    }
  }

  $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RS Bhayangkara | Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form autocomplete="off" class="login" method="post">
            <div class="heading">
              <h2>Selamat Datang</h2>
              <h6>Belum memiliki akun ? </h6>
              <a href="#" class="toggle">Daftar Sekarang</a>
            </div>

            <?php if (isset($error)) : ?>
              <p style="color:red; font-style: italic;"> username / password salah</p>
            <?php endif; ?>

            <div class="actual-form">
              <div class="input-wrap">

                <input type="email" name="email" class="input-field" minlength="12" autocomplete="off" required />
                <label for="inputEmail">Email address</label>
              </div>

              <div class="input-wrap">
                <input type="password" name="password" class="input-field" autocomplete="off" required />
                <label for="inputPassword">Password</label>
              </div>

              <!-- <input type="submit" value="Sign In" class="login-btn"/> -->
              <button class="login-btn" type="submit" name="login">Login</button>

              <p class="text">
                Lupa dengan password Anda ?
                <a href="#">Klik Disini</a>
              </p>
            </div>
          </form>

          <!--Ini adalah register page-->

          <form action="" method="post" autocomplete="off" class="register">
            <div class="heading">
              <h2>Selamat Datang</h2>
              <h6>Sudah memiliki akun ? </h6>
              <a href="#" class="toggle">Masuk Sekarang</a>
            </div>

            <div class="actual-form">
              <!-- <div class="input-wrap">
                                <input
                                type="radio"
                                id="bpjs"
                                name="kategori"
                                class="input-field"
                                required
                                />
                                <label>BPJS</label>
                            </div>

                            <div class="input-wrap">
                                <input
                                type="radio"
                                id="non"
                                name="kategori"
                                class="input-field"
                                required
                                />
                                <label>Non - BPJS</label>
                            </div> -->


              <div class="input-wrap">
                <input name="NIK" type="text" class="input-field" autocomplete="off" required />
                <label>Nomor Induk Kependudukan</label>
              </div>

              <div class="input-wrap">
                <input name="emailPasien" type="email" class="input-field" minlength="12" autocomplete="off" required />
                <label>Email</label>
              </div>

              <div class="input-wrap">
                <input name="password" type="password" class="input-field" minlength="12" autocomplete="off" required />
                <label>Password</label>
              </div>

              <div class="input-wrap">
                <input name="password2" type="password" class="input-field" minlength="12" autocomplete="off" required />
                <label>Konfirmasi Password</label>
              </div>


              <input type="submit" value="Sign Up" name="sign-up" class="login-btn" />


              <!-- <a href="register.php" class>
                              <button type="submit" name="button" class="login-btn">Sign Up</button>
                            </a> -->

              <p class="text">
                Dengan melakukan pendaftaran ini, saya menyetujui
                <a href="#">Syarat dan Ketentuan</a> yang berlaku
              </p>
            </div>
          </form>


        </div>

        <div class="carousel">
          <div class="images-wrapper">
            <img src="img/image1.jpg" class="image img-1 show" alt="" />
            <img src="img/image2.jpg" class="image img-2" alt="" />
            <img src="img/image3.jpg" class="image img-3" alt="" />
          </div>
          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Melayani dengan sepenuh hati</h2>
                <h2>Pasien kami, prioritas kami</h2>
                <h2>Dedikasi kami sepenuh hati</h2>
              </div>
            </div>
            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!--Ini koneksi javascript-->
  <script src="js/login.js"></script>
</body>

</html>

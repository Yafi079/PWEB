<?php

require 'includes/functions.php';

if (isset($_POST["verifotp"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["kodeotp"];
    $timezone = $_SERVER['REQUEST_TIME'];

    $resultOTP = mysqli_query($conn, "SELECT * FROM pasien WHERE emailPasien = '$email' OR verification_code = '$verification_code'");

    if (mysqli_num_rows($resultOTP) == 1) {
        echo "<script>
              alert('Registrasi berhasil! Silahkan Login');
              document.location.href = 'index.php';
              </script>
              ";
        // header("location:flowpasien/welcome-pasien.php?idpasien={$resultOTP['ID_pasien']}");
        // exit;
    }

    echo "<script>
        alert('kode OTP yang anda masukkan salah!');
        </script>";
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Bhayangkara | Login</title>
    <link rel="stylesheet" href="css/login2.css">
</head>

<body>
    <main>
        <div class="box">
            <div class="verif">
                <div class="headverif">
                    <h1>Verifikasi Email</h1>
                </div>
                <div class="otp">
                    <h6>Masukkan 4 kode OTP yang dikirim melalui email</h6>

                </div>
                <div class="hehe">
                    <form class="subotp" action="" method="post">
                        <input type="hidden" name="email" value=" <?php echo $_GET['email'];  ?>" required>
                        <input type="text" name="kodeotp" value="" id="textboxid" required>

                        <button type="submit" name="verifotp" name="verfikasi" class="login-btn">Verifikasi</button>
                    </form>

                </div>

            </div>


            <div class="inner-box">

                <div class="forms-wrap">

                    <!-- <form autocomplete="off" class="login" method="post" >
                        <div class="heading">
                            <h2>Selamat Datang</h2>
                            <h6>Belum memiliki akun ? </h6>
                            <a href="#" class="toggle">Daftar Sekarang</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">

                                <input
                                type="email"
                                name="email"
                                class="input-field"
                                minlength="12"
                                autocomplete="off"

                                required
                                />
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="input-wrap">
                                <input
                                type="password"
                                name="password"
                                class="input-field"
                                autocomplete="off"

                                required
                                />
                                <label for="inputPassword">Password</label>
                            </div> -->

                    <!-- <input type="submit" value="Sign In" class="login-btn"/> -->
                    <!-- <button class="login-btn" type="submit" name="login">Login</button>

                            <p class="text">
                                Lupa dengan password Anda ?
                                <a href="#">Klik Disini</a>
                            </p>
                        </div>
                    </form> -->

                    <!--Ini adalah register page-->



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
    <script src="js/register.js"></script>
</body>

</html>

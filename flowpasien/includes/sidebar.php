<div class="sidebar">
     <!--INI SIDEBAR PROFILE-->
     <div class="sidebar-profile">
          <div class="profile">
               <img src="img/pasien-profile.jpg">
          </div>
          <?php



          if (!isset($_SESSION['login'])) {
               header("Location: index.php");
          }


          $idpasien = $_SESSION['id'];

          $pasien = query("SELECT * FROM pasien join nik ON nik.NIKPasien = pasien.nik_pasien where pasien.ID_pasien = '$idpasien'");
          //ambil data dokter query


          ?>
          <div class="handle">
               <?php foreach ($pasien as $row) : ?>
                    <div>
                         <h4><?= $row["nama"] ?></h4>
                    </div>
                    <div>
                         <p class="text-muted" style="font-size: 9pt">
                              <?= $row["emailPasien"] ?>
                         </p>
                    </div>
               <?php endforeach ?>
          </div>
     </div>

     <!--INI SIDEBAR MENU-->
     <div class="sidebar-menu">
          <div><a class="menu-item active" href="welcome-pasien.php">
                    <span><i class="uil uil-home"></i></span>
                    <h3>Dashboard</h3>
               </a></div>
          <div><a class="menu-item" href="rawat-inap-pasien.php">
                    <span><i class="uil uil-location-point"></i></span>
                    <h3>Rawat Inap</h3>
               </a></div>
          <div><a class="menu-item" href="medicine-center.php">
                    <span><i class="uil uil-archive"></i></span>
                    <h3>Medicine Center</h3>
               </a></div>
          <div><a class="menu-item" href="recap-pasien.php">
                    <span><i class="uil uil-file"></i></span>
                    <h3>Recap</h3>
               </a></div>
          <div><a class="menu-item" href="feedback-pasien.php">
                    <span><i class="uil uil-heart"></i></span>
                    <h3>Feedback</h3>
               </a></div>
     </div>

     <!--INI TOMBOL LOGOUT-->
     <a href="../index.php">
          <div><button for="keluar" class="btn btn-primary">Keluar</button></div>
     </a>
</div>

<div class="sidebar">
      <!--INI SIDEBAR PROFILE-->
      <a class="sidebar-profile">
          <div class="profile">
               <img src="img/Dokter1.jpg">
          </div>
          <div class="handle">
            <?php

            $iddokter = $_SESSION['id'];
            $dokter = query("SELECT * FROM dokter where ID_Dokter = '$iddokter'");
            //ambil data dokter query
            ?>

            <?php foreach ($dokter as $row) : ?>
                 <h4 style="font-size:14pt">
                      <?= $row["Nama_dokter"] ?>
                 </h4>
                 <p class="text-muted" style="font-size:8pt">
                      <?= $row["emailDokter"] ?>
                 </p>
            <?php endforeach ?>
          </div>
      </a>

      <!--INI SIDEBAR MENU-->
      <div class="sidebar-menu">
          <a class="menu-item active" href="welcome.php">
               <span><i class="uil uil-home"></i></span> <h3>Dashboard</h3>
          </a>
          <a class="menu-item" href="daftarpasien.php">
               <span><i class="uil uil-file-medical-alt"></i></span> <h3>Daftar Pasien</h3>
          </a>

          <!--INI TOMBOL LOGOUT-->

     </div>
     <a href="index.php">
      <button for="keluar" class="btn btn-primary">Keluar</button>
      </a>
    </div>

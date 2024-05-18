<div class="sidebar">

     <!--INI SIDEBAR PROFILE-->
     <a class="sidebar-profile">
          <div class="profile">
               <img src="img/perawat.jpeg">
          </div>
          <div class="handle">
               <?php

               $idperawat = $_SESSION['id'];
               $perawat = query("SELECT * FROM perawat where ID_perawat = '$idperawat'");
               //ambil data dokter query
               ?>

               <?php foreach ($perawat as $row) : ?>
                    <h4 style="font-size:14pt">
                         <?= $row["nama_perawat"] ?>
                    </h4>
                    <p class="text-muted" style="font-size:8pt">
                         <?= $row["emailPerawat"] ?>
                    </p>
               <?php endforeach ?>
          </div>
     </a>

     <!--INI SIDEBAR MENU-->
     <div class="sidebar-menu">
          <a class="menu-item active" href="welcome-perawat.php">
               <span><i class="uil uil-home"></i></span>
               <h3>Dashboard</h3>
          </a>
          <a class="menu-item" href="daftardokter.php">
               <span><i class="uil uil-stethoscope-alt"></i></span>
               <h3>Daftar Dokter</h3>
          </a>
          <a class="menu-item" href="daftarpasien.php">
               <span><i class="uil uil-user-nurse"></i></span>
               <h3>Daftar Pasien</h3>
          </a>

          <!--INI TOMBOL LOGOUT-->

     </div>
     <a href="../index.php">
          <button for="keluar" class="btn btn-primary">Keluar</button>
     </a>
</div>

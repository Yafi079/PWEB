<?php
// session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

$idpasien = $_SESSION['id'];
?>
<div class="header">
    <div class="header-container">
        <div class="header-logo"><a href="dashboard.php">
                <h2>RS Bhayangkara</h2>
            </a></div>
        <form class="" action="" method="post">
            <div class="request">
                <!-- <label class="btn  btn-primary" for="request-button">Request</label> -->
                <input class="btn  btn-primary" type="submit" name="subreq" value="Request" id="request-button">
            </div>

        </form>
        <?php
        //  $idpasien = $_GET["idpasien"]; 
        ?>
        <div class="profile">
            <div class="profile-photo">

                <a href="profil-pasien.php">
                    <img src="img/pasien-profile.jpg">
                </a>
            </div>
        </div>
    </div>
</div>
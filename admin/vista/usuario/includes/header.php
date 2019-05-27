<?php
//if (empty($_SESSION['active'])) {
  // header('location: ../');
//}
session_start();
include '../../../../config/conexionBD.php';
?> 
<header><a href="../../../../config/conexionBD.php" ></a>
    <div class="header">

        <h1>Sistema de correo</h1>
        <div class="optionsBar">
            <p>Ecuador, <?php echo fechaC(); ?> </p>
            <span>|</span>
            <span class="user"><?php echo $_SESSION['idUsers'].' - '.$_SESSION['rol'].' - '.$_SESSION['email']; ?> </span>
         <!-- <img class="photouser" src="img/user.png" alt="Usuario"> -->
         <!-- <a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a> -->
        </div>
    </div>
    <?php include "nav.php"; ?>
</header>
<?php
//if (empty($_SESSION['active'])) {
  //  header('location: ../');
//}
?> 
<header>
    <div class="header">

        <h1>Sistema de correo</h1>
        <div class="optionsBar">
            <p>Ecuador, <?php echo fechaC(); ?> </p>
            <span>|</span>
            <span class="user"><?php echo $_SESSION['user'].' - '.$_SESSION['rol'].' - '.$_SESSION['email']; ?> </span>
         <!--   <img class="photouser" src="img/user.png" alt="Usuario"> -->
                     <style>
    #salir { color: white; }
  </style>
            <a id="salir" href="includes/salir.php">Salir</a>
        </div>
    </div>
    <?php include "nav.php"; ?>
</header>
<?php
session_start();

session_destroy();

header('Location: ../../../../public/vista/login.php');
echo "salir";
?>

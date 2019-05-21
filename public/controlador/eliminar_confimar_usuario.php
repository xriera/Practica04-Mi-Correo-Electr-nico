<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar usuario</title>
    </head>
    <body>
        <?php
        include '../../config/conexionBD.php';
      //  if (!empty($_POST)) {
       //     if ($_POST['idusuario'] == 1) {
         //       header('Location: lista_usuarios.php');
           //     mysqli_close($conection);
             //   exit;
            //}
            $iduser = $_POST['idusuario'];
            echo "$iduser";
            //$query_delete = mysqli_query($conection, "DELETE FROM usuario WHERE idusuario = $iduser");
            $query_delete = mysqli_query($conn, "UPDATE usuario SET estatus = 0 WHERE idusuario = $iduser");

            if ($query_delete) {
                header('Location: ../../admin/vista/usuario/index.php');
            } else {
                echo 'Error al Eliminar';
            }
      //  }
            $conn->close();
        ?>
    </body>
</html>

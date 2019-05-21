<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar usuario</title>
    </head>
    <body>
        <?php
       // session_start();

         include '../../config/conexionBD.php';

        if (!empty($_POST)) {
            $alert = '';
            if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['fechaNacimiento']) || empty($_POST['correo']) || empty($_POST['rol'])) {
                $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
            } else {
                $idUsuario = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $email = $_POST['correo'];
                $clave = md5($_POST['clave']);
                $rol = $_POST['rol'];

                $query = mysqli_query($conn, "SELECT * FROM usuario WHERE correo = '$email' AND idusuario != $idUsuario ");

                $result = mysqli_fetch_array($query);
                $result = count($result);

                if ($result > 0) {
                    $alert = '<p class="msg_error">El correo o el usuario ya existe.</p>';
                     $alert = '<p class="msg_error">El correo o el usuario ya existe.</p>';
                } else {

                    if (!empty($_POST['clave'])) {
                        $sql_update = mysqli_query($conn, "UPDATE usuario SET nombre = '$nombre', apellido='$apellido', fechaNacimiento='$fechaNacimiento',correo='$email', clave='$clave', rol='$rol' WHERE idusuario = $idUsuario ");
                    } else {
                        $sql_update = mysqli_query($conn, "UPDATE usuario SET nombre = '$nombre', apellido='$apellido', fechaNacimiento='$fechaNacimiento',correo='$email', rol='$rol' WHERE idusuario = $idUsuario ");
                    }


                    if ($sql_update) {
                        echo "Usuario modificado correctamenta";
                        $alert = '<p class="msg_save">Usuario actualizado correctamente.</p>';
                    } else {
                        $alert = '<p class="msg_error">Error al actualizar  el usuario.</p>';
                    }
                }
            }
        }
         $conn->close();
        ?>
    </body>
</html>

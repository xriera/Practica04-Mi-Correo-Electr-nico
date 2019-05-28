<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../../config/conexionBD.php';

    $iduser = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT u.nombre, u.apellido, u.correo, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE u.idusuario= $iduser ");
    mysqli_close($conn);
    $result_sql = mysqli_num_rows($sql);

    if ($result_sql > 0) {
        while ($data = mysqli_fetch_array($sql)) {
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $correo = $data['correo'];
            $rol = $data['rol'];
        }
    } else {
      //  header("location: lista_usuarios.php");
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
         <?php include "includes/scripts.php"; ?>
        <title></title>
    </head>
    <body>
    <body>
        <?php include "includes/header.php";
        include '../../../config/conexionBD.php';
        ?>
        <section id="container">
            <div class="data_delete">
                <h2>¿Está seguro de eliminar el siguiente registro?</h2>
                <p>Nombre: <span><?php echo $nombre; ?></span></p>
                <p>Usuario: <span><?php echo $apellido; ?></span></p>
                 <p>Correo electronico: <span><?php echo $correo; ?></span></p>
                <p>Tipo Usuario: <span><?php echo $rol; ?></span></p>

                <form method="post" action="../../controlador/admin/eliminar_confimar_usuario.php">
                    <input type="hidden" name="idusuario" value="<?php echo $iduser; ?>">
                    <a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
                    <input type="submit" value="Aceptar" class="btn_ok">
                </form>
            </div>
        </section>

        <?php include "includes/footer.php"; ?>
    </body>
    </body>
</html>

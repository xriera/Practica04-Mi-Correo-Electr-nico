<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <?php include 'includes/scripts.php'; ?>
        <title>Actualizar Usuario</title>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <section id="container">
            <div class="form_register">
                <h1><i class="far fa-edit"></i> Actualizar Usuario</h1>
                <hr>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $iduser; ?>">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo"value="<?php echo $nombre; ?>">
                    <label for="correo">Correo Electr&oacute;nico: </label>
                    <input type="email" name="correo" id="correo" placeholder="Correo Electronico" value="<?php echo $correo; ?>">
                    <label for="usuario">Usuario: </label>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
                    <label for="clave">Clave: </label>
                    <input type="password" name="clave" id="clave" placeholder="Clave de acceso">
                    <label for="rol">Tipo Uusario: </label>

                    <?php
                    include '../conexion.php';
                    $query_rol = mysqli_query($conection, "SELECT * FROM rol");
                    mysqli_close($conection);
                    $result_rol = mysqli_num_rows($query_rol);
                    ?>

                    <select name="rol" id="rol" class="noItem">
                        <?php
                        echo $option;
                        if ($result_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                                ?>
                                <option value="<?php echo $rol['idrol']; ?>"><?php echo $rol['rol']; ?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>
                    <button type="submit" class="btn_save"><i class="far fa-edit"></i> Actualizar Usuario</button>
                </form>
            </div>
        </section>
        <?php include "includes/footer.php"; ?> 
    </body>
</html>
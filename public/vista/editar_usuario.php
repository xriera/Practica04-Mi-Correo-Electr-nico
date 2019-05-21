<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
        //mostrar datos 
        if (empty($_REQUEST['id'])) {
        //    header('Location: lista_usuarios.php');
            mysqli_close($conn);
        }
         include '../../config/conexionBD.php';
        $iduser = $_REQUEST['id'];
        
        $sql = mysqli_query($conn, "SELECT u.idusuario, u.nombre, u.apellido,u.fechaNacimiento,u.correo,(u.rol) as rol "
                . "FROM usuario u "
                . "INNER JOIN rol r "
                . "ON u.rol = r.idrol "
                . "WHERE idusuario= $iduser AND estatus = 1");
        mysqli_close($conn);
        $result_sql = mysqli_num_rows($sql);
         
        if ($result_sql == 0) {
          
        } else {
            $option = '';
            while ($data = mysqli_fetch_array($sql)) {
                $iduser = $data['idusuario'];
                $nombre = $data['nombre'];
                $apellido = $data['apellido'];
                $fechaNacimiento = $data['fechaNacimiento'];
                $correo = $data['correo'];
                $idrol = $data['idrol'];
                $rol = $data['rol'];
               
                if ($idrol == 1) {
                    $option = '<option value="' . $idrol . '" select> ' . $rol . ' </option>';
                } else if ($idrol == 2) {
                    $option = '<option value="' . $idrol . '" select> ' . $rol . ' </option>';
                } 
            }
           
        }
        ?>

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
                <h1><i class="far fa-edit"></i>Actualizar Usuario | Correo</h1>
                <hr>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?>
            </div>

                <a href="../../admin/vista/usuario/index.php"></a>
                <form action="../controlador/modificar_usuario.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $iduser; ?>">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo"value="<?php echo $nombre; ?>">
                    <label for="apellido">Apellido: </label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $apellido; ?>"> 
                    <label for="fechaNacimiento">Fecha Nacimiento: </label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha Nacimiento" value="<?php echo $fechaNacimiento; ?>"> 
                    <label for="correo">Correo Electr&oacute;nico: </label>                  
                    <input type="email" name="correo" id="correo" placeholder="Correo Electronico" value="<?php echo $correo; ?>">
                    <label for="clave">Clave: </label>
                    <input type="password" name="clave" id="clave" placeholder="Clave de acceso">
                    <label for="rol">Tipo Uusario: </label>
                    
                    <?php
                    include '../../config/conexionBD.php';
                    $query_rol = mysqli_query($conn, "SELECT * FROM rol");
                    mysqli_close($conn);
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
                        $conn->close();
                        ?>

                    </select>
                    <button type="submit" class="btn_save"><i class="far fa-edit"></i> Actualizar Usuario</button>
                </form>
            </div>
        </section>
        <?php include "includes/footer.php"; ?> 
    </body>
</html>

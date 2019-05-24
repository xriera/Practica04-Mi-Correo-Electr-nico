<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuario | Correo</title>
    </head>
    <body><a href="../admin/includes/scripts.php"></a>
        <?php include '../admin/includes/scripts.php'; ?>
        <?php include 'includes/header.php'; ?>
        <section id="container">
            <h1><i class="fas fa-users"></i>Perfil | Correo</h1>
            <a href="../../vista/admin/registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Usuario</a>
             <a href="../../vista/admin/registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Usuario</a>
            <!--  <form action="buscar_usuario.php" method="get" class="form_search">
                  <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                  <button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
              </form> -->

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Foto</th>
                    <th>Acciones</th>

                </tr>
                <a href="../../../"></a>
                <?php
                session_start();                      
                       $correo = $_SESSION['email'];
                include '../../../config/conexionBD.php';
                $query = mysqli_query($conn, "SELECT * FROM usuario WHERE correo='$correo'");
                mysqli_close($conn);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_array($query)) {


                        ?>       

                        <tr>
                            <td><?php echo $data["idusuario"]; ?></td>
                            <td><?php echo $data["nombre"]; ?></td>
                            <td><?php echo $data["apellido"]; ?></td>
                            <td><?php echo $data["fechaNacimiento"]; ?></td>
                            <td><?php echo $data["correo"]; ?></td>
                            
                            <td><?php echo $data["rol"]; ?></td>
                            <td><img src="<?php echo $data["foto"]; ?>" alt="<?php echo $data["foto"]; ?>" height="60px"width="60px"></td>
                            <td>
                                <a class="link_edit" href="../admin/editar_usuario.php?id=<?php echo $data["idusuario"]; ?>"><i class="far fa-edit"></i> Editar</a>

                                <?php //if ($data["idusuario"] != 1) {  ?>
                                |
                                <a class="link_delete" href="../admin/eliminar_usuario.php?id=<?php echo $data["idusuario"]; ?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                |
                                <a class="link_delete" href="../admin/cambiar_contrasena.php?id=<?php echo $data["idusuario"]; ?>"><i class="fas fa-trash-alt"></i> Cambiar Contraseña</a>
                                 <?php //}  ?>
                            </td>

                        </tr><a href="../admin/editar_usuario.php"></a>
                        <?php
                    }
                }
                ?>

            </table>

           
        </section>

        <?php include "includes/footer.php"; ?>
    </body>
</html>

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
            <a href="index.php" class="btn_new"><i class="fas fa-user-plus"></i> Index </a>
            <a href="mensaje_nuevo.php" class="btn_new"><i class="fas fa-user-plus"></i> Mensaje Nuevo</a>
            <!--  <form action="buscar_usuario.php" method="get" class="form_search">
                  <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                  <button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
              </form> -->

            <table>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>

                </tr>
                <a href="../../../"></a>
                <?php
                session_start();                      
                     
                       $idUsuario =$_SESSION['idUser'];
                       echo "usuario $idUsuario";
                include '../../../config/conexionBD.php';
                $query = mysqli_query($conn, "SELECT c.cor_fecha_hora,u.nombre,u.apellido, u.correo, c.cor_asunto, c.cor_mensaje FROM correos c, usuario u WHERE c.cor_usu_destinatario = u.idusuario and c.cor_usu_remitente= $idUsuario");
                mysqli_close($conn);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        ?>       
                        <tr>
                            <td><?php echo $data["cor_fecha_hora"]; ?></td>
                            <td><?php echo $data["nombre"]; ?></td>
                            <td><?php echo $data["apellido"]; ?></td>
                            <td><?php echo $data["correo"]; ?></td>
                            <td><?php echo $data["cor_asunto"]; ?></td>
                            <td><?php echo $data["cor_mensaje"]; ?></td>                         
                           
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

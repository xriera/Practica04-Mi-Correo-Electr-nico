<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <?php include 'includes/scripts.php'; ?>
        <title>Lista de Usuarios</title>

    </head>
    <body>
          <?php include 'includes/header.php'; ?>
        <section id="container">
            <h1><i class="fas fa-users"></i> Lista de usuarios</h1>
            <a href="registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Usuario</a>



            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Rol</th>
                    <th>Foto</th>
                    <th>Acciones</th>

                </tr>

                <?php
                session_start();
                include '../../../config/conexionBD.php';
//SELECT u.idusuario, u.nombre, u.correo, c.cor_asunto FROM usuario  u INNER JOIN correos c  ON u.idusuario=c.cor_usu_destinatario WHERE estatus = 1  ORDER BY u.idusuario
                $query = mysqli_query($conn, "SELECT u.idusuario, u.nombre,u.apellido,u.fechaNacimiento, u.correo, u.foto, r.rol FROM usuario  u INNER JOIN rol r  ON u.rol=r.idrol WHERE estatus = 1");
                mysqli_close($conn);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        ?>       

                        <tr>
                            <td><?php echo $data["idusuario"]; ?></td>
                            <td><?php echo $data["nombre"]; ?></td>
                            <td><?php echo $data["apellido"]; ?></td>
                            <td><?php echo $data["correo"]; ?></td>
                            <td><?php echo $data["fechaNacimiento"]; ?></td>
                            <td><?php echo $data["rol"]; ?></td>
                            <td><img src="<?php echo $data["foto"]; ?>" alt="<?php echo $data["descripcion"]; ?>" height="55px"width="55px"></td>
                            
                            <td>
                                <a class="link_edit" href="editar_usuario.php?id=<?php echo $data["idusuario"]; ?>"><i class="far fa-edit"></i> Editar</a>

                                <?php if ($data["idusuario"] != 1) { ?>
                                    |
                                    <a class="link_delete" href="eliminar_usuario.php?id=<?php echo $data["idusuario"]; ?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                <?php } ?>
                                <?php if ($data["idusuario"] != 1) { ?>
                                    |
                                    <a class="link_edit" href="cambiar_contrasena.php?id=<?php echo $data["idusuario"]; ?>"><i class="fas fa-trash-alt"></i> Cambiar contraseña</a>
                                <?php } ?>
                            </td>

                        </tr>
                        <?php
                    }
                }
                ?>

            </table>
           

        </section>

        <?php include "includes/footer.php"; ?>
    </body> 
</html> 
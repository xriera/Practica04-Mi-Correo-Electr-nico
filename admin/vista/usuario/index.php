
<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("location: ./");
}
include '../conexion.php';
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <?php include 'includes/scripts.php'; ?>
        <title>Lista de Usuarios_Supermercado</title>

    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <section id="container">
            <h1><i class="fas fa-users"></i> Lista de usuarios</h1>
            <a href="registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Usuario</a>

            <form action="buscar_usuario.php" method="get" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                <button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
            </form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                </tr>

                <?php
                //paginador
             //   $sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM usuario WHERE estatus =  1");
              //  $result_registe = mysqli_fetch_array($sql_registe);
              //  $total_registro = $result_registe['total_registro'];

            //    $por_pagina = 5;
///
   //             if (empty($_GET['pagina'])) {
     //               $pagina = 1;
       //         } else {
         //           $pagina = $_GET['pagina'];
           //     } 

           //     $desde = ($pagina - 1) * $por_pagina;
             //   $total_registro = ceil($total_registro / $por_pagina);

                $query = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.apellido,u.fechaNacimiento, u.correo, r.rol FROM usuario  u INNER JOIN rol r  ON u.rol=r.idrol WHERE estatus = 1 ORDER BY u.idusuario");
                mysqli_close($conection);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        ?>       

                        <tr>
                            <td><?php echo $data["idusuario"]; ?></td>
                            <td><?php echo $data["nombre"]; ?></td>
                            <td><?php echo $data["apellido"]; ?></td>
                            <td><?php echo $data["fechaNaciento"]; ?></td>
                            <td><?php echo $data["correo"]; ?></td>
                            <td><?php echo $data["rol"]; ?></td>
                            <td>
                                <a class="link_edit" href="editar_usuario.php?id=<?php echo $data["idusuario"]; ?>"><i class="far fa-edit"></i> Editar</a>

                                <?php if ($data["idusuario"] != 1) { ?>
                                    |
                                    <a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["idusuario"]; ?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
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
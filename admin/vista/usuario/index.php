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
    <body>   
        <?php include 'includes/scripts.php'; ?>
        <?php include 'includes/header.php'; ?>
        <section id="container">
            <h1><i class="fas fa-users"></i>Mensajes Recibidos | Correo</h1>
        
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
                    <th>Accion</th>

                </tr>
               
                <?php
                session_start();                      
                     
                       $idUsuario =$_SESSION['idUser'];
                     //  echo "usuario $idUsuario";
                include '../../../config/conexionBD.php';
                $query = mysqli_query($conn, "SELECT c.cor_fecha_hora,u.nombre,u.apellido, u.correo, c.cor_asunto, c.cor_mensaje FROM correos c, usuario u WHERE c.cor_usu_destinatario = '$idUsuario' and 
'$idUsuario'= u.idusuario ORDER BY c.cor_fecha_hora DESC;");
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
                                <a class="link_edit" href="leer_mensaje.php?id=<?php echo $data["idusuario"]; ?>"><i class="far fa-edit"></i> Leer</a>


                            </td>

                        </tr><a href="../admin/editar_usuario.php"></a>
                        <?php
                    }
                }
                $conn->close();
                ?>

            </table>

           
        </section>

        <?php include "../../../css/estilos/includes/footer.php"; ?>
    </body>
</html>

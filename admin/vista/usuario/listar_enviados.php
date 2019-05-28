<?php
 include '../../../config/conexionBD.php';
session_start();
if ($_SESSION['rol'] != 1 and $_SESSION['rol'] != 2) {
    header("location: ../../../public/vista/login.php");
} 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         
         <?php include 'includes/scripts.php'; ?>
        <title>Usuario | Correo</title>
    </head>
    <body><a href="../../../css/includes/scripts.php"></a>
        <?php include 'includes/header.php'; ?>
        <section id="container">
            <h1><i class="fas fa-users"></i>Mnesajes Enviados | Correo</h1>
           
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

                <?php
                session_start();                      
                     
                       $idUsuario =$_SESSION['idUser'];
                     //  echo "usuario $idUsuario";
                include '../../../config/conexionBD.php';
                $query = mysqli_query($conn, "SELECT u.idusuario,c.cor_fecha_hora,u.nombre,u.apellido, u.correo, c.cor_asunto, c.cor_mensaje FROM correos c, usuario u WHERE c.cor_usu_destinatario = u.idusuario and c.cor_usu_remitente= $idUsuario");
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

        <?php include "includes/footer.php"; ?>
    </body>
</html>

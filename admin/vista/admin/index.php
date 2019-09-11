<?php
session_start();
if ($_SESSION['rol'] != 1 and $_SESSION['rol'] != 2) {
    header("location: ../../../public/vista/login.php");
}
include '../../../config/conexionBD.php';
?>
 <?php
session_start();
include '../../../conexion.php';


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
<?php include 'includes/scripts.php'; ?>
        <title>Lista de Usuarios Cooreo</title>

    </head>
    <body>

        <?php include 'includes/header.php'; ?>
        <section id="container"><a href="../../../public/vista/login.php"></a>
            <h1><i class="fas fa-users"></i> Mensajes Electrónicos</h1>
            <a href="../../vista/admin/registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Usuario</a>

            <!--  <form action="buscar_usuario.php" method="get" class="form_search">
                  <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                  <button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
              </form> -->

  <table id="tbl">
            <caption>
                <h4></h4>
            </caption>
            <tr>
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>Accion</th>
            </tr>
            <?php
            include '../../../config/conexionBD.php';
            $sql = "SELECT * FROM correos WHERE cor_eliminado='N' ORDER BY cor_fecha_hora DESC;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $codigo = $row["cor_codigo"];
                    $fecha = $row["cor_fecha_hora"];
                    $asunto = $row["cor_asunto"];
                    $array = array(0 => $row["cor_usu_remitente"], 1 => $row["cor_usu_destinatario"]);
                    $array2 = [];
                    foreach ($array as $i => $value) {
                        $bus = "SELECT * FROM usuario WHERE idusuario=$array[$i];";
                        $resultb = $conn->query($bus);
                        if ($resultb->num_rows > 0) {
                            while ($row = $resultb->fetch_assoc()) {
                                $idusuario = $row["idusuario"];
                                $array2[] = $row["correo"];
                            }
                        }
                    }
                    echo "<tr>";
                    echo "   <td>" . $fecha . "</td>";
                    echo "   <td>" . $array2[0] . "</td>";
                    echo "   <td>" . $array2[1] . "</td>";
                    echo "   <td>" . $asunto . "</td>";
                    echo "   <td> <a href='eliminar_usuario.php?id=$idusuario'> Eliminar</a> "
                            . "<a href='editar_usuario.php?id=$idusuario'></a> "
                            . "<a href='cambiar_contrasena.php?id=$idusuario'></a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "   <td colspan='7'> No existen correos registrados al usuario </td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>

           
        </section>

        <?php include "includes/footer.php"; ?>
    </body> 
</html> 
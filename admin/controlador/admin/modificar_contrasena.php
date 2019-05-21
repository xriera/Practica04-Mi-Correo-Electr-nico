<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //incluir conexión a la base de datos
        include '../../../config/conexionBD.php';
        $idUsuario = $_POST["codigo"];
        $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
        $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;
        $sqlContrasena1 = "SELECT * FROM usuario where idusuario=$idUsuario and clave=MD5('$contrasena1')";
 
        $result1 = $conn->query($sqlContrasena1);
        if ($result1->num_rows > 0) {
            
            $sqlContrasena2 = "UPDATE usuario " .
                    "SET clave = MD5('$contrasena2') "
                    . "WHERE idusuario = $idUsuario";
            echo "$sqlContrasena2";
            if ($conn->query($sqlContrasena2) === TRUE) {
                echo "Se ha actualizado la contraseña correctamemte!!!<br>";
                 header('Location: ../../vista/admin/index.php');
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>La contraseña actual no coincide con nuestros registros!!! </p>";
        }
        echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
        $conn->close();
        ?>
    </body>
</html>

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
        include '../../../config/conexionBD.php';

        $cor_usu_destinatario = $_POST['destinatario'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $rol = $_SESSION['rol'];

        
        $sql = "INSERT INTO usuario(nombre,apellido,fechaNacimiento,correo,clave,estatus,foto,rol) VALUES ('$nombre','$apellido','$fechaNacimiento','$email',MD5('$clave'),'1','$destino','2')";
        echo "<p> $sql </p>";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            header('Location: ../../vista/admin/index.php');
        } else {
            if ($conn->errno == 1062) {
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
            } else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }


        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/registro_usuario.php'>Regresar</a>";
        ?>
    </body>
</html>

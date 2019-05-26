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
        session_start(); 
        $idUsuarioRemit = $_SESSION['idUser'];
        
        $cor_usu_destinatario = $_POST['destinatario'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $rol = $_SESSION['rol'];

        $sql1 = "SELECT idusuario FROM usuario WHERE correo='$cor_usu_destinatario';";
        $resultb = $conn->query($sql1);
        if ($resultb->num_rows > 0) {
            while ($row = $resultb->fetch_assoc()) {
                $codigodes = $row["idusuario"];
                $rol = $row["rol"];
            }
        }

        $sql = "INSERT INTO correos VALUES(0,NULL,$idUsuarioRemit,$codigodes, '$asunto', '$mensaje','N',NULL)";
        echo "<p> $sql </p>";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            header('Location: ../../vista/usuario/index.php');
        } else {
            if ($conn->errno == 1062) {
                echo "<p class='error'>La persona con el correo $cor_usu_destinatario ya esta registrada en el sistema </p>";
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

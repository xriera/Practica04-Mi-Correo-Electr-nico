<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Nuevo Usuario</title> 
    </head>
    <body><a href="../../../fotos"></a>
        <?php
        include '../../../config/conexionBD.php';



        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $email = $_POST['correo'];
        $clave = md5($_POST['clave']);
        $rol = $_POST['rol'];

        //insertar imagen
        $nom = $_REQUEST["txtnom"];
        $foto = $_FILES["foto"]["name"];
        $ruta = $_FILES["foto"]["tmp_name"];
        $destino = "../../../fotos/" . $foto;
        copy($ruta, $destino);
        
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




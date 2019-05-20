<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Nuevo Usuario</title> 
    </head>
    <body>
        <?php
        include '../../config/conexionBD.php';



                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $email = $_POST['correo'];
                $clave = md5($_POST['clave']);
                $rol = $_POST['rol'];

                 $sql = "INSERT INTO usuario(nombre,apellido,fechaNacimiento,correo,clave,rol) VALUES ('$nombre','$apellido','$fechaNacimiento','$email',MD5('$clave'),'$rol')";
                 
            if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            } else {
                if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; }
            }
           
        
         //cerrar la base de datos
            $conn->close();
            echo "<a href='../vista/registro_usuario.html'>Regresar</a>";
        ?>
    </body> 

</html>




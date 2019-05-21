<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Nuevo Usuario</title> 
    </head>
    <body>
        <?php
        include '../../../config/conexionBD.php';



                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $email = $_POST['correo'];
                $clave = md5($_POST['clave']);
                $rol = $_POST['rol'];
                
                $foto = $_FILES['foto'];
        $nombre_foto = $foto['name'];
        $type = $foto['type'];
        $url_temp = $foto['tmp_name'];

        $imgProducto = 'img_producto.png';

        if ($nombre_foto != '') {
            $destino = 'img/';
            $img_nombre = 'img_' . md5(date('d-m-Y H:m:s'));
            $imgProducto = $img_nombre . '.jpg';
            $src = $destino . $imgProducto;
        }
                 $sql = "INSERT INTO usuario(nombre,apellido,fechaNacimiento,correo,clave,estatus,foto,rol) VALUES ('$nombre','$apellido','$fechaNacimiento','$email',MD5('$clave'),'1','$imgProducto','2')";
                 echo "<p> $sql </p>";
            if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            } else {
                if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; }
                else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; }
            }
           
        
         //cerrar la base de datos
            $conn->close();
            echo "<a href='../vista/registro_usuario.php'>Regresar</a>";
            
        ?>
    </body> 

</html>




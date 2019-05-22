<!DOCTYPE html>
<html>
    <head>
        <title>CONTROLADOR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $alert = '';
        session_start();
        if (!empty($_SESSION['active'])) {
            header('location: ../../admin/vista/admin/index.php');
        } else {
            if (!empty($_POST)) {
                if (empty($_POST['usuario'] || empty($_POST['clave']))) {
                    $alert = 'Ingrese su usuario y su clave';
                } else {
                    require '../../config/conexionBD.php';

                    $user = mysqli_real_escape_string($conn, $_POST['usuario']);
                    $pass = md5(mysqli_real_escape_string($conn, $_POST['clave']));

                    $query = mysqli_query($conn, "SELECT * FROM usuario WHERE correo = '$user' AND clave = '$pass'");
                    mysqli_close($conn);
                    $result = mysqli_num_rows($query);

                    if ($result > 0) {
                        $data = mysqli_fetch_array($query);

                        $_SESSION['active'] = true;
                        $_SESSION['idUser'] = $data['idusuario'];
                        $_SESSION['nombre'] = $data['nombre'];
                        $_SESSION['apellido'] = $data['apellido'];
                        $_SESSION['email'] = $data['correo'];
                        $_SESSION['rol'] = $data['rol'];
                        if($data[rol] != 2){
                        header('location: ../../admin/vista/admin/index.php');
                        } else {
                        header('location: ../../admin/vista/usuario/index.php');
                        }
                    } else {
                        $alert = 'El usuario o la clave son incorrectos';
                        echo "clave incorrecto";
                        session_destroy();
                    }
                }
            }
        }
        ?>
    </body>
</html>

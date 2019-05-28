<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login | Correo Electronico</title>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>
    <body>
        <section id="container">
            <form action="../controlador/login.php" method="post">
                <h3>Iniciar Sesi&oacute;n</h3>
              <!--  <img src="img/login.png" alt="Login"><br> -->

                <input type="text" name="usuario" placeholder="Correo Electronico">
                <input type="password" name="clave" placeholder="Contraseña">

                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                <input type="submit" value="INGRESAR">
                <a id="crear" href="../../admin/vista/admin/registro_usuario.php"></a>
                <a href="../../admin/vista/admin/registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear Usuario</a>
                
            </form>
        </section>
    </body>
</html>
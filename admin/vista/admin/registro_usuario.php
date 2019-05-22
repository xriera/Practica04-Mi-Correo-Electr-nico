<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuario | Correo</title>
    </head>
    <body>
        
        <?php include '../../../config/conexionBD.php'; ?>
        <section id="container">
            <div class="form_register">
                <h1><i class="fas fa-user-plus"></i> Registro Usuario</h1>
                <hr>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                <form id="formulario01" method="POST" action="../../controlador/admin/crear_usuario.php" >
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombres Completo...">
                    <label for="nombre">Apellido: </label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellidos Completo..">
                    <label for="nombre">Fecha De Nacimiento: </label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha de nacimiento">
                    <label for="correo">Correo Electr&oacute;nico: </label>
                    <input type="email" name="correo" id="correo" placeholder="Correo Electronico">
                    <label for="clave">Clave: </label>
                    <input type="password" name="clave" id="clave" placeholder="Clave de acceso">
                    

                    <div class="photo">
                        <label for="foto">Foto</label>
                        <div class="prevPhoto">
                            <span class="delPhoto notBlock">X</span>
                            <label for="foto"></label>
                        </div>
                        <div class="upimg">
                            <input type="file" name="foto" id="foto">
                        </div>
                        <div id="form_alert"></div>
                    </div>

                    </select> 
                    <br>
                    <button type="submit" class="btn_save"><i class="far fa-save"></i> Crear Usuario</button>
                </form>
            </div>
        </section>
        <?php include "includes/footer.php"; ?> 
    </body>
</html>

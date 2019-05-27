<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
        //mostrar datos 
        if (empty($_REQUEST['id'])) {
        //    header('Location: lista_usuarios.php');
            mysqli_close($conn);
        }
         include '../../../config/conexionBD.php';
        $iduser = $_REQUEST['id'];

        
        $sql = mysqli_query($conn, "SELECT c.cor_fecha_hora,u.nombre,u.apellido, u.correo, c.cor_asunto, c.cor_mensaje FROM correos c, usuario u WHERE c.cor_usu_destinatario = '$iduser' and 
'$iduser'= u.idusuario ORDER BY c.cor_fecha_hora DESC;");
        mysqli_close($conn);
        $result_sql = mysqli_num_rows($sql);
         
        if ($result_sql == 0) {
          
        } else {
            $option = '';
            while ($data = mysqli_fetch_array($sql)) {
                $destinatario = $data['correo'];
                $asunto = $data['cor_asunto'];
                $mensaje = $data['cor_mensaje'];

            }
           
        }
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                
         <?php include 'includes/scripts.php'; ?>
                <title>Mensaje Nuevo</title><a href="../../../config/conexionBD.php"></a>
            </head>
            <body>
                <?php include 'includes/header.php'; ?>
                <div class="form_register">
                    <h1><i class="fas fa-user-plus"></i> Mensaje nuevo | Correo</h1>
                    <hr>
                    <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form id="formulario01" method="POST" action="../../controlador/usuario/crear_correo.php">

                <label for="destinatario">Correo Destinatario
                    (*)</label>
                
                <input type="text" id="destinatario" name="destinatario" value="<?php echo $destinatario; ?>"  disabled />
                <br>
                <label for="asunto"> Asunto (*)</label>
                
                <input type="text" id="asunto" name="asunto" value="<?php echo $asunto; ?>"
                       disabled />
                <br>
                <label for="mensaje">Mensaje (*)</label>
                <textarea id="mensaje" name="mensaje" placeholder="Ingrese el mensaje..." disabled><?php echo $mensaje; ?></textarea>
                <br>
                <a href="index.php" class="btn_cancel">Regresar</a>

            </form>
        </div>
    </body>
</html>

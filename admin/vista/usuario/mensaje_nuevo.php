<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <?php include 'includes/scripts.php'; ?>
        <title>Mensaje Nuevo</title>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="form_register">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <h1><i class="fas fa-user-plus"></i> Mensaje nuevo | Correo</h1>
                <hr>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                <form id="formulario01" method="POST" action="../../controlador/usuario/crear_correo.php">
            
                <label for="destinatario">Correo Destinatario
                    (*)</label>
                <input type="text" id="destinatario" name="destinatario" value="" placeholder="Ingrese el correo del destinatario
                                                    ..." required />
                <br>
                <label for="asunto"> Asunto (*)</label>
                <input type="text" id="asunto" name="asunto" value="" placeholder="Ingrese el asunto
                                                        ..." required />
                <br>
                <label for="mensaje">Mensaje (*)</label>
                <textarea id="mensaje" name="mensaje" placeholder="Ingrese el mensaje..." required></textarea>
                <br>
               <button type="submit" class="btn_save"><i class="far fa-save"></i>Enviar</button>
               <a href="index.php" class="btn_cancel">Cancelar</a>
                
             </form>
            </div>
    </body>
</html>

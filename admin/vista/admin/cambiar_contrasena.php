<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cambiar Contraseña</title>
        <?php include 'includes/scripts.php'; ?>
    </head>
    <body>
          <h1><i class="fas fa-users"></i> Cambiar Contraseña</h1>
        <?php $codigo = $_GET["id"]; ?>
        
          <form id="formulario01" method="POST" action="../../controlador/admin/modificar_contrasena.php"> 
            <input type="hidden" id="codigo" name="codigo" value="<?php echo "$codigo" ?>" />
            
            <label for="cedula">Contraseña Actual (*)</label>
            <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/>
            <br>
            <label for="cedula">Contraseña Nueva (*)</label>
            <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/>
            <br>
            <input type="submit" id="modificar" name="modificar" value="Modificar" />
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
        </form>
    </body><a href="../controlador/modificar_contrasena.php"></a>
</html>

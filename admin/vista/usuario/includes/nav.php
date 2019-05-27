<nav>
    <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
        <?php if ($_SESSION['rol'] == 1) { ?>
            <li class="principal">
                <a href="#"><i class="fas fa-users"></i> Usuarios</a>
                <ul>
                    <li><a href="registro_usuario.php"><i class="fas fa-user-plus"></i> Nuevo Usuario</a></li>
                    <li><a href="lista_usuarios.php"><i class="fas fa-users"></i> Lista de Usuarios</a></li>
                </ul>
            </li>
        <?php } ?>
        <li class="principal">
            <a href="mensaje_nuevo.php">Mensaje Nuevo</a>
        </li>
        <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
           
        <?php } ?>
        <li class="principal">
            <a href="listar_enviados.php"><i class="fas fa-cubes"></i> Mensajes enviados</a>
            
        </li>
      
    </ul>
</nav>

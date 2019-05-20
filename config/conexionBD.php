<?php        

    $servername = "localhost";
    $username = "riera";
    $password = "cuenca";
    $dbname = "db_correo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
    	//echo "Conexion exitosa !!";
    }    
?>




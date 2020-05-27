<?php
    include_once '../config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS,NOMBRE_DB);
    $sql = "CREATE TABLE Personas
    (
        PID INT NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(PID),
        Cedula CHAR(20) UNIQUE, 
        Nombre CHAR(30),
        Apellido CHAR(30),
        Correo CHAR(30), 
        Edad INT
    )";

    if( mysqli_query($con, $sql)){
        echo "Tabla personas creada correctamente";
    }
    else{
        echo "Error en la conexion: ".mysqli_error($con);
    }
    mysqli_close($con);
    
?>
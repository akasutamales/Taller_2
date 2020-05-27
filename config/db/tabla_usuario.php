<?php
    include_once '../config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS,NOMBRE_DB);
    $sql = "CREATE TABLE Usuarios
    (
        PID INT NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(PID),
        usuario CHAR(30) UNIQUE, 
        rol CHAR(30),
        contrasenia CHAR(255),
        cedula CHAR(30)
    )
    
    ALTER TABLE Usuarios
    ADD FOREIGN KEY (cedula) REFERENCES Personas(Cedula);
    ";

    if( mysqli_query($con, $sql)){
        echo "Tabla usuarios creada correctamente";
    }
    else{
        echo "Error en la conexion: ".mysqli_error($con);
    }
    mysqli_close($con);
    
?>
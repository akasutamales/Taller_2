<?php
    include_once '../config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS,NOMBRE_DB);
    $sql = "INSERT INTO Personas(Cedula, Nombre, Apellido , Correo, Edad) values ('123','Daniel','Beltran','dan@gmail.com',21)";
    
    if( mysqli_query($con, $sql)){
        echo "Tnserción realizada correctamente";
    }
    else{
        echo "Error en la conexion: ".mysqli_error($con);
    }
    mysqli_close($con);

?>
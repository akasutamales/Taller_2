<?php
    include_once '../config.php';
    $con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS);
    $sql="CREATE DATABASE taller";
    
    if (mysqli_query($con,$sql)) {
		  echo "Base de datos taller creada";
    }else {
		  echo "Error en la creacion " . mysqli_error($con);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        //Validaciones de campos    
        $valido = true;
        $str_datos = "";
    
        if (!preg_match("/[0-9]+/",$_POST["Cedula"])){
            $str_datos.="La cédula solo puede contener números y no puede estar vacía<br>";
            $valido = false;
        }
        if (!filter_var($_POST["Correo"], FILTER_VALIDATE_EMAIL) ){
            $str_datos.="La estructura del correo es inválida debe ser NOMBRE@DOMINIO <br>";
            $valido = false;
        }

        if (!preg_match("/[a-zA-Z][a-zA-Z ]*/",$_POST["Nombre"])){
            $str_datos.="El nombre no puede estar vacío, debe comenzar por una letra y solo puede tener letras y espacios<br>";
            $valido = false;
        }

        if (!preg_match("/[a-zA-Z][a-zA-Z ]*/",$_POST["Apellido"])){
            $str_datos.="El apellido no puede estar vacío, debe comenzar por una letra y solo puede tener letras y espacios<br>";
            $valido = false;
        }

        // Creación o Actualización de datos
        if( $valido ){
            include_once '../logic/PersonaLogica.php';
            $personaLogica = new PersonaLogica();
            
            $persona = $personaLogica->findByCedula($_POST["Cedula"]);
            
            if($persona != null){
                $exito = $personaLogica->update($_POST['Cedula'],$_POST['Nombre'],$_POST['Apellido'],$_POST['Correo'],$_POST['Edad']);
                if( $exito ){
                    $str_datos.= "Los datos se actualizaron correctamente <br>";
                    $persona = $personaLogica->findByCedula($_POST["Cedula"]);
                    $str_datos.= $persona->toString();
                }else{
                    $str_datos.="Error en la actualización de datos";
                }
            }else{
                $exito = $personaLogica->create($_POST['Cedula'],$_POST['Nombre'],$_POST['Apellido'],$_POST['Correo'],$_POST['Edad']); 
                if( $exito ){
                    $str_datos.= "La persona fue creada correctamente <br>";
                    $persona = $personaLogica->findByCedula($_POST["Cedula"]);
                    $str_datos.= $persona->toString();
                }else{
                    $str_datos.="Error en la creación de datos";
                }
            }
        }

        echo $str_datos;
    ?>

    <a href="list.php">Volver al listado</a>

</body>
</html>


<?php
    /*
    include_once dirname(__FILE__) . './config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    $sql = "SELECT * FROM Personas where id=$_POST[Cedula]";    
    $str_datos = "";
    $resultado = mysqli_query($con, $sql);
    $cont = 0;



    
    if( mysqli_connect_errno()){
        $str_datos.="Error en la conexión".mysqli_connect_error();
    }
    if($resultado){
        while( $fila = mysqli_fetch_array($resultado) ){
            $sql = "UPDATE Personas
                    SET Nombre = $_POST[Nombre], Apellido = $_POST[Apellido], Correo = $_POST[Correo], Edad = $_POST[Edad]
                    WHERE Cedula = $fila[Cedula]";
            if( mysqli_query($con, $sql) ){
                $str_datos.="Se actualizaron los datos de la persona<br>";
                $str_datos.="Cedula: ".$_POST['Cedula']."<br>";
                $str_datos.="Nombre: ".$_POST['Nombre']."<br>";
                $str_datos.="Apellido: ".$_POST['Apellido']."<br>";
                $str_datos.="Correo: ".$_POST['Correo']."<br>";
                $str_datos.="Edad: ".$_POST['Edad']."<br>";
            }
            $cont++;
        }
    }

    if( $cont == 0){
        $sql = "INSERT INTO Personas(Cedula, Nombre, Apellido ,Correo, Edad) values ($_POST[Cedula],$_POST[Nombre],$_POST[Apellido], $_POST[Correo], $_POST[Edad])";
        if( mysqli_query($con, $sql)){
            echo "Inserción realizada correctamente";
        }
        else{
            echo "Error en la conexion: ".mysqli_error($con);
        }
        mysqli_close($con);
    }
    echo $str_datos;*/



    //echo "<a href="personas.php"><button>Volver</button></a>";
?>
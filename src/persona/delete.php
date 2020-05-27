<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        include_once '../logic/PersonaLogica.php';
        $personaLogica = new PersonaLogica();
        $str_datos = "";
        $persona = $personaLogica->findByCedula( $_POST["Cedula"] );
        if( $persona != null){
            if( $personaLogica->delete($_POST["Cedula"]) ){
                $str_datos.="La persona se eliminó de forma correcta<br><br>";
            }else{
                $str_datos.="ERROR: LA PERSONA NO SE ELIMINO<br><br>";
            }
            $str_datos.="Los datos de la persona eran:<br>";
            $str_datos.=$persona->toString();
        }else{
            $str_datos.="No se encontro la persona con cedula ".$_POST["Cedula"]."<br>";
        }

        echo $str_datos;
    ?>

    <a href="list.php">Volver al listado</a>
</body>
</html>

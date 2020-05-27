<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include_once '../logic/UsuarioLogica.php';

    $usuarioLogica = new UsuarioLogica();
    if($_REQUEST['btn'] == 'Actualizar'){
        
            if( $_POST['Rol'] == 'usuario' || $_POST['Rol'] == 'admin'){
        
                $exito = $usuarioLogica->update($_POST['Usuario'], $_POST['Rol']);
                if ($exito) {
                    echo "El rol del usuario se actualizo exitosamente <br>";
                } else {
                    echo "ERROR: El rol del usuario no se actualizo <br>";
                }
            }else{
                echo "ERROR: El rol del usuario es inválido, los valores posibles son admin o usuario <br>";
            }
    }else{
        if ($usuarioLogica->delete($_POST['Usuario'])){
            echo "El usuario se elimino correctamente<br>";
        }else{
            echo "El usuario no se pudo eliminar<br>";
        }
    }

    ?>

    <a href="listado.php"> Volver</a>
</body>

</html>
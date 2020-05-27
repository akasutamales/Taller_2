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

    $str_datos = "";
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    // echo $query['user'];

    $usuarioLogica = new UsuarioLogica();
    $usuario = $usuarioLogica->findByUsername($query['user']);

    $str_datos .= "<form method='POST' action='update-user.php'>";
    $str_datos .= "Nombre de usuario: ";
    $str_datos .= "<input readonly value=" . $usuario->getUsuario() . " name = 'Usuario' >";
    $str_datos .= "<p>Rol: </p>";
    $str_datos .= "<input type = 'text' value=" . $usuario->getRol() . " name = 'Rol'>";
    $str_datos .= "<input type = 'submit' value='Actualizar' name='btn'>";
    $str_datos .= "<input type = 'submit' value='Eliminar' name='btn'>";
    $str_datos .= "</form>";

    $personaLogica = new PersonaLogica();

    $persona = $personaLogica->findByCedula($usuario->getCedula());

    $str_datos .= $persona->toString();

    echo $str_datos;
    ?>

    <a href="listado.php"> Volver</a>
</body>

</html>
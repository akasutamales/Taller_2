<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <tr>
            <th>Cedula</th>
            <th>Nombre usuario</th>
            <th>Rol</th>
        </tr>
    <?php  

        session_start();
        if(isset($_SESSION['visitas'])){
        $_SESSION['visitas']=$_SESSION['visitas']+1;
        }
        else{
        $_SESSION['visitas']=1;
        }
        include_once '../logic/UsuarioLogica.php';
        $datos = "";
        $usuarioLogica = new UsuarioLogica();
        
        foreach ($usuarioLogica->getAll() as $i => $usuario) {
            $datos .= "<tr>";
            $datos .= "<td>" . $usuario->getCedula() . "</td>";
            $datos .= "<td><a href='edit.php?user=".$usuario->getUsuario()." ' >" . $usuario->getUsuario() . "</a></td>";
            $datos .= "<td>" . $usuario->getRol() . "</td>";
            $datos .= "</tr>";
        }
        echo $datos;
        ?>

</table>
        <form method="POST" action="salir.php">
            <input type="submit" action="salir.php" value= "Salir">
        </form>
</body>
</html>
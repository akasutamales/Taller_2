<?php
    include_once '../logic/UsuarioLogica.php';
    
    session_start();
        if(isset($_SESSION['visitas'])){
        $_SESSION['visitas']=$_SESSION['visitas']+1;
        }
        else{
        $_SESSION['visitas']=1;
        }
    $str_datos = "";

    $usuarioLogica = new UsuarioLogica();   
    $usuario = $usuarioLogica->findByUsername($_SESSION['user']);

    $str_datos.= "<p>Nombre de usuario: ".$usuario->getUsuario()." </p>";
    $str_datos.= "<p>Rol: ". $usuario->getRol() . "</p>";

    $personaLogica = new PersonaLogica();
    
    $persona = $personaLogica->findByCedula( $usuario->getCedula() );

    $str_datos.= $persona->toString();
    
    echo $str_datos;

    
?>

<form method="POST" action="salir.php">
            <input type="submit" action="salir.php" value= "Salir">
</form>
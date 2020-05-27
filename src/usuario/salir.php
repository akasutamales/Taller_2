<?php

    session_start();
    echo "La página fue visitada ".$_SESSION['visitas']." veces";

?>

<a href="../index.html">Volver</a>
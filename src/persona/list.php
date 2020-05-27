<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de personas</title>
    <link href="estilo.css">
</head>

<body>
    <div>
        <form action="create-update.php" method="POST">
            Cedula: <input type="text" name="Cedula">
            Nombre: <input type="text" name="Nombre">
            Apellido: <input type="text" name="Apellido">
            Correo: <input type="text" name="Correo">
            Edad: <input type="text" name="Edad">
            
            <input type="submit" value="Crear/Actualizar persona">
            
        </form>
    </div>
    <div>
        <form action="delete.php" method="POST">
            Cedula: <input type="text" name="Cedula">
            <input type="submit" value="Eliminar persona">
        </form>
    </div>
    <table>
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Edad</th>
        </tr>

        <?php
        include_once '../logic/PersonaLogica.php';
        $datos = "";
        $personaLogica = new PersonaLogica();

        foreach ($personaLogica->getAll() as $i => $persona) {
            $datos .= "<tr>";
            $datos .= "<td>" . $persona->getCedula() . "</td>";
            $datos .= "<td>" . $persona->getNombre() . "</td>";
            $datos .= "<td>" . $persona->getApellido() . "</td>";
            $datos .= "<td>" . $persona->getCorreo() . "</td>";
            $datos .= "<td>" . $persona->getEdad() . "</td>";
            $datos .= "</tr>";
        }
        echo $datos;
        ?>

    </table>

    <a href="../index.html"><button>Volver</button></a>
</body>

</html>
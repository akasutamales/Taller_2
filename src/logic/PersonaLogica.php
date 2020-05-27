<?php
    include_once '../DB.php';
    include_once '../model/Persona.php';
    class PersonaLogica{

        public function getAll(){
            $db = new DB();

            $db->connect();
            
            $resultado = $db->query("SELECT * FROM Personas");
            $personas = [];
                    
            while( $fila = mysqli_fetch_array($resultado) ){
                    $persona = new Persona($fila['Cedula'],$fila['Nombre'],$fila['Apellido'],$fila['Correo'],$fila['Edad']);
                    array_push( $personas, $persona);
            }

            $db->close();

            return $personas;
        }

        public function findByCedula($cedula){
            $db = new DB();

            $db->connect();
            $resultado = $db->query("SELECT * FROM Personas WHERE Cedula='$cedula'");
            $persona = null;
            while( $fila = mysqli_fetch_array($resultado) ){
                $persona = new Persona($fila['Cedula'],$fila['Nombre'],$fila['Apellido'],$fila['Correo'],$fila['Edad']);
            }
            $db->close();

            return $persona;
        }

        public function create($cedula,$nombre,$apellido,$correo,$edad){
        
            $sql = "INSERT INTO Personas(Cedula, Nombre, Apellido ,Correo, Edad) 
            values ('$cedula','$nombre','$apellido', '$correo',$edad)";

            $db = new DB();
            
            $db->connect();

            $exito = $db->query($sql);

            $db->close();
            
            return $exito;
        }

        public function update($cedula,$nombre,$apellido,$correo,$edad){
           
            $sql = "UPDATE Personas
                    SET Nombre = '$nombre', Apellido = '$apellido', Correo = '$correo', Edad = $edad
                    WHERE Cedula = '$cedula'; ";
            
            $db = new DB();
            
            $db->connect();

            $exito = $db->query($sql);

            $db->close();

            return $exito;
        }
        public function delete($cedula){
            $sql = "DELETE FROM Personas where Cedula='$cedula';";
            
            $db = new DB();
            
            $db->connect();

            $exito = $db->query($sql);

            $db->close();

            return $exito;
        }


        
    } 

    
    // $persona = new Persona("123","Daniel","Beltran", "dan@gmail.com", 21);
?>
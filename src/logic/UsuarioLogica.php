<?php
    include_once '../DB.php';
    include_once '../model/Usuario.php';
    include_once '../logic/PersonaLogica.php';

    class UsuarioLogica{

        public function getAll(){
            $db = new DB();

            $db->connect();
            
            $resultado = $db->query("SELECT * FROM Usuarios");
            $usuarios = [];
                    
            while( $fila = mysqli_fetch_array($resultado) ){
                    $usuario = new Usuario($fila['usuario'],$fila['rol'],$fila['contrasenia'],$fila['cedula']);
                    array_push( $usuarios, $usuario);
            }

            $db->close();

            return $usuarios;
        }

        public function login($nombreUsuario, $contrasenia){
            $db = new DB();

            $db->connect();
            $resultado = $db->query("SELECT * FROM Usuarios WHERE usuario='$nombreUsuario'; ");
            $usuario = null;
            while( $fila = mysqli_fetch_array($resultado) ){
                $usuario = new Usuario($fila['usuario'],$fila['rol'],$fila['contrasenia'],$fila['cedula']);
            }
            
            $db->close();

            $hash = $usuario->getContrasenia();

            return hash_equals($hash, crypt($contrasenia, $hash)) ;
                
        }

        public function findByUsername($nombreUsuario){
            $db = new DB();

            $db->connect();
            $resultado = $db->query("SELECT * FROM Usuarios WHERE usuario='$nombreUsuario'");
            $usuario = null;
            while( $fila = mysqli_fetch_array($resultado) ){
                $usuario = new Usuario($fila['usuario'],$fila['rol'],$fila['contrasenia'],$fila['cedula']);
            }
            $db->close();

            return $usuario;
        }


        public function register($usuario,$rol,$contrasenia,$cedula){

            $user = $this->findByUsername($usuario);
            $personaLogica = new PersonaLogica();
            $persona = $personaLogica->findByCedula($cedula);
            
            $exito = true;

            if( $user != null){
                echo "El nombre de usuario esta duplicado<br>";
                $exito = false;
            } 
            
            if( $persona == null){
                echo "No se encontro la persona con cédula ". $cedula ."<br>";
                $exito = false;
            } 

            if (CRYPT_SHA512 == 1)
            {
                $contrasenia = crypt($contrasenia,'$6$rounds=5000$unsaltcheveredeejemplo$');
            }else{
                echo "Error cifrando la contraseña<br>";
                $exito = false;
            }
            
            if( $exito ){
                $sql = "INSERT INTO Usuarios(usuario, rol, contrasenia , cedula) 
                values ('$usuario','$rol', '$contrasenia','$cedula')";
    
                $db = new DB();            
                $db->connect();
                $exito = $db->query($sql);
                $db->close();
            }
            
            return $exito;
        }

        public function getRol(){
            
            $usuarios = $this->getAll();
            $rol = 'usuario';
            if( count($usuarios) == 0){
                $rol = 'admin';
            }
            return $rol;
        }

        public function update($user,$rol){
           
            $sql = "UPDATE Usuarios
                    SET rol = '$rol'
                    WHERE usuario = '$user'; ";
            
            $db = new DB();
            
            $db->connect();

            $exito = $db->query($sql);

            $db->close();

            return $exito;
        }
        public function delete($user){
            $sql = "DELETE FROM Usuarios where usuario='$user';";
            
            $db = new DB();
            
            $db->connect();

            $exito = $db->query($sql);

            $db->close();

            return $exito;
        }


        
    } 

    
    // $persona = new Persona("123","Daniel","Beltran", "dan@gmail.com", 21);
?>
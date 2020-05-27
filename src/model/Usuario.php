<?php
    include_once '../DB.php';

    class Usuario{

        private $usuario;
        private $rol;
        private $contrasenia;
        private $cedula;
        
        public function __construct($usuario, $rol, $contrasenia, $cedula ){
            $this->usuario = $usuario;
            $this->rol = $rol;
            $this->contrasenia = $contrasenia;
            $this->cedula = $cedula;
        }
        
        public function getCedula(){
            return $this->cedula;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function getRol(){
            return $this->rol;
        }

        public function getContrasenia(){
            return $this->contrasenia;
        }

        public function toString(){

            $str_datos = "";
            $str_datos.="Cedula: ".$this->getCedula()."<br>";
            $str_datos.="Nombre: ".$this->getUsuario()."<br>";
            $str_datos.="Apellido: ".$this->getRol()."<br>";
            $str_datos.="Correo: ".$this->getContrasenia()."<br>";
            return $str_datos;
        }


    }	
    // $persona = new Persona("123","Daniel","Beltran", "dan@gmail.com", 21);
    
?>

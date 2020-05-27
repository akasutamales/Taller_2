<?php
    include_once '../DB.php';
    class Persona{

        private $cedula;
        private $nombre;
        private $apellido;
        private $correo;
        private $edad;
        
        public function __construct($cedula, $nombre, $apellido, $correo,  $edad ){
            $this->cedula = $cedula;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->correo = $correo;
            $this->edad = $edad;
        }
        
        public function getCedula(){
            return $this->cedula;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getCorreo(){
            return $this->correo;
        }

        public function getEdad(){
            return $this->edad;
        }

        public function toString(){

            $str_datos = "";
            $str_datos.="Cedula: ".$this->getCedula()."<br>";
            $str_datos.="Nombre: ".$this->getNombre()."<br>";
            $str_datos.="Apellido: ".$this->getApellido()."<br>";
            $str_datos.="Correo: ".$this->getCorreo()."<br>";
            $str_datos.="Edad: ".$this->getEdad()."<br>";
            return $str_datos;
        }


    }	
    // $persona = new Persona("123","Daniel","Beltran", "dan@gmail.com", 21);
    
?>

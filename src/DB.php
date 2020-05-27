<?php
    
    include_once dirname(__DIR__).'../config/config.php';
    
    class DB{
        
        private $connection;

        public function connect(){
            
            $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS, NOMBRE_DB);
            if( mysqli_connect_errno()){
                throw new Exception ('Error en la conexion: '.mysqli_connect_error());
            }else{
                $this->connection = $con;
            }
        }

        public function selectQuery($query){
            $resultado = mysqli_query($this->connection, $query);
            return $resultado;
        }

        public function query($query){
            $resultado = mysqli_query($this->connection, $query);
            if( !$resultado)
                echo mysqli_error($this->connection)."<br>";
            return $resultado;
        }

        public function close(){
            mysqli_close($this->connection);
        }            
    } 
?>
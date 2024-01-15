<?php
session_start();
    date_default_timezone_set('America/Lima');
    define( '__HOME__', '/' );
    define( '__IP__', 'http://sistemas.faskex.com/');
    define( '__SECTION__', 'app/sections/' );
    define( '__MOD__', 'app/modules/' );
    define( '__REC__', 'app/recursos/' );

    //DATOS DE USUARIO
    define( '__RAZON__', 'FASK EXPRESS S.A.C' );
    define( '__COM__', 'FASKEX' );
    define( '__RUC__', '20554335269' );    
    define( '__DIREC__', $_SESSION['fasklog']['gi_direccion']);
    define( '__UBICA__', 'Lima-Lima-Lince');
    define( '__CORREO__', '' );
    define( '__VERS__', 'PROD' );
    define( '__WEB__', 'http://www.faskex.com' );
    define( '__US__', 'SOLUTI02' );
    define( '__PASS__', 'F4sk4x2019' );

    class database {
        private $conexion;
        public function conectar(){
            $this->conexion = ( new PDO("mysql:host=localhost;dbname=fasktech_sistema", "fasktech_sistema", "vR_LQ3#W]haa")) or die(mysql_error());
        }

        public function consulta($sql){
            $res = $this->conexion->query($sql);
            if(!$res){
                echo 'MySQL Error: ' . mysqli_error($this);
                exit;
            }
            return $res;
        }   

        public function select($sql){
            $this->conectar(); 
            $res = $this->conexion->prepare($sql);
            $this->disconnect();
            if(!$res->execute()){
                 print_r($res->errorInfo());
                exit;
            }else{
                if($this->numero_de_filas( $res ) > 0){   
                    while($row = $res->fetch(PDO::FETCH_ASSOC)){
                        $data[] = $row;
                    }       
                    return $data;
                }else{   
                    return null;
                }
            }
        }
        public function proc($sql){
            $this->conectar(); 
            $res = $this->conexion->prepare($sql);
            $this->disconnect();
            if(!$res->execute()){
                echo 'MySQL Error: ' . mysqli_error($this);
                exit;
            }else{
                if($this->numero_de_filas( $res ) > 0){   
                    while($row = $res->fetch(PDO::FETCH_ASSOC)){
                        $data[] = $row;
                    }       
                    return $data[0];
                }else{   
                    return null;
                }
            }
        }
        public function ejecutar($sql){
            $this->conectar(); 
            $res = $this->conexion->prepare($sql);
            $res->execute();
            $this->disconnect();
            return $res->rowCount(); 
        }
        public function insertar($sql){
            $this->conectar(); 
            $res = $this->conexion->prepare($sql);
            $res->execute();
            $bb=$this->conexion->lastInsertId();
            $this->disconnect();
            return $bb; 
        }
        function numero_de_filas($res){
            if(!is_object($res)) return false;
            return $res->rowCount();
        }
        public function disconnect(){
            $this->conexion=null;
        }
    }
?>

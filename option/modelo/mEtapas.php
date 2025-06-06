<?php
    Class MEtapas{

        private $conexion;

        public function __construct() {
            require_once 'config/conexion_1n.php';
            $this->conexion= new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
            $this->conexion->set_charset("utf8");
        }
        
        public function ListarEtapas(){

            $sql= "SELECT IdEtapas,NombreEtapas FROM Etapas";
            $resultado=$this->conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while($fila=$resultado->fetch_assoc()){
                    
                    $Etapas[$fila["IdEtapas"]]=$fila["NombreEtapas"];
                }
            }else{
                exit('No hay filas en la tabla de Etapas');
            }
            return $Etapas;
        }

        public function InsertarEtapa($nombre){

                try {
                $sql= 'INSERT INTO etapas(NombreEtapas) VALUES("'.$nombre.'");';
                $this->conexion->query($sql); 

                $this->mensaje="Etapa insertada correctamente";

            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    $this->mensaje="El nombre de esta etapa ya existe";
                }else{
                    $this->mensaje="La etapa no ha sido insertada".$e->getMessage();
                }
            }

            return $this->mensaje; 
                
        }
    }
?>
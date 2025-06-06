<?php
    Class MActividades{

        private $conexion;

        public function __construct() {
            require_once 'config/conexion_1n.php';
            $this->conexion= new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
            $this->conexion->set_charset("utf8");
        }

        public function ListarActividades(){

            $sql= "SELECT IdActividades, NombreActividades, NombreEtapas FROM actividades 
                            INNER JOIN etapas ON
                            actividades.IdEtapas = etapas.IdEtapas";
            $resultado=$this->conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while($fila=$resultado->fetch_assoc()){
                    
                    $Actividades[$fila["IdActividades"]]=[$fila["NombreActividades"], $fila["NombreEtapas"]];
                }
            }else{
                exit('No hay filas en la tabla de Etapas');
            }
            return $Actividades;
        }
        
        public function InsertarActividad($nombre, $etapa){

            try {
            
                $sql= 'INSERT INTO actividades(NombreActividades, IdEtapas) VALUES("'.$nombre.'",'.$etapa.');';
                $this->conexion->query($sql);

                $this->mensaje="Actividad añadida correctamente";

            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    $this->mensaje="Ya existe esta actividad en la Base de Datos";
                }else {
                    $this->mensaje="La actividad no ha sido insertada".$e->getMessage();
                }
                
            }

            return $this->mensaje;
        }
    }
?>
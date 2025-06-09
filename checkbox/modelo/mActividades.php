<?php
    Class MActividades{

        private $conexion;
        public $mensaje;

        public function __construct() {
            require_once 'config/conexion.php';
            $this->conexion= new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
            $this->conexion->set_charset("utf8");
        }

        public function ListarActividades(){
                
            $sql= "SELECT IdActividades, NombreActividades FROM actividades";
            $resultado=$this->conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while($fila=$resultado->fetch_assoc()){
                        
                    $Actividades[$fila["IdActividades"]]=$fila["NombreActividades"];

                }
                return $Actividades;
            }else {
                exit('No hay actividades actualmente');
            }
            
            
            
        }

        public function etapa_actividad($idActividad){
            $sql = "SELECT actividades.idActividades AS Actividad, actividades.nombreActividades AS nombreA, etapas.idEtapas AS Etapa, etapas.nombreEtapas AS nombreE 
                    FROM actividades 
                    INNER JOIN etapas_actividades ON actividades.idActividades = etapas_actividades.idActividades
                    INNER JOIN etapas ON etapas_actividades.idEtapas = etapas.idEtapas
                    WHERE actividades.idActividades = '$idActividad'";
            $result = $this->conexion->query($sql);
        
            if ($result->num_rows > 0) {
                $data = [
                    'etapas' => []
                ];
                while ($row = $result->fetch_assoc()) {
                    $data['idActividad'] = $row['Actividad'];
                    $data['nombreA'] = $row['nombreA'];
                    $data['etapas'][] = [
                        'id' => $row['Etapa'],
                        'nombre' => $row['nombreE']
                    ];
                }
                return $data;
            } else {
                return null;
            }
        }
        
        public function InsertarActividad($nombre, $etapas){


            try {
            
                $sql= 'INSERT INTO actividades(NombreActividades) VALUES("'.$nombre.'");';
                $this->conexion->query($sql); 
                    
                    $IdActividad = $this->conexion->insert_id;

                    foreach ($etapas as $etapa) {
                        $sql = 'INSERT INTO etapas_actividades VALUES ('.$etapa.','.$IdActividad.')';
                        $this->conexion->query($sql);
                    }

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

        public function ModificarActividad($idActividad, $actividad){

            $sql= 'UPDATE actividades
	                SET NombreActividades = "'.$actividad.'"
	                WHERE IdActividades = '.$idActividad.';';
            $resultado=$this->conexion->query($sql);
            
            if ($resultado) {

                $this->mensaje="Actividad Modificada";

            }else{

                $this->mensaje="Fallo al modificar la Actividad";

            }

            return $this->mensaje;

        }

        public function BorrarActividad($idActividad){

            $sql= 'DELETE FROM actividades WHERE IdActividades = '.$idActividad.';';
            $resultado=$this->conexion->query($sql);
            // echo $this->conexion->error;
            
            if ($resultado) {

                $this->mensaje="Actividad Borrada";

            }else{

                $this->mensaje="Fallo al borrar la Actividad";

            }

            return $this->mensaje;
        }
    }
?>
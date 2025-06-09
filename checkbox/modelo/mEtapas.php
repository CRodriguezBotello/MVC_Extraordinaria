<?php
    Class MEtapas{

        private $conexion;
        public $mensaje;

        public function __construct() {
            require_once 'config/conexion.php';
            $this->conexion= new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
            $this->conexion->set_charset("utf8");
        }

        public function ListarEtapas(){

            $sql= "SELECT * FROM Etapas";
            $resultado=$this->conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while($fila=$resultado->fetch_assoc()){
                    
                    $Etapas[]=$fila;
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

        public function Nuevas_Etapa_Actividad($id_activ, $etapas){
            $this->conexion->begin_transaction();
        
            try {
                
                $sql_borrar = "DELETE FROM etapas_actividades WHERE idActividades = ?";
                $stmt = $this->conexion->prepare($sql_borrar);
                $stmt->bind_param('i', $id_activ);
                $stmt->execute();
        
                
                $sql_insert = "INSERT INTO etapas_actividades (idActividades, idEtapas) VALUES (?, ?)";
                $stmt_insert = $this->conexion->prepare($sql_insert);
        
                foreach ($etapas as $etapa) { //foreach igual que en el de alta de actividad
                    $stmt_insert->bind_param('ii', $id_activ, $etapa);
                    if (!$stmt_insert->execute()) {
                        throw new Exception("Error insertando etapa $etapa: " . $stmt_insert->error);
                    }
                }
        
                $this->conexion->commit();
                $this->mensaje = "Etapas actualizadas correctamente";
            } catch (Exception $e) {
                $this->conexion->rollback(); //en caso de fallo al borrar las etapas y darlas de alta de nuevo vuelve atras y no hace ningun cambio
                $this->mensaje = "Error al actualizar etapas: " . $e->getMessage();
            }
        
            return $this->mensaje;
        }
    }
?>
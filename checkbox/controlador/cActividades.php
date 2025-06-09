<?php
        require_once 'modelo/mActividades.php';
        include 'modelo/mEtapas.php';
    Class CActividades{

        public $mensaje;
        public $actividad;
        public $etapa;

        public function ListarActividades(){

            $objActividad = new MActividades();
            $Actividades=$objActividad->ListarActividades();
            return $Actividades;
        }

        public function AnadirActividad(){
            if (!empty($_POST["nombre"])) {

                $nombre = $_POST["nombre"];

                if (isset($_POST["etapas"]) && !empty($_POST["etapas"])) {

                    $etapas = $_POST["etapas"];

                }

                $objActividad = new MActividades();
                $this->mensaje=$objActividad->InsertarActividad($nombre, $etapas);
            }else{
                $this->mensaje="El nombre de la Actividad está vacío";
            }

            return $this->mensaje;
            
        }

        public function obtener_datos(){
            $this->actividad = null;
            $this->etapa = [];
        
            if (isset($_GET['idActividad'])) {
                $idActividad = $_GET['idActividad'];
        
                $objMAct = new MActividades();
                $this->actividad = $objMAct->etapa_actividad($idActividad);
        
                $objMEtp = new MEtapas();
                $this->etapa = $objMEtp->ListarEtapas();
            } else {
                $this->mensaje = "Fallo al modificar: ID no recibido";
            }
        }

        public function ActualizarActividad(){
            if (!empty($_POST["actividad"])) {
                if (isset($_POST["idActividad"]) && !empty($_POST["idActividad"])) {

                    $idActividad = $_POST["idActividad"];
                    $actividad = $_POST["actividad"];

                    $objActividad = new MActividades();
                    $this->mensaje=$objActividad->ModificarActividad($idActividad, $actividad);
                    return $this->mensaje;
                }
            }
            
        }

        public function EliminarActividad(){
            if (isset($_GET["idActividad"]) && !empty($_GET["idActividad"])) {

                $idActividad = $_GET["idActividad"];

                $objActividad = new MActividades();
                $this->mensaje=$objActividad->BorrarActividad($idActividad);
                
            }else{
                $this->mensaje="Fallo al borrar la Actividad";
            }
            return $this->mensaje;
        }
    }
?>
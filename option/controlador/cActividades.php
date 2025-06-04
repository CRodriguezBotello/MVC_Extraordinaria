<?php
    Class CActividades{

        public function ListarActividades(){
            require_once 'modelo/mActividades.php';
            $objActividad = new MActividades();
            $Actividades=$objActividad->ListarActividades();
            return $Actividades;
        }

        public function AnadirActividad(){

            if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {

                $nombre = $_POST["nombre"];

            }
            
            require_once 'modelo/mActividades.php';
            $objActividad = new MActividades();
            $Actividad=$objActividad->InsertarActividad();
        }
    }
?>
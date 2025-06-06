<?php
    Class CActividades{

        public function ListarActividades(){
            require_once 'modelo/mActividades.php';
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

                require_once 'modelo/mActividades.php';
                $objActividad = new MActividades();
                $this->mensaje=$objActividad->InsertarActividad($nombre, $etapas);
            }else{
                $this->mensaje="El nombre de la Actividad está vacío";
            }

            return $this->mensaje;
        }
    }
?>
<?php
    Class CEtapas{

        public $mensaje;

        public function ListarEtapas(){
            require_once 'modelo/mEtapas.php';
            $objEtapas = new MEtapas();
            $Etapas=$objEtapas->ListarEtapas();
            return $Etapas;
        }

        public function AnadirEtapa(){
            if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {

                $nombre = $_POST["nombre"];

                require_once 'modelo/mEtapas.php';
                $objEtapas = new MEtapas();
                $this->mensaje=$objEtapas->InsertarEtapa($nombre);
                

            }else{
                $this->mensaje="El nombre de la Actividad está vacío";
            }

            return $this->mensaje;
        }
    }
?>
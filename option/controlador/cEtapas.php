<?php
    Class CEtapas{
        public function ListarEtapas(){
            require_once 'modelo/mEtapas.php';
            $objEtapas = new MEtapas();
            $Etapas=$objEtapas->ListarEtapas();
            return $Etapas;
        }

        public function AnadirEtapa(){
            require_once 'modelo/mEtapas.php';
            $objEtapas = new MEtapas();
            $objEtapas->InsertarEtapa();
        }
    }
?>
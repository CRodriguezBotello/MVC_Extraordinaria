<?php
    require_once 'controlador/cEtapas.php';
    $objEtapas = new CEtapas();
    $objEtapas->AnadirEtapa();

    include 'listarEtapas.php';
    
?>
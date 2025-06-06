<?php
    require_once 'controlador/cEtapas.php';
    $objEtapas = new CEtapas();
    $mensaje=$objEtapas->AnadirEtapa();

    include 'vista/v_mensaje_Etapas.php';
    
?>
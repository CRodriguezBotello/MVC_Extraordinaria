<?php
    require_once 'controlador/cEtapas.php';
    $objEtapa = new CEtapas();
    $Etapas=$objEtapa->ListarEtapas();

    include 'vista/v_formulario_option.php';
?>
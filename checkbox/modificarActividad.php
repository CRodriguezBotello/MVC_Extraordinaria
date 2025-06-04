<?php
    require_once 'controlador/cActividades.php';
    $objActividades = new CActividades();
    $Actividades=$objActividades->ListarActividades();

    include 'vista/v_modificar_actividad.php';
?>
<?php
    
    include('controlador/cActividades.php');
    
    $objActividad = new CActividades();
    $objActividad->obtener_datos();
    
    $Actividad = $objActividad->actividad;
    $Etapa =$objActividad->etapa;



    include 'vista/v_modificar_actividad.php';
?>
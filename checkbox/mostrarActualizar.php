<?php
    
    include('controladores/cactividades.php');
    
    $objActividad = new Cactividades();
    $objActividad->obtener_nombre_act();
    
    $act = $objActividad->act;
    $etapas =$objActividad->etapas;


    
    include 'vista/v_modificar_actividad.php';
?>
<?php
    include('controlador/cActividades.php');
    include('controlador/cEtapas.php');

    $objActividad = new CActividades();
    $mensaje=$objActividad->ActualizarActividad();

    $objEtapas=new CEtapas();
    $objEtapas->actualizar_etapas_actividad();

    // $mensaje=$objActividad->mensaje;
    $mensaje2=$objEtapas->mensaje;

    include('vista/v_actividad_etapa_modificada.php');
?>
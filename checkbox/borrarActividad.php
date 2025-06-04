<?php

    require_once 'controlador/cActividades.php';
    $objActividad = new CActividades();
    $mensaje=$objActividad->EliminarActividad();

    include 'vista/v_mensaje_Actividades.php';
?>
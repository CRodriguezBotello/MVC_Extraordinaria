<?php
    require_once 'controlador/cActividades.php';
    $objActividad = new CActividades();
    $Actividad=$objActividad->AnadirActividad();

    include 'listarActividades.php';
?>
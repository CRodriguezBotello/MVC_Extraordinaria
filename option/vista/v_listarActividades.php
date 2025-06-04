<?php
        foreach ($Actividades as $idActividad => $Actividad) {
                // recorremos cada indice del array y mostramos su valor en el option
                echo '<p> Actividad '.$idActividad.': ' .$Actividad[0]. ', '.$Actividad[1].'</p><br/>';
        }
?>
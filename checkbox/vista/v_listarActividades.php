<?php
        foreach ($Actividades as $idActividad => $Actividad) {
                // recorremos cada indice del array y mostramos su valor en el option
                echo '<p> Actividad '.$idActividad.': ' .$Actividad. '</p>';
                echo '<button><a href="mostrarActualizar.php?idActividad='.$idActividad.'&actividad='.$Actividad.'">Modifcar</a></button>';
                echo '<button><a href="borrarActividad.php?idActividad='.$idActividad.'">Borrar</a></button>';
                echo '<br/>';
                echo '<br/>';
        }
?>
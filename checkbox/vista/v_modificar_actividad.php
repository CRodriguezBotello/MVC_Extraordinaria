<!DOCTYPE html>
<html>
    <head>
        <title>Añadir Etapas</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Añadir Etapas</h3>
        <form action="modificarActividad.php" method="post">
            <label for="nombre">Nombre de la actividad: </label>
            <input type="text" name="actividad" value="<?php echo $Actividad['nombreA']; ?>">
            <br/>
            <input type="hidden" name="idActividad" value="<?php echo $Actividad['idActividad']; ?>">
            <br/>

            <?php
                $etapasSeleccionadas = array_column($Actividad['etapas'], 'id');

                foreach ($Etapa as $etapa) {
                    $checked = in_array($etapa['IdEtapas'], $etapasSeleccionadas) ? 'checked' : '';
                    echo '<input type="checkbox" name="etapas[]" value="'.$etapa['IdEtapas'].'" '.$checked.'> '.$etapa['NombreEtapas'].'<br>';
                }
            ?>

            <input type="submit" value="Enviar">
            <input type="reset" value="Limpiar">
        </form>
    </body>
</html>

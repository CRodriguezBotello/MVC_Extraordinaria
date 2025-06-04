<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapas Desde BBDD</title>
</head>
<body>
    <h1>Añadir Actividad</h1>
    <form action="insertar_actividades.php" method="post">
        <label for="nombre">Actividad: </label><br/>
        <input type="text" name="nombre"><br/><br/>

        <label for="etapas">Etapas:</label><br/>
        <select name="etapas">
        <?php
            foreach ($Etapas as $idEtapa => $etapa) {
                // recorremos cada indice del array y mostramos su valor en el option
                echo '<option value='.$idEtapa.'>' .$etapa. '<br/>';
            }
        ?>
        </select>
        <br/>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Reiniciar">
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapas Desde BBDD</title>
</head>
<body>
    <h1>Añadir Actividad</h1>
    <form action="actualizarActividad.php" method="post">
        <label for="nombre">Cambiar nombre de la actividad:</label>
        <br>
        <?php

            echo '<input type="text" name="actividad" value="'.$_GET["actividad"].'">';
            echo '<input type="hidden" name="idActividad" value="'.$_GET["idActividad"].'"><br/>';
        ?>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Reiniciar">
    </form>
</body>
</html>

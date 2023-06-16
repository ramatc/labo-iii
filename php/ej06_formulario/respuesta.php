<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta PHP</title>
</head>
<body>
    <?php
    echo "<h1>Valores pasados:</h1>";
    echo "<h2>Nombre: " . $_GET["nombre"] . "</h2>";
    echo "<h2>Apellido: " . $_GET["ape"] . "</h2>";
    echo "<button onclick=window.close()>Cerrar</button>";
    ?>
</body>
</html>
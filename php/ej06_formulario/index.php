<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Formulario</title>
</head>
<body>
    <?php
    echo "<form action='./respuesta.php' target='_blank' method='get'>";
    echo "<label>
                Nombre:
                <input type='text' name='nombre' required>
          </label><br/>";

    echo "<label>
          Apellido:
          <input type='text' name='ape' required>
    </label><br/>";

    echo "<button>Ingresé la información</button>";
    echo "</form>";
    ?>
</body>
</html>
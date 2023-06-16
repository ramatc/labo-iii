<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Include</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>En este ejemplo se utiliza la funcion include() que ubica código php definido en el archivo ejemplo2.inc:</h1>";
    echo "<h2>Antes de insertar el include las variables declaradas en el mismo no existen</h2>";
    echo "<h2>Las variables son:</h2>";
    echo $persona1;
    echo $persona1["nombre"];
    echo $persona2;
    echo $persona2["nombre"];
    echo "<h2>La longitud del arreglo es: 0</h2>";

    include("./ejemplo2.inc");
    echo "<h2>Aquí ya se ejecuto la funcion include(). Cuando se usa include ocurre que si el archivo 'inc' no existe, se visualiza un warning y el script sigue ejecutandose hasta el final</h2>";
    echo "<h2>Las 2 variables de tipo array asociativo en el inc son: </h2>";

    echo "<table><tr>";
    foreach ($persona1 as $persona) {
        echo "<td>" . $persona . "</td>";
    }
    echo "</tr><tr>";
    foreach ($persona2 as $persona) {
        echo "<td>" . $persona . "</td>";
    }
    echo "</tr></table>";
    echo "<h2>La longitud de los arreglos es: " . count($persona1) . "</h2>";
    ?>
</body>
</html>
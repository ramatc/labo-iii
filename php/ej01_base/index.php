<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Base</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 10px;
        }

        .fondo {
            background-color: crimson;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php
    </h1>
    <hr />
    <?php
    $miVariable = "valor1";
    $varBool = true;
    define("MICONSTANTE", "valorConstante");
    $aLenguajes = ["HTML", "PHP"];

    echo "<h1>Todo texto y/o html <span style='color: crimson'>entregado por el procesador php</span> usando la sentencia echo.</h1><hr/>";

    echo "<h2>Sin usar concatenador <span style='color: crimson'>\$miVariable</span>: $miVariable</h2>";
    echo "<h2>Usando concatenador <span style='color: crimson'>\$miVariable</span>: " . $miVariable . "</h2><hr/>";

    echo "<h2>Variable tipo booleana o lógica (verdadero) <span style='color: crimson'>\$varBool</span>: $varBool</h2>";
    $varBool = false;
    echo "<h2>Variable tipo booleana o lógica (falso) <span style='color: crimson'>\$varBool</span>: " . $varBool . "</h2><hr/>";

    echo "<h2><span style='color: crimson'>MICONSTANTE</span>: " . MICONSTANTE . "</h2>";
    echo "<h2>Tipo de <span style='color: crimson'>MICONSTANTE</span>: " . gettype(MICONSTANTE) . "</h2><hr>";

    echo "<h1>Arreglos:</h1>";
    echo "<h2><span style='color: crimson'>\$aLenguajes[0]</span>: " . $aLenguajes[0] . "</h2>";
    echo "<h2><span style='color: crimson'>\$aLenguajes[1]</span>: " . $aLenguajes[1] . "</h2>";
    echo "<h2>Tipo de <span style='color: crimson'>\$aLenguajes</span>: " . gettype($aLenguajes) . "</h2>";
    echo "<h2>Se agregan por programa dos elementos nuevos</h2>";
    array_push($aLenguajes, "JavaScript");
    array_push($aLenguajes, "C#");
    echo "<h2>Todos los elementos originales y agregados:</h2>";
    echo "<ul>";
    foreach ($aLenguajes as $lenguaje) {
        echo "<li>" . $lenguaje . "</li>";
    }
    echo "</ul>";
    echo "<h1>Arreglo de dos dimensiones (diccionario)</h1>";
    $aDiccionario = [["hola", "hello", "ciao", "bongiour"], ["adios", "goodbye", "arrivederci", "au revoir"], ["perro", "dog", "cane", "chien"]];

    echo "<table>
            <tr>
                <td>Español</td>
                <td>Ingles</td>
                <td>Italiano</td>
                <td>Francés</td>
            </tr>";

    foreach ($aDiccionario as $palabras) {
        echo "<tr class='fondo'>";
        foreach ($palabras as $palabra) {
            echo "<td>" . $palabra . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>También se puede expresar asi el valor de \$aDiccionario[1][3]: " . $aDiccionario[1][3] . "</h2>";
    echo "<h2>Cantidad de elementos de diccionario: " . count($aDiccionario) . "</h2>";

    echo "<h1>Variables tipo arreglo asociativo</h1>";
    $articulo = ["codigo" => "c0001", "descripcion" => "Descripción del artículo", "precio" => 20, "cantidad" => 2];
    echo "<p>Código de artículo: " . $articulo["codigo"] . "</p>";
    echo "<p>Descripción del artículo: " . $articulo["descripcion"] . "</p>";
    echo "<p>Precio unitario: " . $articulo["precio"] . "</p>";
    echo "<p>Cantitdad: " . $articulo["cantidad"] . "</p><br/>";
    echo "<p>Cantidad de elementos:" . count($articulo) . "</p>";
    echo "<p>Tipo de dato:" . gettype($articulo) . "</p><hr/>";

    $x = 3;
    $y = 4;
    echo "<h2>Expresiones aritméticas:</h2>";
    echo "<h2>La variable \$x tiene el siguiente valor: " . $x . "</h2>";
    echo "<h2>La variable \$y tiene el siguiente valor: " . $y . "</h2>";
    echo "<h2>La variable \$x tiene el siguiente tipo: " . gettype($x) . "</h2>";
    echo "<h2>La variable \$y tiene el siguiente tipo: " . gettype($y) . "</h2>";
    echo "<h2>Asi se imprime una expresión aritmética por ejemplo de suma: \$x + \$y = " . $x + $y . "</h2>";
    echo "<h2>Asi se imprime una expresión aritmética por ejemplo de multiplicación: \$x * \$y = " . $x * $y . "</h2>";
    echo "<h2>Asi se imprime una expresión aritmética por ejemplo de división: \$x / \$y = " . $x / $y . "</h2>";
    ?>
</body>

</html>
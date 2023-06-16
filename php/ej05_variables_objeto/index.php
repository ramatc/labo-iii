<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Variables objeto</title>
    <style>
        p {
            padding: 0;
            margin: 0;
        }

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
    <?php
    $objRenglonPedido = new stdClass;
    $objRenglonPedido->codArt = "cp001";
    $objRenglonPedido->descripcion = "Descripción del artículo";
    $objRenglonPedido->precioUnitario = 2000;
    $objRenglonPedido->cantidad = 2;

    echo "<h1>Variables tipo objeto en PHP. Objeto renglon de pedido</h1>";
    echo "<h1 style='color: crimson'>\$objRenglonPedido</h1>";
    echo "<p>Código de artículo: $objRenglonPedido->codArt</p>";
    echo "<p>Descripción de artículo: $objRenglonPedido->descripcion</p>";
    echo "<p>Precio unitario: $objRenglonPedido->precioUnitario</p>";
    echo "<p>Cantidad: $objRenglonPedido->cantidad</p>";

    echo "<h1>Tipo de <span style='color: crimson'>\$objRenglonPedido</span>: " . gettype($objRenglonPedido) . "</h1>";
    echo "<h1>Definamos arreglo de pedidos:</h1>";
    $renglonesPedido = [$objRenglonPedido];
    array_push($renglonesPedido, $objRenglonPedido);
    echo "<h1 style='color: crimson'>\$renglonesPedido</h1>";
    echo "<h1>Tabla <span style='color: crimson'>\$renglonesPedido</span>. Recorrer el arreglo de renglones y tabularlos con html:</h1>";
    foreach ($renglonesPedido as $objRenglonPedido) {
        foreach ($objRenglonPedido as $renglonPedido) {
            echo "<span> $renglonPedido </span>";
        }
        echo "<br/>";
    }
    echo "<h2>Cantidad de renglones: " . count($renglonesPedido) . "</h2>";

    $objRenglonesPedido = new stdClass();
    $objRenglonesPedido->renglonesPedido = $renglonesPedido;
    $objRenglonesPedido->cantidadDeRenglones = count($renglonesPedido);
    echo "<h1>Produccion de un objeto <span style='color: crimson'>\$objRenglonesPedido</span> con dos atributos array renglonesPedido y cantidadDeRenglones</h1>";
    echo "<h2>Cantidad de renglones: " . $objRenglonesPedido->cantidadDeRenglones . "</h2>";

    echo "<h1>Producción de un JSON jsonRenglones:</h1>";
    $jsonRenglonesPedido = json_encode($objRenglonesPedido);
    echo $jsonRenglonesPedido;
    ?>
</body>

</html>
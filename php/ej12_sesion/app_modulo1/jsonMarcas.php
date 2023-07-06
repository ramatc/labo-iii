<?php
include('./manejoSesion.inc');

$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM marca";
    $stmt = $dbh->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $marcas = [];

    while ($fila = $stmt->fetch()) {
        $objMarca = new stdClass;
        $objMarca->id = $fila["id"];
        $objMarca->nombre = $fila["nombre"];
        $objMarca->cod = $fila["cod"];

        array_push($marcas, $objMarca);
    }

    $objMarcas = new stdClass;
    $objMarcas->marcas = $marcas;

    $jsonMarcas = json_encode($objMarcas);
    $dbh = null;
    echo $jsonMarcas;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php
include('./manejoSesion.inc');

if (!isset($_GET['orden'])) {
    header('location: ./index.php');
    exit();
}

$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    $orden = $_GET["orden"];
    $codArt = $_GET["codArt"];
    $marca = $_GET["marca"];
    $desc = $_GET["desc"];
    $color = $_GET["color"];
    $fecha = $_GET["fecha"];
    $precio = $_GET["precio"];

    $sql = "SELECT * FROM zapatillas WHERE codArt LIKE CONCAT('%',:filtroCodArt,'%') AND marca LIKE CONCAT('%',:filtroMarca ,'%') AND descripcion LIKE CONCAT('%',:filtroDesc ,'%') AND color LIKE CONCAT('%',:filtroColor ,'%') AND fecha LIKE CONCAT('%',:filtroFecha ,'%') AND precio LIKE CONCAT('%',:filtroPrecio ,'%') ORDER BY $orden";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':filtroCodArt', $codArt);
    $stmt->bindParam(':filtroMarca', $marca);
    $stmt->bindParam(':filtroDesc', $desc);
    $stmt->bindParam(':filtroColor', $color);
    $stmt->bindParam(':filtroFecha', $fecha);
    $stmt->bindParam(':filtroPrecio', $precio);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $zapatillas = [];

    while ($fila = $stmt->fetch()) {
        $objZapatilla = new stdClass;
        $objZapatilla->codArt = $fila["codArt"];
        $objZapatilla->marca = $fila["marca"];
        $objZapatilla->descripcion = $fila["descripcion"];
        $objZapatilla->color = $fila["color"];
        $objZapatilla->fecha = $fila["fecha"];
        $objZapatilla->precio = $fila["precio"];

        array_push($zapatillas, $objZapatilla);
    }

    $objZapatillas = new stdClass;
    $objZapatillas->zapatillas = $zapatillas;
    $objZapatillas->cantidad = count($zapatillas);

    $jsonZapatillas = json_encode($objZapatillas);
    $dbh = null;
    echo $jsonZapatillas;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
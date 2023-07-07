<?php
include('./manejoSesion.inc');

if (!isset($_GET['codArt'])) {
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

    $codArt = $_GET["codArt"];

    $sql = "SELECT * FROM zapatillas WHERE codArt  = :filtroCodArt";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':filtroCodArt', $codArt);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $fila = $stmt->fetch();

    $objZapatilla = new stdClass;
    $objZapatilla->codArt = $fila["codArt"];
    $objZapatilla->marca = $fila["marca"];
    $objZapatilla->descripcion = $fila["descripcion"];
    $objZapatilla->color = $fila["color"];
    $objZapatilla->fecha = $fila["fecha"];
    $objZapatilla->precio = $fila["precio"];

    $jsonZapatilla = json_encode($objZapatilla);
    $dbh = null;
    echo $jsonZapatilla;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
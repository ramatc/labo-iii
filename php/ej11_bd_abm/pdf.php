<?php

$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    $codArt = $_GET["codArt"];

    $sql = "SELECT archivo FROM zapatillas WHERE codArt = :codArt";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':codArt', $codArt);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $fila = $stmt->fetch();
    $objZapatilla = new stdClass;
    $objZapatilla->documentoPDF = base64_encode($fila["archivo"]);
    $salidaJSON = json_encode($objZapatilla, JSON_INVALID_UTF8_SUBSTITUTE);

    echo $salidaJSON;
    $dbh = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<?php

$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";
$respuesta_estado = "";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $respuesta_estado = $respuesta_estado . "\nConexión exitosa.";

    $codArt = $_POST["codArt"];

    $sql = "DELETE FROM zapatillas WHERE codArt = :codArt";

    $stmt = $dbh->prepare($sql);
    $respuesta_estado = $respuesta_estado . "\nPreparación exitosa.";

    $stmt->bindParam(":codArt", $codArt);
    $respuesta_estado = $respuesta_estado . "\nBind exitoso.";

    $stmt->execute();
    $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";

    echo $respuesta_estado;
} catch (PDOException $e) {
    $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
    echo $respuesta_estado;
}

?>
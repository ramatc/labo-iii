<?php
$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM usuarios";
    $stmt = $dbh->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $usuarios = [];

    while ($fila = $stmt->fetch()) {
        $objUsuario = new stdClass;
        $objUsuario->login = $fila["login"];
        $objUsuario->clave = $fila["clave"];
        $objUsuario->contador = $fila["contador"];

        array_push($usuarios, $objUsuario);
    }

    $dbh = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
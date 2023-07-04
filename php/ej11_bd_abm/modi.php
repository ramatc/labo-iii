<?php

$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";
$respuesta_estado = "Modificación simple de datos\n";

try {

    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $respuesta_estado = $respuesta_estado . "\nConexión exitosa.";

    $codArt = $_POST["codArtModi"];
    $marca = $_POST["marcaModi"];
    $desc = $_POST["descripcionModi"];
    $color = $_POST["colorModi"];
    $fecha = $_POST["fechaModi"];
    $precio = $_POST["precioModi"];

    $sql = "UPDATE zapatillas SET codArt = :codArt, marca = :marca, descripcion = :descripcion, color = :color, fecha = :fecha, precio = :precio WHERE codArt = :codArt";
    $stmt = $dbh->prepare($sql);
    $respuesta_estado = $respuesta_estado . "\nPreparación exitosa.";

    $stmt->bindParam(":codArt", $codArt);
    $stmt->bindParam(":marca", $marca);
    $stmt->bindParam(":descripcion", $desc);
    $stmt->bindParam(":color", $color);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":precio", $precio);

    $respuesta_estado = $respuesta_estado . "\nBind exitoso.";

    $stmt->execute();

    if (!isset($_FILES["pdfModi"])) {
        $respuesta_estado = $respuesta_estado . "\nNo se inicializó la variable FILES";
    } else {
        if (empty($_FILES["pdfModi"]["name"])) {
            $respuesta_estado = $respuesta_estado . "\nNo ha sido seleccionado ningun archivo para enviar.";
        } else {
            $respuesta_estado = $respuesta_estado . "\nBuscando documento asociado al codigo de artículo $codArt";
            $contenidoPDF = file_get_contents($_FILES["pdfModi"]["tmp_name"]);

            $sql = "UPDATE zapatillas SET archivo = :contenidoPdf WHERE codArt = :codArt";
            $stmt = $dbh->prepare($sql);

            $stmt->bindParam(":contenidoPdf", $contenidoPDF);
            $stmt->bindParam(":codArt", $codArt);

            $stmt->execute();
        }
    }
    $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";
    $dbh = null;
    echo $respuesta_estado;
} catch (PDOException $e) {
    $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
    echo $respuesta_estado;
}

?>
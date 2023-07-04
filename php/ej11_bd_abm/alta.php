<?php

$dbname = "boter0xpekexi1ebyzxp";
$host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
$user = "uf7hf1x9lseshxyt";
$password = "lG2kzZOSuVCwrD0sIntd";
$respuesta_estado = "";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    $codArt = $_POST["codArtAlta"];
    $marca = $_POST["marcaAlta"];
    $desc = $_POST["descripcionAlta"];
    $color = $_POST["colorAlta"];
    $fecha = $_POST["fechaAlta"];
    $precio = $_POST["precioAlta"];
    $respuesta_estado = $respuesta_estado . "Entradas recibidas en el req http: \$codArt: $codArt, \$marca: $marca, \$desc: $desc, \$color: $color, \$fecha: $fecha, \$precio: $precio\n\nConexión exitosa.";

    $sql = "INSERT INTO zapatillas (codArt, marca, descripcion, color, fecha, precio) VALUES (:codArt, :marca, :descripcion, :color, :fecha, :precio)";
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

    if (!isset($_FILES["pdfAlta"])) {
        $respuesta_estado = $respuesta_estado . "\nNo se inicializó la variable FILES";
    } else {
        if (empty($_FILES["pdfAlta"]["name"])) {
            $respuesta_estado = $respuesta_estado . "\nNo ha sido seleccionado ningun archivo para enviar.";
        } else {
            $respuesta_estado = $respuesta_estado . "\nBuscando documento asociado al codigo de artículo $codArt";
            $contenidoPDF = file_get_contents($_FILES["pdfAlta"]["tmp_name"]);

            $sql = "UPDATE zapatillas SET archivo = :contenidoPdf WHERE codArt = :codArt";
            $stmt = $dbh->prepare($sql);

            $stmt->bindParam(":contenidoPdf", $contenidoPDF);
            $stmt->bindParam(":codArt", $codArt);

            $stmt->execute();
            $respuesta_estado = $respuesta_estado . "\nPDF cargado";
        }
    }

    $dbh = null;
    $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";
    echo $respuesta_estado;
} catch (PDOException $e) {
    $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
    echo $respuesta_estado;
}
?>
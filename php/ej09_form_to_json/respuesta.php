<?php
sleep(3);

$objProveedor = new stdClass;
$objProveedor->idUsuario = $_POST["idUsuario"];
$objProveedor->login = $_POST["login"];
$objProveedor->apellido = $_POST["ape"];
$objProveedor->nombre = $_POST["nombre"];
$objProveedor->nacimiento = $_POST["nacim"];

$jsonData = json_encode($objProveedor);

echo "<p>$jsonData</p>";
?>
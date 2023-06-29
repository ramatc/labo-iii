<?php
sleep(3);
if (isset($_POST["clave"])) {
    $claveEncriptadamd5 = md5($_POST["clave"]);
    $claveEncriptadaSha = sha1($_POST["clave"]);
    $clave = $_POST["clave"];
    echo "<h2>Clave sin encriptar: <span style='color:crimson'>$clave</span></h2>";
    echo "<h2>Clave encriptada en md5 (128 bits o 16 pares hexadecimales): <span style='color:crimson'>$claveEncriptadamd5</span></h2>";
    echo "<h2>Clave encriptada en sha1 (160 bits o 20 pares hexadecimales): <span style='color:crimson'>$claveEncriptadaSha</span></h2>";
}
?>
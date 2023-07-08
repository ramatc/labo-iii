<?php

include('./conexionBd.inc');
session_start();

$login = $_POST["login"];
$clave = md5($_POST["clave"]);
$loginBd = "";
$claveBd = "";
$contadorBd = 0;

foreach ($usuarios as $usuario) {
    if ($usuario->login == $login) {
        if ($usuario->clave == $clave) {
            $loginBd = $usuario->login;
            $claveBd = $usuario->clave;
            $contadorBd = $usuario->contador;
        }
    }
}

if (!$login || !$clave || ($login != $loginBd || $clave != $claveBd)) {
    session_destroy();
    header('location: ./formLogin.html');
    exit();
} else {
    if (!isset($_SESSION['idSesion'])) {
        $contadorBd = $contadorBd + 1;

        $dbname = "boter0xpekexi1ebyzxp";
        $host = "boter0xpekexi1ebyzxp-mysql.services.clever-cloud.com";
        $user = "uf7hf1x9lseshxyt";
        $password = "lG2kzZOSuVCwrD0sIntd";

        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);

            $sql = "UPDATE usuarios SET contador = :contadorBd WHERE clave = :claveBd";
            $stmt = $dbh->prepare($sql);

            $stmt->bindParam(":claveBd", $claveBd);
            $stmt->bindParam(":contadorBd", $contadorBd);

            $stmt->execute();

            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $_SESSION['idSesion'] = session_create_id();
        $_SESSION['login'] = $login;
        $_SESSION['contador'] = $contadorBd;
    }
}

echo "<h1>Accesso permitido</h1>";
echo "<h2>Sus parametros de sesión son los siguientes: </h2>";
echo "<div style='border: 1px solid black'>
    <h2>Información de sesión</h2>
    <h3>ID de sesión: <span style='color: blue'>" . $_SESSION['idSesion'] . "</span></h3>
    <h3>Login de usuario: <span style='color: blue'>" . $_SESSION['login'] . "</span></h3>
    <h3>Contador de sesión: <span style='color: blue'>" . $contadorBd . "</span></h3>
    </div>";

echo "<button onClick=\"location.href='./app/'\">Ingresar a la aplicación</button>";
echo "<button onClick=\"location.href='./destruirSesion.php'\">Terminar sesión</button>";

?>
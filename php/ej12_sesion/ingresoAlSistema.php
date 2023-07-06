<?php

include('./conexionBd.inc');

$login = $_POST["login"];
$clave = md5($_POST["clave"]);
$loginBd = "";
$claveBd = "";
$contadorBd = 0;

foreach ($usuarios as $usuario) {
    $flag = 0;

    if ($usuario->login == $login) {
        $flag = 1;
        if ($usuario->clave == $clave) {
            $loginBd = $usuario->login;
            $claveBd = $usuario->clave;
            $contadorBd = $usuario->contador;
        }
    }
}

if (!isset($_SESSION['idSesion'])) {
    if (!$login || !$clave || ($login != $loginBd || $clave != $claveBd)) {
        header('location: ./formLogin.html');
        exit();
    }

    session_start();

    $_SESSION['idSesion'] = session_create_id();
    $_SESSION['login'] = $login;
    $_SESSION['contador'] = $contadorBd;
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
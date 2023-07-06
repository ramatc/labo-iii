<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso al sistema</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            font-family: sans-serif;
            color: white;
        }

        body {
            background: linear-gradient(#243b55, #141e30);
        }

        h1, h2, h3 {
            margin: 15px;
        }
        
        div {
            padding: 10px;
            margin: 15px;
            width: 40%;
            border: 2px solid black;
            border-radius: 5px;
        }

        button {
            background-color: #fafafa;
            color: #252525;
            cursor: pointer;
            font-size: 18px;
            padding: 7px;
            border: none;
            border-radius: 4px;
            transition: all 0.6s ease;
            margin: 15px;
        }

        button:hover {
            background-color: blue;
            color: white;
        }
    </style>
</head>

<body>
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
echo "<div>
    <h2>Información de sesión</h2>
    <h3>ID de sesión: <span style='color: #04ffea'>" . $_SESSION['idSesion'] . "</span></h3>
    <h3>Login de usuario: <span style='color: #04ffea'>" . $_SESSION['login'] . "</span></h3>
    <h3>Contador de sesión: <span style='color: #04ffea'>" . $contadorBd . "</span></h3>
    </div>";

echo "<button onClick=\"location.href='./app_modulo1'\">Ingresar a la aplicación</button>";
echo "<button onClick=\"location.href='./destruirSesion.php'\">Terminar sesión</button>";

?>
</body>

</html>
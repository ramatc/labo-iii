<?php

session_start();
if (!isset($_SESSION['idSesion'])) {
    header('location: ./formLogin.html');
    exit();
}

?>

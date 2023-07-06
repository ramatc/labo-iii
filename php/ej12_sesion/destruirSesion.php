<?php
include('./manejoSesion.inc');
session_destroy();
header('location: ./formLogin.html');
exit();
?>
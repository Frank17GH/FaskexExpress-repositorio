<?php

$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$database_localhost) or die("No se encuentra la base de datos");

    mysqli_set_charset($conexion,"utf8");


?>

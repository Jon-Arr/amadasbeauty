<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "amadasbeauty";
$conexion = mysqli_connect($host,$user,$pass,$db);

if($conexion == false){
    echo "Error de conexion";
}


?>
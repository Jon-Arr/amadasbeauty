<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/index.css" rel="stylesheet">    
    <title></title>
</head>
<body>


<?php
require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];


$q = " SELECT COUNT(*) as contar from users where email = '$usuario' and pass = '$clave' ";
$q2 = " SELECT nombre,apellido,email,rol,pass from users where email = '$usuario'";
$consulta = mysqli_query($conexion,$q);
$consulta2 = mysqli_query($conexion,$q2);
$array = mysqli_fetch_array($consulta);
$arrayb = mysqli_fetch_assoc($consulta2);

if($array['contar']>0){
    $_SESSION['loggedin'] = true;
    $_SESSION['nombre'] = $arrayb['nombre'];
    $_SESSION['apellido'] = $arrayb['apellido'];
    $_SESSION['email'] = $arrayb['email'];
    $_SESSION['pass'] = $arrayb['pass'];
    header("location: ./abierta.php");
}else{
    echo "<center>";
    echo "Datos incorrectos<br>";
    echo "<a href='./index.php'><button >Volver</button></a>";
    echo "</center>";
}

?>

</body>
</html>
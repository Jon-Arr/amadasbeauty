<?php
require 'conexion.php';
session_start();

$fechaInsumo = $_POST['fechaInsumo'];
$producto = $_POST['producto'];
$coste = $_POST['coste'];
$cantidad = $_POST['cantidad'];
$marca = $_POST['marca'];

$q2 = "INSERT INTO `insumos`(`fecha`, `producto`, `coste`, `cantidad`, `marca`, `usuario`) VALUES ('$fechaInsumo','$producto','$coste','$cantidad','$marca', 'Sofia Ahumada')";

if ($conexion->query($q2) === TRUE) {
    echo "<center>Insumo ingresado exitosamente<br>";
    echo "<a href='./nuevo_insumo.php'><button >Volver</button></a></center>";
} else {
    echo "<center>";
    echo "Datos incorrectos<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href='./nuevo_servicio.php'><button >Volver</button></a>";
    echo "</center>";
}


$conexion->close();

?>
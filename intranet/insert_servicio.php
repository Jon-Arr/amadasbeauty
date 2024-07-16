<?php
require 'conexion.php';
session_start();

/****************************NUEVO SERVICIO */
$servicio = $_POST['servicio'];
$valor = $_POST['valor'];
$cliente = $_POST['cliente'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$email = $_POST['email'];
$mediopago = $_POST['mediopago'];


$q = "INSERT INTO `servicios`(`servicio`, `valor`, `cliente`, `fecha`, `hora`, `usuario`, `emailuser`, `realizado`, `tipopago`) VALUES ('$servicio','$valor','$cliente','$fecha','$hora','Sofia Ahumada','$email','SI','$mediopago')";

if ($conexion->query($q) === TRUE) {
    echo "<center>Cliente ingresado exitosamente<br>";
    echo "<a href='./nuevo_servicio.php'><button >Volver</button></a></center>";
} else {
    echo "<center>";
    echo "Datos incorrectos<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href='./nuevo_servicio.php'><button >Volver</button></a>";
    echo "</center>";
}


$conexion->close();

?>
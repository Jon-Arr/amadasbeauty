<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style-sesion.css">
    <title>Office - Amadas Beauty</title>
</head>

<body>

<header>
    <a href="../index.html">
        <img class="logo-office" src="../media/logo.jpg" alt="logo amadas beauty">
    </a>
    <?php
        session_start();
        $arrayon = isset($_SESSION['loggedin']) ? $_SESSION['loggedin']:null;
        $arrayno = isset($_SESSION['nombre']) ? $_SESSION['nombre']:null;

        require 'conexion.php';
        if(!isset($arrayno)){
            echo "<h4>Hola Invitado</h4>";
        }else{
            echo "<h4>Hola $arrayno</h4>";
            echo "<a href='../sesion/salir.php'>Cerrar Sesion</a>";
    ?>
    <hr>
</header>
    
<main>
    
    <section class="acciones">
        <a href="./abierta.php">
            <p class="btn-acciones">Volver</p>
        </a>     
    </section>

    <section class="formulario">
    <h4>Filtrar datos:</h4>
    <form action="./insert_filtroInsumo.php" method="POST">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date"id="fecha_inicio" name="fecha_inicio" required>
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date"id="fecha_fin" name="fecha_fin" required>
            <label for="filtro_texto">Filtro por texto</label>
            <input type="text" id="filtro_texto" name="filtro_texto" placeholder="Ingrese su busqueda aqui">
            <br><br>
            <input type="submit" value="Filtrar">

        </form>

    </section>

<?php

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$filtro_texto = $_POST['filtro_texto'];

$filtrar = "SELECT fecha, producto, coste, cantidad, marca FROM insumos WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$totalFiltrar = "SELECT SUM(coste) AS 'totalFiltro' FROM insumos WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";

if (!empty($filtro_texto)) {
    $filtrar .= " AND (producto LIKE '%$filtro_texto%' OR coste LIKE '%$filtro_texto%' OR marca LIKE '%$filtro_texto%')";
}

$filtrar .= " ORDER BY fecha DESC";

$result = $conexion->query($filtrar);
$result2 = $conexion->query($totalFiltrar);

if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Fecha</th><th>Producto</th><th>Coste</th><th>Cantidad</th><th>Marca</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fecha"]."</td><td>".$row["producto"]."</td><td>".$row["coste"]."</td><td>".$row["cantidad"]."</td><td>".$row["marca"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

if ($result2->num_rows > 0) {
    echo "<h3>Totales</h4>";
    
    while($row = $result2->fetch_assoc()) {
        echo "<p>Total Coste (Insumos): " . $row["totalFiltro"] . "</p>";
    }
} else {
    echo "0 resultados";
}


$conexion->close();

}

?>
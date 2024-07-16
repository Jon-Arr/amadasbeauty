<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style-sesion.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            echo "<a href='./salir.php'>Cerrar Sesion</a>";
    ?>
    <hr>
</header>
    
<main>
    
    <section class="acciones">
        <a href="./nuevo_servicio.php">
            <p class="btn-acciones">Ingresar Servicio</p>
        </a>
        <a href="./nuevo_insumo.php">
            <p class="btn-acciones">Ingresar Insumo</p>
        </a>    
        <a href="./nuevo_filtro.php">
            <p class="btn-acciones">Filtrar Servicio</p>
        </a>
        <a href="./nuevo_filtroinsumo.php">
            <p class="btn-acciones">Filtrar Insumo</p>
        </a>
    </section>
    <div class="formulario">        
        <form action="./filtrado_total.php" method="POST">
            <h4>Filtrar por Fecha</h4>
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date"id="fecha_inicio" name="fecha_inicio" required>
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date"id="fecha_fin" name="fecha_fin" required>
            <br><br>
            <input type="submit" value="Filtrar">

        </form>
    </div>
    <hr>
    <h2>Últimas dos semanas</h2>

<?php


    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    $sqlServicio = "SELECT fecha, hora, cliente, servicio, valor, emailuser, realizado FROM servicios WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY fecha DESC";
    $sumaServicio = "SELECT SUM(valor) AS 'totalServicio' FROM servicios WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $sqlInsumo = "SELECT fecha, producto, coste, cantidad, marca FROM insumos WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY fecha DESC";
    $sumaInsumo = "SELECT SUM(coste) AS 'totalInsumo' FROM insumos WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";

    $resultServicio = $conexion->query($sqlServicio);
    $resultInsumo = $conexion->query($sqlInsumo);
    $resulsumaServicio = $conexion->query($sumaServicio);
    $resulsumaInsumo = $conexion->query($sumaInsumo);


    if ($resultServicio->num_rows > 0) {
        echo "<h3>Servicios</h3>";
        echo "<table border=1>";
        echo "<tr><th>Fecha</th><th>Cliente</th><th>Email</th><th>Servicio</th><th>Valor</th><th>Realizado</th></tr>";
            
    while($row = $resultServicio->fetch_assoc()) {
        echo "<tr><td>".$row["fecha"]."</td><td>".$row["cliente"]."</td><td>".$row["emailuser"]."</td><td>".$row["servicio"]."</td><td>".$row["valor"]."</td><td>".$row["realizado"]."</td></tr>";
    }
        echo "</table>";
    } else {
        echo "Aun no hay clientes";
    }

    if ($resultInsumo->num_rows > 0) {
        echo "<h3>Insumos</h3>";
        echo "<table border=1>";
        echo "<tr><th>Fecha</th><th>Producto</th><th>Coste</th><th>Cantidad</th><th>Marca</th></tr>";
            
    while($row = $resultInsumo->fetch_assoc()) {
        echo "<tr><td>".$row["fecha"]."</td><td>".$row["producto"]."</td><td>".$row["coste"]."</td><td>".$row["cantidad"]."</td><td>".$row["marca"]."</td></tr>";
    }
        echo "</table>";
    } else {
        echo "Aun no hay clientes";
    }

    $total_valor = 0;
    if ($resulsumaServicio->num_rows > 0) {
        $row1 = $resulsumaServicio->fetch_assoc();
        $total_valor = $row1['totalServicio'];
    }else{
        $total_valor = 0;
    }

    $total_coste = 0;
    if ($resulsumaInsumo->num_rows > 0) {
        $row2 = $resulsumaInsumo->fetch_assoc();
        $total_coste = $row2['totalInsumo'];
    }else{
        $total_coste = 0;
    }

    $difference = $total_valor - $total_coste;
    echo "<h3>Totales</h4>";
    echo "<p>Total Valor (Servicios): " . $total_valor . "</p>";
    echo "<p>Total Coste (Insumos): " . $total_coste . "</p>";
    echo "<p>Ganancia Real: " . $difference . "</p>";
        
    $conexion->close();
}
?>
</main>



    
</body>

</html>
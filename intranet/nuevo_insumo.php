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
    <h4>Ingreso de insumo:</h4>
    <form action="./insert_insumo.php" method="POST">
            <h4>Fecha:</h4>
            <input id="fechaInsumo" type="date" name="fechaInsumo" title="Ingrese una fecha" required>
            <h4>Producto:</h4>
            <input id="producto" type="text" name="producto" placeholder="Producto" pattern="[a-zA-Z ]+" title="Ingrese un dato correcto" required>
            <h4>Coste:</h4>
            <input id="coste" type="number" name="coste" placeholder="Coste" pattern="[0-9]+" title="Use solo numeros" required>
            <h4>Cantidad:</h4>
            <input id="cantidad" type="number" name="cantidad" placeholder="Cantidad" pattern="[0-9]" title="Use solo numeros" required>
            <h4>Marca:</h4>
            <input id="marca" type="text" name="marca" placeholder="Marca" pattern="[a-zA-Z0-9 ]+" title="Ingrese un dato correcto" required>
            <br><br>
            <button type="submit">Ingresar</button>
    </form>

    </section>
    

<?php

    $sql = "SELECT fecha, producto, coste, cantidad, marca FROM insumos ORDER BY fecha DESC LIMIT 30";
    $result = $conexion->query($sql);
    echo "<h4>Confirmar Servicio:</h4>";
    if ($result->num_rows > 0) {
        
        echo "<table border=1>";
        echo "<tr><th>Fecha</th><th>Producto</th><th>Coste</th><th>Cantidad</th><th>Marca</th></tr>";
            
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fecha"]."</td><td>".$row["producto"]."</td><td>".$row["coste"]."</td><td>".$row["cantidad"]."</td><td>".$row["marca"]."</td></tr>";
    }
        echo "</table>";
    } else {
        echo "Aun no hay clientes";
    }
        
    $conexion->close();
}
?>
</main>



    
</body>

</html>
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
    <h4>Filtrar por servicio:</h4>
    <form action="./insert_filtro.php" method="POST">
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

    $sql = "SELECT fecha, cliente, emailuser, servicio, valor, realizado FROM servicios ORDER BY fecha DESC LIMIT 30";
    $result = $conexion->query($sql);
    echo "<h4>Filtro :</h4>";
    if ($result->num_rows > 0) {
        
        echo "<table border=1>";
        echo "<tr><th>Fecha</th><th>Cliente</th><th>Email</th><th>Servicio</th><th>Valor</th><th>Realizado</th></tr>";
            
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fecha"]."</td><td>".$row["cliente"]."</td><td>".$row["emailuser"]."</td><td>".$row["servicio"]."</td><td>".$row["valor"]."</td><td>".$row["realizado"]."</td></tr>";
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
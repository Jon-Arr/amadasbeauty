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
    <h4>Ingreso Manual de Servicio:</h4>
    <form action="./insert_servicio.php" method="POST">
            <h4>Fecha:</h4>
            <input id="fecha" type="date" name="fecha" placeholder="fecha" title="Ingrese una fecha" required>
            <h4>Hora:</h4>
            <input id="hora" type="time" name="hora" placeholder="hora" title="Ingrese una hora" required>
            <h4>Cliente:</h4>
            <input id="cliente" type="text" name="cliente" placeholder="cliente" pattern="[a-zA-Z ]+" title="Ingrese un dato correcto" required>
            <h4>Servicio:</h4>
            <input id="servicio" type="text" name="servicio" placeholder="Servicio" pattern="[a-zA-Z ]+" title="Ingrese un dato correcto" required>
            <h4>Valor:</h4>
            <input id="valor" type="number" name="valor" placeholder="Valor" pattern="[0-9]" title="Use solo numeros" required>
            <h4>Medio de Pago:</h4>
            <label for="mediopago"></label>
            <select id="mediopago" name="mediopago" required>
                <option value="" disabled selected>--Elija una opcion--</option>
                <option value="efectivo">Efectivo</option>
                <option value="credito">Credito</option>
                <option value="debito">Debito</option>
                <option value="transferencia">Transferencia</option>
            </select>
            <h4>Email:</h4>
            <input id="email" type="email" name="email" placeholder="Correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Use un correo valido">
            <br><br>
            <button type="submit">Ingresar</button>
    </form>

    </section>
    

<?php

    $sql = "SELECT fecha, cliente, emailuser, servicio, valor, realizado FROM servicios ORDER BY fecha DESC LIMIT 30";
    $result = $conexion->query($sql);
    echo "<h4>Confirmar Servicio:</h4>";
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
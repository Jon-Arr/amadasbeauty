<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
</head>
<body>
    <h1>Confirmación de Pago</h1>
    <?php 
    if(isset($_GET['hora']) && isset($_GET['servicio']) && isset($_GET['especialista'])) {
        $hora = $_GET['hora'];
        $servicio = $_GET['servicio'];
        $especialista = $_GET['especialista'];
    ?>
        <p>¡Gracias por su pago!</p>
        <p>Detalle del pago:</p>
        <ul>
            <li><strong>Día y hora seleccionados:</strong> <?php echo $hora; ?></li>
            <li><strong>Servicio seleccionado:</strong> <?php echo $servicio; ?></li>
            <li><strong>Especialista seleccionado:</strong> <?php echo $especialista; ?></li>
        </ul>
    <?php 
    } else {
    ?>
        <p>No se han proporcionado detalles de pago.</p>
    <?php 
    }
    ?>
</body>
</html>
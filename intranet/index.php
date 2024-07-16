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
    <?php
        require './abierta.php';
    ?>    

    <div id="cuerpo-login">
        <form action="./loguear.php" method="POST">
            <h4>Usuario:</h4>
            <input id="usr" type="email" name="usuario" placeholder="Correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Use un correo valido" required>
            <br><br>
            <h4>Contraseña:</h4>
            <input id="pss" type="password" name="clave" placeholder="*****" pattern="[a-zA-Z0-9]{6,}" title="Use mayúsculas, minúsculas o numeros, al menos 6 y maximo 10 caracteres" required>
            <br><br>
            <button type="submit">Ingresar</button>
        </form>

    </div>
    
</body>

</html>
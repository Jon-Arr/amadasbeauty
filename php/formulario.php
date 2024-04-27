<?php
if(isset($_POST['submit'])){
    $to = "jackthekillerster@gmail.com"; // CAMBIAR CORREO A ORIGINAL
    $subject = "Formulario de consulta de ".$_POST['name']." ".$_POST['lastName'];
    $message = "
    <html>
    <head>
    <title>Nuevo mensaje de ".$_POST['name']." ".$_POST['lastName']."</title>
    </head>
    <body>
    <p>Has recibido un nuevo mensaje desde el formulario de contacto:</p>
    <table>
    <tr>
    <th>Nombre</th>
    <td>".$_POST['name']."</td>
    </tr>
    <tr>
    <th>Correo electrónico</th>
    <td>".$_POST['email']."</td>
    </tr>
    <tr>
    <th>Mensaje</th>
    <td>".$_POST['message']."</td>
    </tr>
    </table>
    </body>
    </html>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    $headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

    mail($to,$subject,$message,$headers);
    echo "¡El mensaje ha sido enviado!";
}
?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PhpMailer/src/Exception.php';
require '../PhpMailer/src/PHPMailer.php';
require '../PhpMailer/src/SMTP.php';

// if(isset($_POST['submit'])){
//     $to = "jackthekillerster@gmail.com"; // CAMBIAR CORREO A ORIGINAL
//     $subject = "Formulario de consulta de ".$_POST['name']." ".$_POST['lastName'];
//     $message = "
//     <html>
//     <head>
//     <title>Nuevo mensaje de ".$_POST['name']." ".$_POST['lastName']."</title>
//     </head>
//     <body>
//     <p>Has recibido un nuevo mensaje desde el formulario de contacto:</p>
//     <table>
//     <tr>
//     <th>Nombre</th>
//     <td>".$_POST['name']."</td>
//     </tr>
//     <tr>
//     <th>Correo electrónico</th>
//     <td>".$_POST['email']."</td>
//     </tr>
//     <tr>
//     <th>Mensaje</th>
//     <td>".$_POST['message']."</td>
//     </tr>
//     </table>
//     </body>
//     </html>
//     ";
    
//     $headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
//     $headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

//     mail($to,$subject,$message,$headers);
//     echo "¡El mensaje ha sido enviado!";
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jackthekillerster@gmail.com'; // Tu correo de Gmail
        $mail->Password = '9173'; // Tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom($email, $name . ' ' . $lastName);
        $mail->addAddress('jackthekillerster@gmail.com'); // Correo electrónico del destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Formulario de consulta de ".$_POST['name']." ".$_POST['lastName'];
        $mail->Body    = "<p><strong>Nombre:</strong> $name</p>
                          <p><strong>Apellido:</strong> $lastName</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Mensaje:</strong> $message</p>";

        $mail->send();
        echo 'El mensaje ha sido enviado correctamente';
    } catch (Exception $e) {
        echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Método de solicitud no válido';
}
?>
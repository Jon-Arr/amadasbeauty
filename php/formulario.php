<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jackthekillerster@gmail.com';
        $mail->Password = 'alejo1valentina.'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('jackthekillerster@gmail.com', 'JohnArr'); // Remitente del correo
        $mail->addAddress('jackthekillerster@gmail.com'); // Dirección de correo del destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nueva consulta Amadasbeauty';
        $mail->Body    = "Nombre: $name <br> Apellido: $lastName <br> Email: $email <br> Mensaje: $message";
        $mail->AltBody = "Nombre: $name\nApellido: $lastName\nEmail: $email\nMensaje: $message";

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no se pudo enviar. Error de PHPMailer: {$mail->ErrorInfo}";
    }
}
?>
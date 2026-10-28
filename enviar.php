<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Teléfono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);                    // Instancia y pasar `true` permite excepciones
try {
    // Configuración del servidor
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;              // Habilitar salida de depuración detallada
    $mail->isSMTP();                                            // Enviar utilizando SMTP
    $mail->Host       = 'smtp.live.com';               // Configurar el servidor SMTP para enviar
    $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
    $mail->Username   = 'adnane_bensliman@hotmail.com';                     // Usuario SMTP
    $mail->Password   = 'Dounia3adab';                               // Contraseña SMTP
    $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar cifrado TLS; `PHPMailer::ENCRYPTION_SMTPS` es recomendado
    $mail->Port       = 587;                                    // Puerto TCP para conectarse, use 465 para `PHPMailer::ENCRYPTION_SMTPS` 

    //Destinatarios
    $mail->setFrom('adnane_bensliman@hotmail.com', $nombre);
    $mail->addAddress('adnanebenslimanfellaini@gmail.com');     // Agregar destinatario
    
    // Contenido
    $mail->isHTML(true);                                  // Configurar el formato de correo electrónico como HTML
    $mail->Subject = 'Mensaje de un cliente';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';   
    $mail->send();
    echo '<script>
            alert("El mensaje se ha enviado correctamente");
            windows.history.go(-1);
            </script>';
    
} catch (Exception $e) {
    echo "Error al enviar el correo. Mailer Error: {$mail->ErrorInfo}";
}

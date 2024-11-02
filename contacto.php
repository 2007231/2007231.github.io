<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $reason = htmlspecialchars(trim($_POST['reason']));
    $client = htmlspecialchars(trim($_POST['client']));
    $contact_pref = isset($_POST['contact_pref']) ? implode(", ", $_POST['contact_pref']) : "Ninguna preferencia";
    $message = htmlspecialchars(trim($_POST['message']));

    // Configuración del correo
    $to = "kritzaaguirre8@gmail.com"; // Cambia esto a tu correo electrónico
    $subject = "Nuevo mensaje de contacto de $name";
    $body = "Nombre: $name\n";
    $body .= "Correo Electrónico: $email\n";
    $body .= "Razón del Contacto: $reason\n";
    $body .= "¿Es cliente actual?: $client\n";
    $body .= "Preferencias de Contacto: $contact_pref\n";
    $body .= "Mensaje:\n$message\n";

    // Cabeceras del correo
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "El mensaje se ha enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje. Inténtalo de nuevo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

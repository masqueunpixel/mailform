<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $captcha = htmlspecialchars($_POST['captcha']);

    if ($captcha == "32") {
        $to = "masqueunpixel@gmail.com";
        $headers = "From: noreply@yourdomain.com\r\n";
        $body = "Nombre: $name\nAsunto: $subject\n\nMensaje:\n$message";

        if (mail($to, $subject, $body, $headers)) {
            echo "<div class='message'>Gracias por escribirnos, le responderemos a la brevedad posible.</div>";
        } else {
            echo "<div class='message'>Hubo un problema al enviar el correo. Inténtelo nuevamente.</div>";
        }
    } else {
        echo "<div class='message'>Captcha incorrecto. Inténtelo nuevamente.</div>";
    }
} else {
    echo "<div class='message'>Acceso no autorizado.</div>";
}
?>

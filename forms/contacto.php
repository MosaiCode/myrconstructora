<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $consultaTipo = $_POST["consulta"];
    $mensaje = $_POST["message"];

    // Dirección de correo a la que se enviará el mensaje
    $destinatario = "f.pobletemu@gmail.com";

    // Asunto del correo
    $asunto = "Mensaje de contacto de $nombre";

    // Construye el cuerpo del mensaje
    $mensajeCompleto = "Nombre: $nombre\n";
    $mensajeCompleto .= "Correo Electrónico: $email\n";
    $mensajeCompleto .= "Teléfono: $telefono\n";
    $mensajeCompleto .= "Tipo de Consulta: $consultaTipo\n";
    $mensajeCompleto .= "Mensaje:\n$mensaje";

    // Cabeceras del correo electrónico
    $headers = "From: $nombre <$email>";

    // Envía el correo electrónico
    if (mail($destinatario, $asunto, $mensajeCompleto, $headers)) {
        // Envío exitoso, redirige de vuelta a la página de confirmación
        header("Location: ../index.html?enviado=exito");
    } else {
        // Error en el envío, redirige con un mensaje de error
        header("Location: ../index.html?enviado=error");
    }
} else {
    // Si se accede a este script directamente sin enviar el formulario, redirige a la página de inicio.
    header("Location: ../index.html");
}
?>
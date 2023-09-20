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
    mail($destinatario, $asunto, $mensajeCompleto, $headers);
    echo "¡El formulario se ha enviado con éxito!";

}
?>
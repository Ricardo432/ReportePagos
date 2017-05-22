<?php 
require('/PHPMail/class.phpmailer.php');
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:

$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "ricado43.256@gmail.com"; // Correo completo a utilizar
$mail->Password = "12qwASDF"; // Contraseña
$mail->Port = 587; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = "ricado43.256@gmail.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Nombre";

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress("ricar2_26@hotmail.com"); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Titulo"; // Este es el titulo del email.
$body = "Hola mundo. Esta es la primer línea<br />";
$body .= "Acá continuo el <strong>mensaje</strong>";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo 'El correo fue enviado correctamente';
}else{
echo 'Hubo un inconveniente. Contacta a un administrador';
}
 ?>
<?php
require 'PHPMail/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'xpcp16015.xpress.com.mx';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 26;
//Set the encryption system to use - ssl (deprecated) or tls
///$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
///$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "instalaciones@intekra.com.mx";
//Password to use for SMTP authentication
$mail->Password = "argento1001$";
//Set who the message is to be sent from
$mail->setFrom('instalaciones@intekra.com.mx');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('ventas@intekra.com.mx');
$mail->addAddress('mcontrol@intekra.com.mx');
$mail->addAddress('ingenieria@intekra.com.mx');
//Set the subject line
$mail->Subject = 'Nueva ODI';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->Body = '<p>Nombre: $nombre</p>
<p>Direccion: $direccion</p>
<p>Correo: $email</p>
<p>Telefono: $telefono</p>
<p>Paquete: $paq</p>
<p>Tipo de Instación: $tipoIns</p>
<p>Vendedor(a): $vendedor</p>
';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

  ?>
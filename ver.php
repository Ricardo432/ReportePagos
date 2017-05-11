<?php
$id = $_GET['id'];
$correo = $_GET['cor'];
include 'conexion.php';

$query = "UPDATE pagos set Revisado='1',FechaAceptado='20".date('y-m-d')."' where idPago='$id'";
mysql_query($query);
require 'PHPMail/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages

//Set the hostname of the mail server
$mail->Host = 'smtp.live.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "countryvillahermosa@hotmail.com";
//Password to use for SMTP authentication
$mail->Password = "argento1001$";
//Set who the message is to be sent from
$mail->setFrom('countryvillahermosa@hotmail.com', 'First Last');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($correo);
//Set the subject line
$mail->Subject = 'Comprobante de Pago Fraccionaminto El Country';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$body = "Pulse <a href='http://countryvillahermosa.org/pdf.php?id=$id'>aqui</a> para descargar su Comprobante de Pago<br><br>Este correo es exclusivo para el envio de comprobantes para cualquier aclaraci&#243;n o duda comuniquese con el administrador del Fraccionamiento o a asociacioncolonos@hotmail.com ";
$mail->Body = $body;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
echo "<script language='javascript'>window.location='admin.php?m=1'</script>";
?>
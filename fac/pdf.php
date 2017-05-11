<?php ob_start(); 
include 'conexion.php';
$id= $_GET['id'];
$query = "SELECT * FROM pagos where idPago='".$id."'";
$result = mysql_query($query);
while ($lin=mysql_fetch_array($result,MYSQL_ASSOC)) {
    $query2 = "SELECT * FROM residente where idResidente='".$lin['idResidente']."'";
    $result2 = mysql_query($query2);
    while ($line=mysql_fetch_array($result2,MYSQL_ASSOC)) {
        
    

?>
<h2>Recibo de pago Country</h2>
<body >
<div  style="width:200px; height:350px;">
<table  cellpadding="5px" cellspacing="5px" >
    <tr >
    <td colspan="2" style="text-align: center;"> Fraccionamiento el Country</td>
    </tr>
    <tr >
        <td style="text-align: center;" colspan="2">Facturado a</td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="2"><?php echo $line['Nombre']; ?> </td>
    </tr>
    <tr>
        <td># de factura</td>
        <td>Fecha</td>
    </tr>
    <tr>
        <td><?php echo $lin['idPago']; ?> </td>
        <td><?php echo $lin['FechaRegistro']; ?> </td>
    </tr>
    <tr>
        <td></td>
        <td>Total: $<?php  echo $lin['Cantidad']; ?></td>
    </tr>
</table>
</div>
</body>
<?php
    }
}
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo".time().'.pdf';
file_put_contents($filename, $pdf);

$MESSAGE_BODY  = "Recibo de pago<br />";

$email        = "ricar2_26@hotmail.com";
 
$asunto     = "Asunto del correo";
$mensaje    = utf8_decode($MESSAGE_BODY);
$nombref    = $filename;
 
$cabeceras     = "From:ricar2_26@hotmail.com\n";
$cabeceras .= "Reply-To: ricar2_26@hotmail.com\n";
$cabeceras .= "MIME-version: 1.0n";
$cabeceras .= "Content-type: multipart/mixed; ";
$cabeceras .= "boundary=Message-Boundary"."\n";
$cabeceras .= "Content-transfer-encoding: 7BIT"."\n";
$cabeceras .= "X-attachments: ".$nombref;
 
$body_top  = "--Message-Boundary"."\n";
$body_top .= "Content-type: text/html; charset=US-ASCII"."\n";
$body_top .= "Content-transfer-encoding: 7BIT"."\n";
$body_top .= "Content-description: Mail message body"."\n";
$cuerpo = $body_top.$mensaje;

 $cuerpo .= "\n\n"."--Message-Boundary"."\n";
   $cuerpo .= "Content-type: Binary; name=".$nombref."\n";
   $cuerpo .= "Content-Transfer-Encoding: BASE64"."\n";
   $cuerpo .= "Content-disposition: attachment; filename=".$nombref."\n";
   $cuerpo .= $sAdjuntos."\n";
   $cuerpo .= "--Message-Boundary--";

mail($email, $asunto, $cuerpo, $cabeceras);

?>
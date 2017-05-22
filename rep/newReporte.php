<?php ob_start();
?>


<table  cellpadding="5px" cellspacing="5px" border="1" >

	<tr>
    <td>Cliente</td>
    <td>Direccion</td>
    <td>Pago</td>
    <td>Fecha de Reporte</td>
    <td>Fecha de Verificacion</td>
    </tr>

<?php

include 'conexion.php';
$total =0; 
$query = "SELECT * FROM pagos where Corte='0' and (Revisado='1' and Rechazado='0')";
$result = mysql_query($query);
while ($lin=mysql_fetch_array($result,MYSQL_ASSOC)) {
    $total+=$lin['Cantidad'];
    
        $query2 = "SELECT * FROM residente where idResidente='".$lin['idResidente']."'";
    $result2 = mysql_query($query2);
    while ($line=mysql_fetch_array($result2,MYSQL_ASSOC)) {
    

?>
    <tr>
        <td><?php echo $line['Nombre']; ?></td>
        <td><?php echo $line['Direccion']; ?></td>
        <td>$<?php echo $lin['Cantidad']; ?>.00</td>
        <td><?php echo $lin['FechaRegistro']; ?></td>
        <td><?php echo $lin['FechaAceptado']; ?></td>
    </tr>

<?php }
} ?>
<tr>
 	<td></td>
    <td >Total: </td>
    <td>$<?php echo $total; ?>.00</td>
</tr>

</table>
<?php
require('fpdf/html_table.php');

$es ="Reporte de ingresos a la Fecha de: ".date('y-m-d')." 
<br>
Por un monto de: $".$total.".00 ";
$filename= "Reporte".time().".pdf";
$query2 = "INSERT into corte(Fecha,Url,Total) values('".date('y-m-d')."','$filename','$total')";
mysql_query($query2);
while ($lin=mysql_fetch_array($result,MYSQL_ASSOC)) {
	$query2="UPDATE pagos set Corte=(SELECT max(idCorte) FROM corte) where idPago ='$lin['idPago']'";
	mysql_query($query2);
}

$pdf=new PDF_HTML_Table();

$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->WriteHTML("                                         Asociacion de Colonos el Country Villahermosa<br>
");
$pdf->SetFont('Arial','',11);
$pdf->WriteHTML($es);
$pdf->SetFont('Arial','',8);
$pdf->WriteHTML(ob_get_clean());

$pdf->Output($filename,"F");
$pdf->Output();

?>




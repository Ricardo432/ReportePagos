<?php ob_start(); ?>



<table  cellpadding="5px" cellspacing="5px" border="1" >
<thead>
    <th>Cliente</th>
    <th>Dirección</th>
    <th>Pago</th>
    <th>Fecha de Reporte</th>
    <th>Fecha de Verificacin</th>
    
</thead>
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
        <td><?php echo $lin['Cantidad']; ?></td>
        <td><?php echo $lin['FechaRegistro']; ?></td>
    </tr>

<?php }
} ?>
<tr>
    <td>Total: </td>
    <td>$<?php echo $total; ?>.00</td>
</tr>

</table>
<?php
require('fpdf/html_table.php');

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->WriteHTML(ob_get_clean());
$pdf->Output();
?>



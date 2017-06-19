<?php ob_start();
?>


<table  cellpadding="5px" cellspacing="5px" border="1" >

	<tr>
    <td>Fecha</td>
    <td>Proveedor</td>
    <td>Concepto</td>
    <td>Destino </td>
    <td>Cantidad </td>
    <td>Folio</td>
    </tr>

<?php

include 'conexion.php';
setlocale(LC_MONETARY, 'en_US');
$total =0; 
$y = $_POST['year']; 
$m = $_POST['mes'];
 $query = "SELECT * from gasto where Fecha BETWEEN '".$y."-".$m."-01' and '".$y."-".$m."-31'";
        $result = mysql_query($query);
        while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
        $total+=$line['Cantidad'];

?>
    <tr>
        <td><?php echo $line['Fecha']; ?></td>
        <td><?php echo utf8_decode($line['Empresa']);   ?></td>
        <td><?php echo utf8_decode($line['Concepto']); ?></td>
        <td><?php echo utf8_decode($line['Destino']); ?></td>
        <td><?php echo money_format('%(#2n', $line['Cantidad']) . "\n"; ?></td>
        <td><?php echo $line['NumFactura']; ?></td>
    </tr>

<?php 
} ?>
<tr>
 	<td></td>
    <td >Total: </td>
    <td><?php 
echo money_format('%(#2n', $total) . "\n";  ?></td>
</tr>

</table>
<?php
require('fpdf/html_table.php');

switch ($m) {
    case '01':
    $mes= "Enero ";
        break;
    case '02':
    $mes= "Febrero ";
        break;
        case '03':
    $mes= "Marzo ";
        break;
        case '04':
    $mes=    "Abril ";
        break;
        case '05':
    $mes=    "Mayo ";
        break;
        case '06':
    $mes=    "Junio ";
        break;
        case '07':
    $mes=    "Julio ";
        break;
        case '08':
    $mes=    "Agosto ";
        break;
        case '09':
    $mes=    "Septiempre ";
        break;
        case '10':
    $mes=    "Octubre ";
        break;
        case '11':
    $mes=    "Noviembre ";
        break;
    default:
        $mes= "Diciembre ";
        break;
}
$es =utf8_decode("Reporte de ingresos del mes de ".$mes." del año ".$y." 
<br>
Por un monto de: ".money_format('%(#2n', $total) . "\n");
$filename= "ReporteMensual".time().".pdf";

$titu=utf8_decode("Asociación de Colonos el Country Villahermosa");
$pdf=new PDF_HTML_Table();

$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->WriteHTML("                                         ".$titu."<br>
");
$pdf->SetFont('Arial','',11);
$pdf->WriteHTML($es);
$pdf->SetFont('Arial','',8);
$pdf->WriteHTML(ob_get_clean());
$pdf->Output();

?>




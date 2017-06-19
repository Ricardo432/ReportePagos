<?php  ob_start(); include 'conexion.php'; 
date_default_timezone_set("America/Mexico_City");
$y = $_GET['y'];
$query = "SELECT * FROM corte where Fecha BETWEEN '$y-1' and '$y-31' ";
$result = mysql_query($query);
$sum =0;
while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $sum+=$line['Total'];
} 
$en =$sum;
 
$query = "SELECT * FROM pagos where FechaAceptado BETWEEN '$y-1' and '$y-31' ";
$result = mysql_query($query);
$sum = mysql_num_rows($result);
    $nPagos=$sum;

$query = "SELECT * FROM gasto where Fecha BETWEEN '$y-1' and '$y-31' ";
$result = mysql_query($query);
$sum =0;
while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $sum+=$line['Cantidad'];
} 
$m = substr($y, -2);
$m--;$retVal = ($m<=9) ? $m = "0".$m : $m=$m ;
$ye = substr($y, 0,-2);
$query = "SELECT * FROM balance_final where Fecha='".$ye.$m."'";
$result = mysql_query($query);
while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
   $inicio = $line['Final'];
}
setlocale(LC_MONETARY, 'en_US');
    
 ?>

<body >
<div  >
<table style="width: 90%; padding: 20px 30px 50px 80px;" >
<tr >
    <td colspan="2" ><img src="http://countryvillahermosa.org/img/logo1.jpeg" style="width:150px; height:60px;"><b> Fraccionamiento el Country</b></td>
    
</tr>
    
    <tr>
        <td colspan="2" style="padding-top: 20px;"><b>Balance general de ingresos y egresos
del mes de mayo del a&#241;o del periodo 1 - 31</b></td>
    </tr>
    <tr>
       
         <td colspan="2" style="padding-top: 20px;">Saldo Global inicial al dia 1&#176; de este mes: <?php echo money_format('%(#2n',($inicio)  ) . "\n"; ?> </td>
    </tr>
    <tr>
        <td >Total de reportes validados de : <?php echo $nPagos; ?></td>
    </tr>
    <tr style="padding-top: 20px;">
        
        <td style="padding-top: 20px; text-align: center;"><b>Ingresos</b> </td>
        <td style="padding-top: 20px; text-align: center;"><b> Egresos </b></td>

    </tr>
    
    
    <tr>
        <td >Total de ingresos: <?php echo money_format('%(#2n',($en)  ) . "\n"; ?></td>
        <td >Total de egresos: <?php echo money_format('%(#2n',($sum)  ) . "\n"; ?></td>
    
    
    <tr style="padding-top: 20px;">
        <td style="padding-top: 20px;"><b>Saldo Global</b></td>
    </tr>
    <tr><td>Saldo Global Final: <?php echo money_format('%(#2n',(($inicio+$en-$sum))  ) . "\n"; ?></td></tr>
</table>

</div>
</body>

<?php require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();

$dompdf->load_html(ob_get_clean());
$dompdf->set_paper(0,0,73.70,104.88);
$dompdf->render();
$pdf = $dompdf->output();
$filename = $y.'.pdf';
file_put_contents($filename, $pdf);
$dompdf->stream($filename); ?>
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


<body >
<div  style="width:200px; height:350px;">
<table  cellpadding="5px" cellspacing="5px" >
<tr>
    <td colspan="2" style="text-align: center;"><img src="http://countryvillahermosa.org/img/logo1.jpeg" style="width:100px; height:50px;"></td>
</tr>
    <tr >
    <td colspan="2" style="text-align: center;"> Fraccionamiento el Country</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">Recibo de pago</td>
    </tr>
    <tr>
        <td>Fecha: </td>
         <td><?php echo $lin['FechaRegistro']; ?> </td>
    </tr>
    <tr>
        <td>Folio N&deg;</td>
        <td><?php echo $lin['idPago']; $folio = $lin['idPago']; ?> </td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="2"><?php echo $line['Nombre']; $nombre = $line['Nombre']; ?> </td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="2">Direcci&#243;n: <?php echo $line['Direccion']; ?> </td>
    </tr>
    <tr >
        <td style="text-align: center;" colspan="2">Concepto: </td>
        
    </tr>
    <tr>
        <td style="text-align: center;" colspan="2">Cuota de Mantentenimiento y Control de Acceso las 24 hrs</td>
    </tr>
    
    <tr>
        <td></td>
        <td>Total: $<?php  echo $lin['Cantidad']; ?>.00</td>
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
var_dump($dompdf);

?>
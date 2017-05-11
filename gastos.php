<<?php include 'conexion.php'; 
$fecha = $_POST['fecha'];
$factura = $_POST['factura'];
$empresa = $_POST['empresa'];
$concepto = $_POST['concepto'];
$cantidad = $_POST['cantidad'];
$destino = $_POST['destino'];
$query="INSERT into gasto(Fecha,Empresa,Concepto,Cantidad,NumFactura,Destino) values('$fecha','$empresa','$concepto','$cantidad','$factura','$destino')"; 
mysql_query($query);
echo "<script language='javascript'>window.location='admin.php?m=3'</script>";
?>
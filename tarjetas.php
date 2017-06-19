<?php 
include 'conexion.php';
$i=1;
$re = $_GET['name'];
if (isset($_GET['id'])) {

for ($i; $i <= $_GET['id']; $i++) { 
$user =	$_POST['user'.$i];
$r =	$_POST['tar'.$i];
$s =	$_POST['tarC'.$i];
$marca = $_POST['marca'.$i];
$modelo = $_POST['modelo'.$i];
$color = $_POST['color'.$i];
$placas = $_POST['placas'.$i];

 $r= decbin($r);
 $s=decbin($s);

while (strlen($r)<8) {
	# code...
	$r="0".$r;
}
while (strlen($s)<16) {
	# code...
	$s="0".$s;
}
$tag = $r.$s;

$query = "INSERT INTO acceso(idCliente,idTarjeta,Marca,Modelo,Color,Placas,Usuario) values ('$re',
'$tag',
'$marca',
'$modelo',
'$color',
'$placas','$user')";
mysql_query($query) or die(mysql_error());
}

}
header('location:') ?>
<?php
include 'conexion.php';
$pass = $_POST['password'];
 session_start();

$query = "SELECT * FROM residente where idResidente='".$_SESSION['name']."'";
$result = mysql_query($query) or die('er');

while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {

	$query2 = "UPDATE usuario set Contrasena='".$pass."' where idUsuario='".$line['Usuario']."'";
	mysql_query($query2 ) or die('er');
	echo "<script language='javascript'>window.location='formReporteRe.php'</script>";
}
 ?>
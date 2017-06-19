<?php 

	include 'conexion.php';

	$query = "DELETE FROM acceso
WHERE idAcceso='".$_GET['q']."'";
mysql_query($query);


 ?>
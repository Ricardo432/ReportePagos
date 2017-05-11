<?php
include('conexion.php');
$id = $_POST["id"];
$cliente  = array();

	$query ='SELECT * FROM servicio WHERE familia ='.$id;
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	while ($line = mysql_fetch_array($result, MYSQL_NUM)) {
	array_push($cliente, $line[0]);	
	array_push($cliente, $line[1]);

	}




echo json_encode($cliente);



?>

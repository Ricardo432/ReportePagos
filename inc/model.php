<?php
include('conexion.php');
$id = $_POST["id"];
$cliente  = array();
//if($id != 1){
//$query ='SELECT * FROM Instalacion WHERE Familia ='.$id;
//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
//while ($line = mysql_fetch_array($result, MYSQL_NUM)) {
	$query2 ='SELECT * FROM residente '; 
	$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
while ($line2 = mysql_fetch_array($result2, MYSQL_NUM)) {
	array_push($cliente, $line2[0] );
	array_push($cliente, $line2[1] );
	array_push($cliente, $line2[2] );
	
}
//}
/*}else{
	$query ='SELECT * FROM Cliente_VC ';
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	while ($line = mysql_fetch_array($result, MYSQL_NUM)) {
		$query2 ='SELECT * FROM Cliente WHERE Id_cliente ='.$line[0];
	$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
while ($line2 = mysql_fetch_array($result2, MYSQL_NUM)) {
	array_push($cliente, $line2[0] );
	array_push($cliente, $line2[1] );
}
	}
}*/
echo $cliente[1];


$json= json_encode($cliente);

$error = json_last_error();

var_dump($json, $error === JSON_ERROR_UTF8);

?>

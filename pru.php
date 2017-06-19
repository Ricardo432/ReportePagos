
<?php
include 'conexion.php';


$myfile = fopen("data.txt", "w") or die("Unable to open file!");
$query = "SELECT * from acceso";
$result = mysql_query($query) or die(mysql_error());
while ($line = mysql_fetch_array($result,MYSQL_ASSOC) {
	# code...
	 $txt = $line['idTarjeta'].$line['Activo']."\n";
	fwrite($myfile, $txt);
}



fclose($myfile);



?>



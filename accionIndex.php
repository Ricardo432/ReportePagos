
<?php
include('conexion.php');
$usuario = $_POST['user'];
$pass = $_POST['password'];
$query = 'SELECT * FROM usuarios';
session_start();
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
while ($line = mysql_fetch_array($result, MYSQL_NUM)) {  
	if ($line[1]==$usuario) {
		$userbool=true;
		if ($line[2]==$pass) {
			$passbool=true;
			if($line[4]=="tecnico"){
				$_SESSION['ide']=$line[0];
				$_SESSION['user']=$line[3];
				$_SESSION['tipo']=$line[4];
				echo "<script language='javascript'>window.location='formTecnico.php'</script>";
				break;
			}else{
				$_SESSION['id']=$line[0];
				$_SESSION['user']=$line[3];
				$_SESSION['tipo']=$line[4];
				echo "<script language='javascript'>window.location='formVentas.php?Li=0'</script>";
				break;
			}
		}else{
			$passbool=false;
		}
	}else{
		$userbool=false;
		}
}
if ($userbool == false) {
	echo "<script language='javascript'>window.location='index.php'</script>";
}
if ($passbool == false) {
	echo "<script language='javascript'>window.location='index.php'</script>";
	
}
?>

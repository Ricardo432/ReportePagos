<?php 
include 'conexion.php';
echo $id = $_GET['id'];
echo $nombre =$_POST['nombre'];
echo $direccion =$_POST['direccion'];
echo $nombreR =$_POST['nombreR'];
echo $tipoDomicilio =$_POST['tipoDomicilio'];
echo $email =$_POST['email'];
echo $telefono =$_POST['telefono'];


$query = "UPDATE residente set Nombre='$nombre',Direccion='$direccion',NombreRenta='$nombreR',TipoDomicilio='$tipoDomicilio',Email='$email',Telefono='$telefono' where idResidente='".$id."'";

$res=mysql_query($query) or die ('Consulta fallida: '.mysql_error());
echo $res;
	$que= "SELECT * from residente where idResidente='".$id."'";
	$res=mysql_query($que) or die ('Consulta fallida: '.mysql_error());
	while ($li = mysql_fetch_array($res,MYSQL_ASSOC)) {
		# code...
	if ($_POST['cam']==true) {
	$query = "UPDATE  usuario set Usuario='$email',Contrasena='$telefono' where idUsuario='".$li['Usuario']."'";
mysql_query($query) or die ('Consulta fallida: '.mysql_error());
echo "<script language='javascript'>window.location='admin.php?m=2'</script>";
}else{
	
	$query = "UPDATE  usuario set Usuario='$email' where idUsuario='".$li['Usuario']."'";
mysql_query($query) or die ('Consulta fallida: '.mysql_error());
echo "<script language='javascript'>window.location='admin.php?m=2'</script>";
}



}


 ?>
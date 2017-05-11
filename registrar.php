<?php 
include 'conexion.php';
$nombre =$_POST['nombre'];
$direccion =$_POST['direccion'];
$nombreR =$_POST['nombreR'];
$tipoDomicilio =$_POST['tipoDomicilio'];
$email =$_POST['email'];
$telefono =$_POST['telefono'];

$query = "INSERT INTO residente (Nombre,Direccion,NombreRenta,TipoDomicilio,Email,Telefono) values('$nombre','$direccion','$nombreR','$tipoDomicilio','$email','$telefono')";
mysql_query($query) or die ('Consulta fallida: '.mysql_error());
$query = "INSERT INTO usuario (Usuario,TipoUsuario,Contrasena) values('$email','2','$telefono')";
mysql_query($query) or die ('Consulta fallida: '.mysql_error());
$id=mysql_query("(Select max(idResidente) from residente)");
while ($id2 = mysql_fetch_array($id,MYSQL_NUM)) {
	$query2 = "UPDATE residente  set usuario= (Select max(idUsuario) from usuario) where idResidente = '".$id2['0']."'";
mysql_query($query2) or die ('Consulta fallida: '.mysql_error());
}
echo "<script language='javascript'>window.location='admin.php?m=0'</script>";

 ?>
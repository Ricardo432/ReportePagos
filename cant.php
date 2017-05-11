<<?php include 'conexion.php'; $id=$_GET['pg'];
	$canti =$_POST['cantidad'];
  $query2="UPDATE pagos set Cantidad='$canti' WHERE idPago='".$id."'";
  mysql_query($query2) or die('Consulta fallida'.mysql_error());

  echo "<script language='javascript'>window.location='admin.php?m=1'</script>";
   ?>
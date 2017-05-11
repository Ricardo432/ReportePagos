<?php 
include 'conexion.php';
$email=$_POST['email'];
$pass =$_POST['password'];

session_start();

$query ="SELECT * FROM usuario where Usuario='".$email."' "; 
$result = mysql_query($query) or die('consulta fallida'.mysql_error());  
$res = mysql_num_rows($result);

if ($res==0) {
	echo "<script language='javascript'>window.location='index2.php?res=1'</script>";
} else {
	while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
		
		if ($line['Contrasena']==$pass) {

				if ($line['TipoUsuario']=='1') {
					
					$_SESSION['name']= "Admin";
					 $_SESSION['tiempo'] = time();

					echo "<script language='javascript'>window.location='admin.php?m=0'</script>";
			

		} else {
			$query1 = "SELECT * FROM residente where usuario='".$line['idUsuario']."'";
			$result = mysql_query($query1);
			while ($lin = mysql_fetch_array($result,MYSQL_ASSOC)) {
				if ($pass==$lin['Telefono']) {
					$_SESSION['name'] = $lin['idResidente'];
					 $_SESSION['tiempo'] = time();
					echo "<script language='javascript'>window.location='cambio.php'</script>";
				}else{
					$_SESSION['name'] = $lin['idResidente'];
					 $_SESSION['tiempo'] = time();
					//setcookie('name', $lin['idResidente'], time() + (86400 * 30), "/");
					echo "<script language='javascript'>window.location='panelResidente.php'</script>";
				}
				
				
			}
			
			
			
		}

		} else {
			echo "<script language='javascript'>window.location='index2.php?res=2'</script>";
			
		}
		
		
	}
}

 ?>
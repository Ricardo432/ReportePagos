
<?php 
include 'conexion.php';
$email=$_POST['email'];
$pass =$_POST['password'];



$query ="SELECT * FROM usuario where Usuario='".$email."' "; 
$result = mysql_query($query) or die('consulta fallida'.mysql_error());  
$res = mysql_num_rows($result);

if ($res==0) {
	//header('Location: index2.php?res=1');
	echo "<script language='javascript'>window.location='index2.php?res=1'</script>";
	exit();

} else {
	while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
		
		if ($line['Contrasena']==$pass) {

				if ($line['TipoUsuario']=='1') {
					session_start();
					$_SESSION['name']= "Admin";
					$_SESSION['user'] = $line['idUsuario'];
					$_SESSION['img'] = $line['Imagen'];
					 $_SESSION['tiempo'] = time();

					//header('Location: admin.php?m=0');
					 echo "<script language='javascript'>window.location='admin.php?m=0'</script>";
					 exit();

			

		} else {
			$query1 = "SELECT * FROM residente where usuario='".$line['idUsuario']."'";
			$result = mysql_query($query1);
			while ($lin = mysql_fetch_array($result,MYSQL_ASSOC)) {
				if ($pass==$lin['Telefono']) {
					session_start();
					$_SESSION['name'] = $lin['idResidente'];
					$_SESSION['user'] = $line['idUsuario'];
					$_SESSION['img'] = $line['Imagen'];
					 $_SESSION['tiempo'] = time();
					echo "<script language='javascript'>window.location='cambio.php'</script>";
				}else{
					session_start();
					$_SESSION['name'] = $lin['idResidente'];
					$_SESSION['img'] = $line['Imagen'];
					$_SESSION['user'] = $line['idUsuario'];
					 $_SESSION['tiempo'] = time();
					//setcookie('name', $lin['idResidente'], time() + (86400 * 30), "/");
					//header('Location: panelResidente.php');
					 echo "<script language='javascript'>window.location='panelResidente.php'</script>";
					 exit();

				}
				
				
			}
			
			
			
		}

		} else {
			echo "<script language='javascript'>window.location='index2.php?res=2'</script>";
			
		}
		
		
	}
}

 ?>
<?php session_start()
if (is_null($_SESSION['id'])) {
	header("location:index.html");
} ?>
<?php  

$cantidad = $_POST['cantidad'];
$metodo = $_POST['metodo'];
include ('conexion.php');



$tipo_archivo = $_FILES['archivo']['type']; 
$r=strripos($_FILES['archivo']['name'],".");
$f=substr($_FILES['archivo']['name'],$r);
$nombre_archivo = "ej".date("Ym-d-H-i").$f ;


if (move_uploaded_file($_FILES['archivo']['tmp_name'], $nombre_archivo)){ 
      	
      	if ($_SESSION['id']=="admin") {
            $re = $_GET['recidentes'];
            
            $query ="INSERT INTO pagos (idResidente,Cantidad,TipoPago,Comprobante,FechaRegistro) VALUES ('".$re."','".$cantidad."','".$metodo."','".$nombre_archivo."','20".date("y-m-d")."')";
         mysql_query($query) or die('Conexion fallida'.mysql_error());
            
      		echo "<script language='javascript'>window.location='admin.php?m=0'</script>";
      	} else {
            $query ="INSERT INTO pagos (idResidente,Cantidad,TipoPago,Comprobante,FechaRegistro) VALUES ('".$_SESSION['id']."','".$cantidad."','".$metodo."','".$nombre_archivo."','20".date("y-m-d")."')";
         mysql_query($query) or die('Conexion fallida'.mysql_error());
      		echo "<script language='javascript'>window.location='formReporteRe.php'</script>";
      	}
      	
      	
   	}else{ 
      	echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 

?>
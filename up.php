
<?php  
session_start();
include 'session.php';
$cantidad = $_POST['cantidad'];
$metodo = $_POST['metodo'];

include ('conexion.php');
      	
      	if ($_SESSION['name']=="Admin") {
            $re = $_GET['id'];
            
           $query ="INSERT INTO pagos (idResidente,Cantidad,TipoPago,FechaRegistro) VALUES ('".$re."','".$cantidad."','".$metodo."','".date("Y-m-d")."')";
        mysql_query($query) or die('Conexion fallida'.mysql_error());
            
      		echo "<script language='javascript'>window.location='../admin.php?m=0'</script>";
      	} else {

          $r=strripos($_FILES['archivo']['name'],".");
          $f=substr($_FILES['archivo']['name'],$r);
          $nombre_archivo = $_SESSION['name'].date("YmdHi").$f ;

          if (move_uploaded_file($_FILES['archivo']['tmp_name'], $nombre_archivo)){ 

          $des = $_POST['descrip'];
          $nombre = $_POST['nombre'];
            $query ="INSERT INTO pagos (idResidente,Cantidad,TipoPago,Comprobante,FechaRegistro,Descripcion,Nombre) VALUES ('".$_SESSION['name']."','".$cantidad."','".$metodo."','".$nombre_archivo."','20".date("y-m-d")."','$des','$nombre')";
         mysql_query($query) or die('Conexion fallida'.mysql_error());
      		echo "<script language='javascript'>window.location='../panelResidente.php?er=2'</script>";
          }else{ 
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
            print_r($_FILES);
            print_r($nombre_archivo);

          }
      	}
      	
      	
   	 

?>
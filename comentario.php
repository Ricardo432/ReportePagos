<<?php 
session_start();
include 'conexion.php';
$noticia = $_GET['id'];
$residente = $_SESSION['name'];
$usuario = $_SESSION['user'];
$fecha = date('Y-m-d h:i:s');
$contenido = $_POST['comentario'];
$query = "INSERT into comentarios(idNoticia,idResidente,idUsuario,Fecha,Contenido) values('$noticia','$residente','$usuario','$fecha','$contenido')" ;
           
echo "<script language='javascript'>window.location='foro.php'</script>";
              ?>
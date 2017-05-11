<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h3>Panel de Residente</h3>
  
  <div style="text-align: right;"><a href="cerrar.php">Cerrar sessión</a></div>
  <ul class="nav nav-tabs">
    <li class="active"> <a data-toggle="tab"  href="#reporte">Reporte de pago</a></li>
    <li><a data-toggle="tab"  href="#historial">Historial</a></li>
    <li><a data-toggle="tab"  href="#perfil">Perfil</a></li>
  </ul>
<div class="tab-content">
    <div id="reporte" class="tab-pane fade in active ">
    <?php $er=$_GET['er']; if ($er=='2') {}else{ ?>
  <div class="alert alert-warning">
  <strong>¡Importante!</strong> Ingresar la cantidad depositada.
</div>
<?php } ?>
    <?php
    
      include 'formReporteRe.php';
     
     ?>
     <?php 
    
    if ($er=='2') {
      echo "<div class='alert alert-success'>
  <strong>Reporte enviado:</strong> En espera de Validación
</div>";
      # code...
    }
    if ($er=='1') {
      echo "<div class='alert alert-danger'>
  <strong>Error:</strong> Error al subir su archivo
</div>";
      # code...
    }
   ?>
    </div>
    <div id="historial" class="tab-pane fade">
    <?php include 'historial.php';?>
    </div>
    <div id="perfil" class="tab-pane fade">
     
    </div>
    
    </div>

  </div>


</body>
</html>
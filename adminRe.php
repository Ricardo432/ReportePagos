<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Panel de Administración</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>Administración</h2>
  <a href="admin.php?m=2" class="btn btn-success" role="button">Regresar</a>
  <div style="text-align: right;"><a href="cerrar.php">Cerrar sessión</a></div>

  <ul class="nav nav-tabs">
    <li class='active' ><a data-toggle="tab" href="#Agre">Editar Residente</a></li>
    <li  ><a data-toggle="tab" href="#Corte">Reportar Pago</a></li>
    <li  ><a data-toggle="tab" href="#Corte2">Historial</a></li>

  </ul>

  <div class="tab-content">
    <div id="Agre" class="tab-pane fade in active">
    <?php include_once 'editarRe.php'; ; ?>
    </div>
    <div id="Corte" class="tab-pane fade   ">
      
      <?php include 'formReporte.php'; ?>
    </div>
    <div id="Corte2" class="tab-pane fade   ">
      
      <?php include 'historialAd.php'; ?>
    </div>
</div>

</body>
</html>
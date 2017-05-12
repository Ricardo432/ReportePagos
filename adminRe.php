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
  <div style="text-align: right;"><a href="cerrar.php">Cerrar sessión</a></div>

  <ul class="nav nav-tabs">
    <li class='active' ><a data-toggle="tab" href="#Agre">Editar Residente</a></li>
    <li  ><a data-toggle="tab" href="#Residentes">Historial de Pago</a></li>
  
  </ul>

  <div class="tab-content">
    <div id="Agre" class="tab-pane fade in active">
    <?php include 'editarRe.php'; ?>
    </div>
    <div id="Reportepago" class="tab-pane fade  ">
    <?php include 'historialAd.php';?>
    </div>
   
  </div>
</div>

</body>
</html>
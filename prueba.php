<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'conexion.php'; $query = "SELECT * FROM reportes WHERE Revisado='0'v and rechazado='0'";
$total = mysql_num_rows(mysql_query($query)); ?>
<div class="container">
  <h2>Administracion</h2>
  <ul class="nav nav-tabs">
    <li ><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#Reportepago">Reportes de pago<span class="badge"><?php echo $total; ?> </span></a></li>
    <li><a data-toggle="tab" href="#CapturadeGastos">Captura de Gastos </a></li>
    <li class="active"><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade ">
      
    </div>
    <div id="Reportepago" class="tab-pane fade">
    <h3>Reportes de pago</h3>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
            <th>Residente</th>
            <th>Pago</th>
            <th>Tipo de pago</th>
            <th>Comprobante</th>
            <th colspan="2"></th>
           </tr>
           <?php  $result = mysql_query($query) or die('Consulta fallida'.mysql_error());
           while ($line=mysql_fetch_array($result,MYSQL_ASSOC)) {
            ?> 
            <tr>
              <td><?php echo $line['']; ?> </td>
              <td><<?php echo $line['Cantidad']; ?></td>
              <td><<?php echo $line['TipoPago'] ?></td>
              <td><a href=<?php echo "'descarga.php?ar=".$line['Comprobante']."'" ?>>Descargar</a></td>
              <td><a href=<?php echo "'ver.php?re=1'" ?> class="btn btn-success" role="button">Revisado</a></td>
              <td><a href=<?php echo "'ver.php?re=0'" ?> class="btn btn-danger" role="button">Rechazado</a></td>
            </tr>
            <?php
            } ?>
          </thead>
        </table>
        
      </div>
    </div>
    <div id="CapturadeGastos" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade in active">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

</body>
</html>
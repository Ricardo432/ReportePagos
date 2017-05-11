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

<?php include 'conexion.php'; $query = "SELECT * FROM pagos WHERE Revisado='0' ";
$total = mysql_num_rows(mysql_query($query)); 
$a="";
$b="";
$c="";
$d="";

if (isset($_GET['m'])) {
  $m=$_GET['m'];
  switch ($m) {
    case '0':
      $a ="class='active'";
      $a1="in active";
      break;
    case '1':
      $b ="class='active'";
      $b1="in active";
      break;

    case '2':
      $c ="class='active'";
      $c1="in active";
      break;

      case '3':
      $d ="class='active'";
      $d1="in active";
      break;
    default:
      # code...
      break;
  }
} else {
  # code...
}


?>
<div class="container">
  <h2>Administración</h2>
  <div style="text-align: right;"><a href="cerrar.php">Cerrar sessión</a></div>

  <ul class="nav nav-tabs">
    <li <?php echo $a; ?> ><a data-toggle="tab" href="#Agre">Alta de Residentes</a></li>
    <li <?php echo $c; ?> ><a data-toggle="tab" href="#Residentes">Residentes</a></li>
    <li <?php echo $b; ?> ><a data-toggle="tab" href="#Reportepago">Reportes de pago<span class="badge"><?php echo $total; ?> </span></a></li>
    <li <?php echo $d; ?> ><a data-toggle="tab" href="#Gasto">Captura de Gastos</a></li>
    <li  ><a data-toggle="tab" href="#Validados">Historial de pagos</a></li>
    <li  ><a data-toggle="tab" href="#Corte">Reportes de Ingreso</a></li>
  </ul>

  <div class="tab-content">
    <div id="Agre" class="tab-pane fade  <?php echo $a1; ?> ">
    <?php include 'registro.php'; ?>
    </div>
    <div id="Reportepago" class="tab-pane fade  <?php echo $b1; ?> ">
    <?php include 'reportePago.php';?>
    </div>
    <div id="Residentes" class="tab-pane fade <?php echo $c1; ?> ">
     <?php include 'residentes.php'; ?>
    </div>
    <div id="Gasto" class="tab-pane fade <?php echo $d1; ?>   ">
      
      <?php include 'reporteGastos.php'; ?>
    </div>
    <div id="Validados" class="tab-pane fade   ">
      
      <?php include 'historialPagos.php'; ?>
    </div>
    <div id="Corte" class="tab-pane fade   ">
      
      <?php include 'reporte.php'; ?>
    </div>
  </div>
</div>

</body>
</html>
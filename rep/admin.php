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
  <?php echo $_SESSION['name']; ?>
  <ul class="nav nav-tabs">
    <li <?php echo $a; ?> ><a data-toggle="tab" href="#Agre">Home</a></li>
    <li <?php echo $b; ?> ><a data-toggle="tab" href="#Reportepago">Reportes de pago<span class="badge"><?php echo $total; ?> </span></a></li>
    <li <?php echo $c; ?> ><a data-toggle="tab" href="#CapturadeGastos">Coming soon... </a></li>
    <li <?php echo $d; ?> ><a data-toggle="tab" href="#ResgistroPago">Registro de pago manual</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="Agre" class="tab-pane fade  <?php echo $a1; ?> ">
    <?php include 'registro.php'; ?>
    </div>
    <div id="Reportepago" class="tab-pane fade  <?php echo $b1; ?> ">
    <?php include 'reportePago.php';?>
    </div>
    <div id="CapturadeGastos" class="tab-pane fade <?php echo $c1; ?> ">
     <?php include 'residentes.php'; ?>
    </div>
    <div id="ResgistroPago" class="tab-pane fade  <?php echo $d1; ?> ">
      
      <?php include 'formReporte.php'; ?>
    </div>
  </div>
</div>

</body>
</html>
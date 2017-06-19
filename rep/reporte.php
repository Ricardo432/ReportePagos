<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="page-header"><h3>Reporte de Corte</h3></div>
<div><a href="/rep/newReporte.php" target="_blank" class="btn btn-info" role="button" <?php include 'conexion.php';
$query = "SELECT * FROM pagos where Corte='0' ";
$result = mysql_num_rows(mysql_query($query));
if ($result == 0) {
 	echo "disable";
 } ?> >Generar Nuevo Reporte</a></div>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $query = "SELECT * from corte order by idCorte desc";
				$result = mysql_query($query);
				while ($lin = mysql_fetch_array($result,MYSQL_ASSOC)) {
					?>
					<tr>
						<td><?php echo $lin['Fecha']; ?></td>
						<td>$<?php echo $lin['Total']; ?>.00</td>
						<td><a href="/rep/descarga.php?ar=<?php echo $lin['Url']; ?>">Descarga</a></td>
					</tr>
					<?php
				}
				 ?>
			</tbody>
		</table>
	</div>
	
</div>
</body>
</html>

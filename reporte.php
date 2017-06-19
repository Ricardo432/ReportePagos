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
<div class="col-sm-6"><h3 style="text-align: center;">Reporte General de Pagos</h3></div><div class="col-sm-6"><h3 style="text-align: center;">Reporte Final del Mes</h3></div>
<div class="col-sm-6" >
<div></div>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Total</th>
					<th><a  <?php include 'conexion.php';
$query = "SELECT * FROM pagos where Corte='0' ";
$result = mysql_num_rows(mysql_query($query));
if ($result == 0) {
 	echo "href='#' target='_blank' class='btn btn-info' role='button' disabled";
 }else{
 	echo "href='/rep/newReporte.php' target='_blank' class='btn btn-md btn-info' role='button'";
 	} ?> >Generar Nuevo Reporte</a></th>
				</tr>
			</thead>
			<tbody>
				<?php $query = "SELECT * from corte order by idCorte desc";
				$result = mysql_query($query);
				while ($lin = mysql_fetch_array($result,MYSQL_ASSOC)) {
					?>
					<tr>
						<td><?php echo $lin['Fecha']; ?></td>
						<td><?php setlocale(LC_MONETARY, 'en_US');
echo money_format('%(#2n', $lin['Total']) . "\n"; ; ?></td>
						<td><a href="/rep/descarga.php?ar=<?php echo $lin['Url']; ?>">
          <span class="glyphicon glyphicon-save-file"></span>PDF
        </a></td>
					</tr>
					<?php
				}
				 ?>
			</tbody>
		</table>
	</div>
	</div>

<div class="col-sm-6" >
<div class="table-responsive">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Saldo Global</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $query = "SELECT * FROM  balance_final WHERE  idBalance >'1' order by idBalance desc";
				$result = mysql_query($query);
				while ($lin = mysql_fetch_array($result,MYSQL_ASSOC)) {
					?>
					<tr>
						<td><?php echo $lin['Fecha']; ?></td>
						<td><?php echo money_format('%(#2n', $lin['Final']) . "\n"; ; ?></td>
						<td><a href="descarga.php?ar=<?php echo $lin['PDF']; ?>">
          <span class="glyphicon glyphicon-save-file"></span>PDF
        </a></td>
					</tr>
					<?php
				}
				 ?>
			</tbody>
		</table>
	</div>
	</div>
</div>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Historial</title>
	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="page-header">
		<h4>Historial</h4>
	</div>
	<a href="admin.php?m=2" class="btn btn-success" role="button">Regresar</a>
	<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Cantidad</th>
				<th>Estatus</th>
				<th>Recibo</th>
				<th>Motivo</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			session_start();
			include 'conexion.php';
			$re=$_GET['name'];
			$query = "SELECT * from pagos where idResidente='$re'";
				$rs = mysql_query($query) or die('Conxion Fallida'.mysql_error());
				while ($li = mysql_fetch_array($rs,MYSQL_ASSOC)) {

					?>
					<tr>
						<td><?php echo $li['FechaRegistro']; ?></td>
					
						<td><?php echo  "$".$li['Cantidad'].".00"; ?></td>
					
						<?php if ($li['Revisado']=='1') {
							if ($li['Rechazado']=='1') {
								echo "<td><span class='label label-danger'>Rechazado</span></td>";
								echo "<td></td><td>".$li['Motivo']."</td>";
							}else{
								echo "<td><span class='label label-success'>Pago Aceptado</span></td>";
								echo "<td><a href='pdf.php?id=".$li['idPago']."'>Descargar</a></td><td>";
							}
						}else{
							echo "<td><span class='label label-warning'>En Validación</span></td>";
								echo "<td></td><td></td>";
						}
						 ?>
						
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
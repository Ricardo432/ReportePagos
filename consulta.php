<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Renta</th>
					<th>Tipo de inmueble</th>
					<th>Email</th>
					<th>Telefono</th>
				</tr>
			</thead>
			<tbody>
				<?php include 'conexion.php';
					$query = "SELECT * FROM residente";
					$result = mysql_query($query) or die("Consulta fallida".mysql_error());
				while ($li=mysql_fetch_array($result, MYSQL_ASSOC)) {
					
				?>
				<tr>
					<td> <?php echo  $li['Nombre']; ?> </td>
					<td> <?php echo  $li['Direccion']; ?> </td>
					<td> <?php echo  $li['NombreRenta']; ?> </td>
					<td> <?php echo  $li['TipoDomicilio']; ?> </td>
					<td> <?php echo  $li['Email']; ?> </td>
					<td> <?php echo  $li['Telefono']; ?> </td>
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
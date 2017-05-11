<!DOCTYPE html>
<html>
<head>
	<title>Residente Nuevo</title>
	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
<?php include 'session.php';

 ?>
<div class="container">
<div class="page-header">
	<h4>Registro de Residente</h4>
</div>
<form class="form-horizontal" method="post" action="registrar.php">
	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre:</label>
		<div class="col-sm-6">
			<input type="text" name="nombre" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Dirección:</label>
		<div class="col-sm-6">
			<input type="text" name="direccion" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">¿Quién renta?:</label>
		<div class="col-sm-6">
			<input type="text" name="nombreR" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tipo de inmueble:</label>
		<div class="col-sm-6">
			<select name="tipoDomicilio" class="form-control">
				<option value="Casa">Casa</option>
				<option value="Departamento">Departamento</option>
				<option value="Lote baldio">Lote baldio</option>
				<option value="Construccion">Construcción</option>
			</select> 
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Email:</label>
		<div class="col-sm-6">
			<input type="text" name="email" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Telefono:</label>
		<div class="col-sm-6">
			<input type="text" name="telefono" class="form-control">
		</div>
	</div>
	<center><button type="submit" class="btn btn-info">Aceptar</button></center>
</form>
	
</div>

</body>
</html>
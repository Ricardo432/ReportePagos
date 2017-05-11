<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Gasto</title>
		<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="page-header">
	<h4>Captura de Gastos</h4>
</div>
<form class="form-horizontal" method="post" action="gastos.php">
	<div class="form-group">
		<label class="col-sm-2 control-label">Fecha:</label>
		<div class="col-sm-6">
			<input type="date" name="fecha" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Folio:</label>
		<div class="col-sm-6">
			<input type="text" name="factura" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Proveedor:</label>
		<div class="col-sm-6">
			<input type="text" name="empresa" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Concepto:</label>
		<div class="col-sm-6">
			<input type="text" name="concepto" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Cantidad:</label>
		<div class="col-sm-6">
			<input type="text" name="cantidad" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Destino:</label>
		<div class="col-sm-6">
			<textarea class="form-control" rows="3" id="destino" name="destino"></textarea>
		</div>
	</div>
	
	
	<center><button type="submit" class="btn btn-info">Aceptar</button></center>
</form>
	<div class="row">
		<div class="col-sm-8" style="text-align: right;">Total: </div>
	</div>
	<div class="table-responsive">
		
	</div>
</div>
</body>
</html>
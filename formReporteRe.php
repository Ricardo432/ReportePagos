<!DOCTYPE html>
<html>
<head>
	<title>Intekra</title>
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
		<h3> Registro de Pagos</h3>
	</div>
	
	<center><form enctype="multipart/form-data" action="/rep/up.php" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nombre del Residente</label>
   		 	<div class="col-sm-6">
     		 	<input class="form-control" id="focusedInput" type="text" name="nombre" required placeholder="Responsable del inmueble">
    		</div>
		</div>
		
		<div class="form-group">
		  <label class="col-sm-2 control-label">Metodo de pago:</label>
		  <div class="col-sm-6">
		  <select class="form-control" id="sel1" name="metodo">
		    <option value="Deposito">Deposito Bancario</option>
		    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
		    <option value="Oxxo">Oxxo</option>
 		 </select>
 		 </div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Cantidad:</label>
   		 	<div class="col-sm-6">
     		 	<input class="form-control" id="focusedInput" type="text" name="cantidad" required>
    		</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">¿Qué estoy pagando?</label>
   		 	<div class="col-sm-6">
     		 	<input class="form-control" id="focusedInput" type="text" name="descrip" required placeholder="¡Describalo!">
    		</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Comprobante:</label>
   		 	<div class="col-sm-6">
     		 	<input class="form-control" name="archivo" type="file" />
    		</div>
		</div>
		
		<button type="submit" class="btn btn-info">Aceptar</button>
		
	</form></center>
		    
	</div>
	

</body>
</html>
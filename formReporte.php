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
<div class="container">
	<div class="page-header">
		<h3> Registro de Pagos</h3>
	</div>
	<?php $id=$_GET['name']; ?>
	<center><form enctype="multipart/form-data" action="/rep/up.php?id=<?php echo $id ?>" method="post" class="form-horizontal">
	<div class="form-group">
		

<label class="col-sm-6 control-label">Cliente:<?php include 'conexion.php'; $query2 = "SELECT * FROM residente WHERE idResidente='".$id."'" ;
              $result2 = mysql_query($query2) or die('Consulta fallida'.mysql_error());
           while ($line2=mysql_fetch_array($result2,MYSQL_ASSOC)) { echo $line2['Nombre'];} ?></label>
<div class="col-sm-4">

	</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Cantidad: $</label>
   		 	<div class="col-sm-6">
     		 	<input class="form-control" id="focusedInput" type="number" step="any" name="cantidad" >
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
		<button type="submit" class="btn btn-info">Aceptar</button>
	</form></center>
		
	</div>

</body>
</html>
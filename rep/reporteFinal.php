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
	<h4>Balance Final del mes</h4>
</div>

	
		
	
	<div class="row"><div class="col-sm-8" style="text-align: right;"><form class="form-inline" method="post" action="balance.php">
  <div class="form-group">
    <label for="y">Año:</label>
    <select class="form-control" id="y" name="y">
    <option value="<?php echo date('Y-m');?>"><?php echo date('Y-m');?></option>
	<?php include 'conexion.php'; 
     $query = "SELECT * FROM  balance_final WHERE  idBalance >'1'";
		$result = mysql_query($query)or die(mysql_error());
		
		while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
			echo "<option value='".$line['Fecha']."'>".$line['Fecha']."</option>";
		}   ?>
    </select>
  </div>
  
  
  <button type="submit" class="btn btn-default">Imprimir</button>
</form> </div></div>
	
</div>
</body>
</html>
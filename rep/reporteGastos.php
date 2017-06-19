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
	<?php include 'conexion.php'; $query = "SELECT * from gasto where Fecha BETWEEN '".date('Y-m')."-01' and '".date('Y-m')."-31'";
		$result = mysql_query($query);
		$sum =0;
		while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
			$line['Cantidad'];
			$sum+=$line['Cantidad'];
		}
	 ?>
	 <br>
		<div class="col-sm-8" style="text-align: right;">Total del gasto este mes: $<?php echo $sum; ?>.00 </div>
		
	</div>
	<div class="row"><div class="col-sm-8" style="text-align: right;"><form class="form-inline" method="post" action="reporteMes.php">
  <div class="form-group">
    <label for="year">Año:</label>
    <select class="form-control" id="year" name="year">
    <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
    <option value="<?php echo date('Y')-2;?>"><?php echo date('Y')-2;?></option>
    <option value="<?php echo date('Y')-1;?>"><?php echo date('Y')-1;?></option>
    <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
    <option value="<?php echo date('Y')+1;?>"><?php echo date('Y')+1;?></option>
    <option value="<?php echo date('Y')+2;?>"><?php echo date('Y')+2;?></option>
    </select>
  </div>
  <div class="form-group">
   <label for="mes">Mes:</label>
    <select class="form-control" id="mes" name="mes">
    <option value="<?php echo date('m');?>"><?php switch (date('n')) {
	case '1':
	echo "Enero ";
		break;
	case '2':
	echo "Febrero ";
		break;
		case '3':
	echo "Marzo ";
		break;
		case '4':
	echo	"Abril ";
		break;
		case '5':
	echo	"Mayo ";
		break;
		case '6':
	echo	"Junio ";
		break;
		case '7':
	echo	"Julio ";
		break;
		case '8':
	echo	"Agosto ";
		break;
		case '9':
	echo	"Septiempre ";
		break;
		case '10':
	echo	"Octubre ";
		break;
		case '11':
	echo	"Noviembre ";
		break;
	default:
		echo "Diciembre ";
		break;
} ?> </option>
<option value="01">Enero</option>
<option value="02">Febrero</option>
<option value="03">Marzo</option>
<option value="04">Abril</option>
<option value="05">Mayo</option>
<option value="06">Junio</option>
<option value="07">Julio</option>
<option value="08">Agosto</option>
<option value="09">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-default">Imprimir</button>
</form> </div></div>
	<div class="table-responsive">
	<table class="table">
		<tr>
			<thead>
				<th>Fecha</th>
				<th>Proveedor</th>
				<th>Concepto</th>
				<th>Destino</th>
				<th>Cantidad</th>
				<th>Folio</th>
			</thead>
		</tr>
		<?php $query = "SELECT * from gasto where Fecha BETWEEN '".date('Y-m')."-01' and '".date('Y-m')."-31'";
		$result = mysql_query($query);
		while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
			?>
			<tr>
				<td><?php echo $line['Fecha']; ?></td>
				<td><?php echo $line['Empresa']; ?></td>
				<td><?php echo $line['Concepto']; ?></td>
				<td><?php echo $line['Destino']; ?></td>
				<td><?php echo $line['Cantidad']; ?></td>
				<td><?php echo $line['NumFactura']; ?></td>
			</tr>
			<?php
		} ?>
		</table>
	</div>
</div>
</body>
</html>
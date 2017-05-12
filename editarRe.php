<!DOCTYPE html>
<html>
<head>
	<title>Editar</title>
</head>
<body>
<div class="container">
	<div class="page-header">
		<h4>Perfil Residente</h4>
	</div>
	<?php include 'sesion.php';
	include 'conexion.php';
	$se=$_SESSION['name'];
	if ($se=='Admin') {
		$id=$_GET['name'];
		$query = "SELECT * FROM residente where idResidente='$id'";
	} else {
		$query = "SELECT * FROM residente where idResidente='$se'";
	}
	
          
          $result = mysql_query($query) or die("Consulta fallida".mysql_error());
        while ($li=mysql_fetch_array($result, MYSQL_ASSOC)) {
          
        ?>
	<form class="form-horizontal" role="form" method="post" action="actualizarResidente.php?id=<?php echo  $li['idResidente']; ?>">
  
          <div class="form-group">
    <label class="col-sm-2 control-label" for="nombre">Nombre:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo  $li['Nombre']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="direccion">Dirección:</label>
    <div class="col-sm-10">
      <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo  $li['Direccion']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="renta">Renta:</label>
    <div class="col-sm-10">
      <input type="text" name="nombreR" id="renta" class="form-control" value="<?php echo  $li['NombreRenta']; ?>">
    </div>
  </div>
  <div class="form-group"> 
  <label >Inmueble</label>
    <div class="col-sm-offset-2 col-sm-10">
      <div class="select">
     <select name="tipoDomicilio" id="tipo" class="form-control">
        <option value="<?php echo  $li['TipoDomicilio']; ?>"><?php echo  $li['TipoDomicilio']; ?></option>
        <option value="Casa">Casa</option>
        <option value="Departamento">Departamento</option>
        <option value="Lote baldio">Lote baldio</option>
        <option value="Construccion">Construcción</option>
      </select> 
    </div>
  </div>
  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" value="<?php echo  $li['Email']; ?>" />
                    </div>
                  </div>
    
  <div class="form-group">
    <label class="col-sm-2 control-label" for="telefono">Telefono:</label>
    <div class="col-sm-10">
      <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo  $li['Telefono']; ?>">
      
    </div>
  </div>
  <?php if ($se=='Admin') { ?>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox" name="cam">¿Desea que el telefono sea la contraseña?</label>
      </div>
    </div>
  </div>
  <?php } ?>
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Aceptar</button>
              </div>
          </div>

        </form>
        <?php } ?>
</div>

</body>
</html>
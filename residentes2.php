<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Buscar en tiempo real con jQuery y Bootstrap</title>

    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>

    <!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  	<!-- Optional theme -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  	<!-- Latest compiled and minified JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
      </script>    

  </head>
  <body>
  	<div class="container">
	    <h1></h1>

      <div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa la canción de este Disco que deseas Buscar...">
      </div>

	    <table class="table table-hover">
        <thead>
          <tr>
            <th># de Residente</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Renta</th>            
            <th>Tipo de inmueble</th>
            <th>Email</th>
            <th>Numero:</th>
          </tr>
        </thead>
        <tbody class="buscar">
        <?php include 'conexion.php';
          $query = "SELECT * FROM residente";
          $result = mysql_query($query) or die("Consulta fallida".mysql_error());
        while ($li=mysql_fetch_array($result, MYSQL_ASSOC)) {
          
        ?>
        <tr>
          <td> <?php echo  $li['idResidente']; ?> </td>
          <td> <?php echo  $li['Nombre']; ?> </td>
          <td> <?php echo  $li['Direccion']; ?> </td>
          <td> <?php echo  $li['NombreRenta']; ?> </td>
          <td> <?php echo  $li['TipoDomicilio']; ?> </td>
          <td> <?php echo  $li['Email']; ?> </td>
          <td> <?php echo  $li['Telefono']; ?> </td>
          <td><button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal<?php echo  $li['idResidente']; ?>">Editar</button></td>
        </tr>
        <div class="modal fade" id="myModal<?php echo  $li['idResidente']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cliente</h4>
        </div>
        <div class="modal-body">
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
                        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
    
  <div class="form-group">
    <label class="col-sm-2 control-label" for="telefono">Telefono:</label>
    <div class="col-sm-10">
      <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo  $li['Telefono']; ?>">
      
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox" name="cam">¿Desea que el telefono sea la contraseña?</label>
      </div>
    </div>
  </div>
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Aceptar</button>
              </div>
          </div>

        </form>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>  
      
    </div>
    </div>
    </div>
        <?php
        }
         ?>
        </tbody>
      </table>


    </div>
  </body>
</html>
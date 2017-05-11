<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lista de Pagos Validados</title>

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
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa datos del cleinte">
      </div>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>Residente</th>
            <th>Nombre</th>
            <th>Pago</th>
            <th>Tipo de pago</th>
            <th>Comprobante</th>
            <th>Fecha de Validaci&#243;n</th>
          </tr>
        </thead>
        <tbody class="buscar">
        <?php include 'conexion.php';
         $query = "SELECT * FROM pagos WHERE Revisado='1' and Rechazado='0' order by FechaAceptado desc";
          $result = mysql_query($query) or die('Consulta fallida'.mysql_error());
           while ($line=mysql_fetch_array($result,MYSQL_ASSOC)) {
            ?> 
            <tr>
              <td><?php  $query2 = "SELECT * FROM residente WHERE idResidente='".$line['idResidente']."'" ;
              $result2 = mysql_query($query2) or die('Consulta fallida'.mysql_error());
           while ($line2=mysql_fetch_array($result2,MYSQL_ASSOC)) { echo $line2['Nombre'];} ?> </td>
              <td><?php echo  $line['Nombre']; ?></td>
              <td>$<?php echo $line['Cantidad']; ?>.00</td>
              <td><?php echo $line['TipoPago'] ?></td>
              <td><a href=<?php echo "'/rep/descarga.php?ar=".$line['Comprobante']."'" ?>>Descargar</a></td>  
              <td><?php echo  $line['FechaAceptado']; ?></td>
              </tr>
       
      

   
        <?php

        }
         ?>
        </tbody>
      </table>


    </div>
  </body>
</html>
<?php include 'session.php';

 ?><div class="container">
  <div class="page-header"></div>
    <h3>Reportes de pago</h3>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
            <th>Residente</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Pago</th>
            <th>Tipo de pago</th>
            
            <th>Comprobante</th>
            <th colspan="2"></th>
           </tr>
           <?php  $result = mysql_query($query) or die('Consulta fallida'.mysql_error());
           while ($line=mysql_fetch_array($result,MYSQL_ASSOC)) {
            ?> 
            <tr>
              <td><?php  $query2 = "SELECT * FROM residente WHERE idResidente='".$line['idResidente']."'" ;
              $result2 = mysql_query($query2) or die('Consulta fallida'.mysql_error());
           while ($line2=mysql_fetch_array($result2,MYSQL_ASSOC)) { echo $line2['Nombre'];} ?> </td>
           <td><?php echo $line['Nombre'] ?></td>
            <td><?php echo $line['Descripcion'] ?></td>
              <td>$<?php echo $line['Cantidad']; ?>.00</td>
              <td><?php echo $line['TipoPago'] ?></td>
              <td><a href=<?php echo "'/rep/descarga.php?ar=".$line['Comprobante']."'" ?>>Descargar</a></td>
              <td><a href=<?php echo "'ver.php?id=".$line['idPago']."'" ?> class="btn btn-success" role="button">Aceptado</a></td>
              <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $line['idPago']; ?> ">Rechazo</button></td>
              

<!-- Modal -->
<div id="myModal<?php echo $line['idPago']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Motivo de Rechazo Folio: <?php echo $line['idPago']; ?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="rechazo.php?id=<?php echo $line['idPago']; ?>">
  
  <div class="form-group">
    
    <div class="col-sm-6">
      <textarea class="form-control" rows="2" id="comment"></textarea>
    </div>
  </div>
  <button type="submit" class="bnt btn-info">Enviar</button>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            </tr>
            <?php
            } ?>
          </thead>
        </table>
        
      </div>
      </div>
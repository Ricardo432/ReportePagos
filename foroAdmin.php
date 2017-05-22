<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog Country</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
</head>
<body background="img/Country2.jpg">


    <!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center w3-brown" >
  <!-- Avatar image in top left corner -->
  <img src="/img/logo1.jpeg" style="width:100%">
  <img src="/imgp/<?php session_start(); echo $_SESSION['img']; ?>" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-brown">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>FORO</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-brown">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>REPORTE DE PAGO</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-brown">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>AGREGAR PUBLICACIÓN</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-brown">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACTO</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-brown w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">FORO</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">REPORTE DE PAGO</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">AGREGAR PUBLICACIÓN</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACTO</a>
  </div>
</div>
<div class="w3-padding-large" id="main">
    <div class="col-sm-10">
    <h4><small>PUBLICACIONES RESIENTES</small></h4>
     <?php include 'conexion.php'; $query="SELECT * from noticias where  Aceptado='0'"; 
      $result = mysql_query($query);
      while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
        
     ?>
      <hr>
      <h2><?php echo $line['Titulo']; ?></h2>
      <h5><span class="glyphicon glyphicon-time"></span><?php echo $line['Nombre']; ?>, <?php echo $line['Fecha']; ?></h5><br>
      <img src="<?php echo $line['Imagen']; ?>" alt="boy" class="w3-image" width="992" height="1108" style="border: black 2px solid ; margin-bottom: 10px;">
      <p><?php echo $line['Contenido']; ?></p>
      <hr>
      <a href="aNoticia.php?id=1" class='btn btn-success' role='button' >Aceptado</a><a href="aNoticia.php?id=2" class='btn btn-danger' role='button' >Rechazado</a>

      <?php } 
      $query="SELECT * from noticias where  Aceptado='1'"; 
      $result = mysql_query($query);
      while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
        $query2="SELECT * from comentarios where Aceptado='0' and idNoticia='".$line['idNoticia']."' "; 
      $result2 = mysql_query($query2);
      $sum=mysql_num_rows($result2);
      if ($sum>0) {
        # code...
        ?>
      
        <hr>
      <h2><?php echo $line['Titulo']; ?></h2>
      <h5><span class="glyphicon glyphicon-time"></span><?php echo $line['Nombre']; ?>, <?php echo $line['Fecha']; ?></h5><br>
      <img src="<?php echo $line['Imagen']; ?>" alt="boy" class="w3-image" width="992" height="1108" style="border: black 2px solid ; margin-bottom: 10px;">
      <p><?php echo $line['Contenido']; ?></p>
      <hr>
      
      
      <p> Comentarios:</p><br>
     
      <div class="row">
       <?php $query2="SELECT * from comentarios where (Aceptado='1'and Aceptado='0') and idNoticia='".$line['idNoticia']."' "; 
      $result2 = mysql_query($query2);
      while ($line2 = mysql_fetch_array($result2,MYSQL_ASSOC)) { ?>
        <div class="col-sm-2 text-center">
          <img src="/imgp/<?php $query3="SELECT * from usuario where idUsuario='".$line2['idUsuario']."'"; 
      $result3 = mysql_query($query3);
      while ($line3 = mysql_fetch_array($result3,MYSQL_ASSOC)) { echo $line3['Imagen']; }?>" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4><?php 
          
          $query3="SELECT * from residente where idResidente='".$line2['idResidente']."'"; 
      $result3 = mysql_query($query3);
      while ($line3 = mysql_fetch_array($result3,MYSQL_ASSOC)) { echo $line3['Nombre']."/ ".$line3['NombreRenta']; }?> <small><?php echo $line['Fecha']; ?></small></h4>
          <p><?php echo $line2['Contenido']; ?></p>
          <br>
          <?php if ($line2['Aceptado']=='0') {
            ?>
      <a href="aNoticia.php?id=1" class='btn btn-success' role='button' >Aceptado</a><a href="aNoticia.php?id=2" class='btn btn-danger' role='button' >Rechazado</a>
           <?php  
          } ?>
        </div>
        <?php } } ?>
      </div>
      <?php } ?>
    </div>
  </div>




</body>
</html>

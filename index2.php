<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <link href="bower_components/bootstrap/custom/signin.css" rel="stylesheet">
</head>
<body style="background-color: white">

    <div class="container">

      <form class="form-signin" method="post" action="login.php" >
        <img class="form-signin" src="/img/logo1.jpeg">
        <label for="inputEmail" class="sr-only">Email </label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email " name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Aceptar</button>
      </form>
      <?php 
   session_start();
   session_destroy();
   $_SESSION['tiempo'] =time();
      if (isset($_GET['res'])) {
         $re = $_GET['res'];
         if ($re=='1') {
           echo "<div class='alert alert-danger'>
  <strong>Error de sessión:</strong> Correo no registrado, comuniquese con el administrador.
</div>";
         }elseif ($re=='2') {
           echo "<div class='alert alert-danger'>
  <strong>Error de sessión:</strong> Contraseña invalida.
</div>";
         }elseif ($re=='3') {
           echo "<div class='alert alert-danger'>
  <strong>Error de sessión:</strong> Sesion caducada (Asegurece que las cookies esten habilitadas)
</div>";
         }
      } ?>

    </div>
</div>
</body>
</html>
<?php include'session.php' 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambio de Contraseña</title>
		<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <link href="bower_components/bootstrap/custom/signin.css" rel="stylesheet">
</head>
<body style="background-color: white">
<script type="text/javascript">
	$(document).ready(function () {
		var password = document.getElementById("password")
  , confirm_password = document.getElementById("assword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

		});
</script>
    <div class="container">

      <form class="form-signin" method="post" action="cambiar.php" >
        <h4>Cambie su Contraseña</h4>
        <label for="inputEmail" class="sr-only">Contraseña Nueva</label>
        <input type="password" id="password" class="form-control" placeholder="Contraseña " name="password" required autofocus>
        <label for="inputPassword" class="sr-only">Confirmar Contraseña</label>
        <input type="password" id="assword" class="form-control" placeholder="Confirmar" name="confirmar" required>
        
        <button name="aeptar" class="btn btn-lg btn-primary btn-block" type="submit">Aceptar</button>
      </form>

    </div>
</div>
</body>
</html>
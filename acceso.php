<!DOCTYPE html>

<html>

<head>

	<title>Acceso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript">
	i=2;
function appendText() {
document.getElementById("form").action = "tarjetas.php?name=<?php echo $_GET['name'] ?>&id="+i;
    var txt1 = "</div><div class='w3-container w3-teal'><h2>Datos Tarjeta</h2></div><div class='w3-container'><p> <label class='w3-text-teal'><b>Usuario</b></label><input class='w3-input w3-border w3-sand' name='user"+i+"' type='text'></p>";   
    txt1+="<p> <label class='w3-text-teal'><b>Tarjeta</b></label><input class='w3-input w3-border w3-sand' name='tar"+i+"' type='number' style='width:25%'><input class='w3-input w3-border w3-sand' name='tarC"+i+"' type='number' style='width:75%'></p><p> <label class='w3-text-teal'><b>Marca</b></label><input class='w3-input w3-border w3-sand' name='marca"+i+"' type='text'></p><p> <label class='w3-text-teal'><b>Modelo</b></label><input class='w3-input w3-border w3-sand' name='modelo"+i+"' type='text'></p><p> <label class='w3-text-teal'><b>Color</b></label><input class='w3-input w3-border w3-sand' name='color"+i+"' type='text'></p><p> <label class='w3-text-teal'><b>Placas</b></label><input class='w3-input w3-border w3-sand' name='placas"+i+"' type='text'></p>";// Create text with HTML

    $(".re").append(txt1);     // Append new elements
    i++;
}
function de(str){
confirmar=confirm("¿Seguro que desea eliminar esta tarjeta?");
if (confirmar){
 if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
       
        xmlhttp.open("GET", "eliminarT.php?q=" + str, true);
        xmlhttp.send();
    }
}
}

</script>
</head>

<body>

<script>



</script>
<div class="container" style="width:75%">
<ul class="w3-ul w3-card-4">
	<?php
 	session_start();
	include 'conexion.php';

	$query = "SELECT * from acceso where idCliente ='".$_GET['name']."'"; 
	$result = mysql_query($query);
	while ($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
		?>
		<div class="row">
		<li class="w3-padding-16">
    		<span onclick="de(<?php echo $line['idAcceso'] ?>);this.parentElement.style.display='none'" class="w3-button w3-white w3-xlarge w3-right">x</span>
    
   			 <span class="w3-large">Usuario: <?php echo $line['Usuario']; ?></span><br>
    		<span>Tarjeta: <?php echo $line['idTarjeta']; ?><br>
			Marca: <?php echo $line['Marca']; ?><br>
			Modelo: <?php echo $line['Modelo']; ?><br>
			Color: <?php echo $line['Color']; ?><br>
			Placas: <?php echo $line['Placas']; ?><br></span>
  		</li>
			

		</div>
		<?php
	}
?>
</ul>
</div>




<div class="w3-card-4"  style="width:75%">
  
  <form id='form' method="post" action="tarjetas.php?name=<?php echo $_GET['name'] ?>">
  <div class="w3-container w3-teal">
    <h2>Tarjetas nuevas</h2>
  </div>
  <div class="w3-container">
    <p>      
    <label class="w3-text-teal"><b>Usuario</b></label>
    <input class="w3-input w3-border w3-sand" name="user1" type="text"></p>
    <p>      
    <label class="w3-text-teal"><b>Tarjeta</b></label>
    <input class="w3-input w3-border w3-sand" name="tar1" type="number" style="width:25%">
    <input class="w3-input w3-border w3-sand" name="tarC1" type="number" style="width:75%"></p>
     <p>      
    <label class="w3-text-teal"><b>Marca</b></label>
    <input class="w3-input w3-border w3-sand" name="marca1" type="text"></p>
    <p>      
    <label class="w3-text-teal"><b>Modelo</b></label>
    <input class="w3-input w3-border w3-sand" name="modelo1" type="text"></p>
     <p>      
    <label class="w3-text-teal"><b>Color</b></label>
    <input class="w3-input w3-border w3-sand" name="color1" type="text"></p>
    <p>      
    <label class="w3-text-teal"><b>Placas</b></label>
    <input class="w3-input w3-border w3-sand" name="placas1" type="text"></p>
    <div class="re"></div>
    <p>
    <button class="w3-btn w3-teal">Register</button></p>
    </div>
  </form>
</div>

<button onclick="appendText()">Append text</button>
</body>

</html>
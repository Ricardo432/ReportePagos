<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/conv.css">
</head>
<body onload="imprimir();">
<script type="text/javascript">
            function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }
        </script>
        <div class="conv">
        <img  class ="im" src="img/logointekra.jpg">
        <br>
        
<?php
session_start();
if($_SESSION['tipo'] == 'venta' || $_SESSION['tipo'] == ""){
  header('location:index.html');
  }
include('conexion.php');
$id_cliente = $_GET['id'];
$query = "SELECT * FROM Cliente WHERE Id_cliente='$id_cliente'";

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


while ($line = mysql_fetch_array($result, MYSQL_NUM)) {

echo "<p align='right'>Villahermosa, Tabasco. A ",date('d')," "; switch (date('n')) {
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
} echo "del 20",date('y'),"</p>"; ?>
<p align='center'><b>CONVENIO DE EQUIPOS EN COMODATO</b></p>
<p align='left'>COMODANTE: JOSE JESUS GARCIA PAREDES</p><p>COMODATARIO: <?php echo "$line[1]"; ?><br>Se identifica con:_______________________________________________________.<br>CORREO ELECTRONICO: <?php echo "$line[5]"; ?><br>CEL: <?php echo "$line[4]"; ?></p>
<p >Entre las partes, COMODANTE Y COMODATARIO, mediante este documento suscriben un convenio de comodato (prestamo temporal de equipos), que se regirá por los siguientes puntos:</p>
<p ><b>Servicios:</b><br>El comodante, brindara al comodatario, el servicio de red de datos, y se comprometerá a la continuidad de estos servicios, el tiempo que dure este convenio.<br>El comodatario se obliga a pagar al comodante la cantidad estipulada que se establezca y se informe en la tabla de la parte inferior de este convenio, de manera mensual, así como el concepto de uso de red de datos que le permite beneficiarse de los megas estipulados en dicha tabla.<br>El comodante se reserva el derecho de incrementar la cuota mensual, según lo requieran sus márgenes de operación.<br>El comodatario se obliga al pago de los servicios de uso de red de datos por un tiempo forzoso NO MENOR A SEIS MESES.<br>El comodatario se da por enterado de la fecha de corte de su servicio queda estipulado en la tabla que se presenta en la parte inferior de este convenio, así como los días límite de cada mes en que se puede efectuar el pago, asi como el lugar y las formas para hacerlo.<br><b>El comodatario Acepta el hecho de que al contratar, los días posteriores a la fecha de corte del mes, los días que se suministre el servicio se pagaran por adelantado prorrateando los días.</b><br>Los horarios de servicio para atención al cliente son de lunes a viernes de 08:00 a 17:00 hrs. y sábados de 08:00 a 14:00 hrs.<br><b>Comodato</b><br>El comodante, entregara en COMODATO al comodatario, el equipo correspondiente para la prestación de los servicios de red de datos.<br>El comodatario, se da por enterado, que los equipos estipulados en este convenio, NO SON DE SU PROPIEDAD, y que se encuentran bajo su resguardo.<br>De igual manera el comodatario acepta que en el supuesto el equipo sea robado, desaparecido o extraviado, tendrá la obligación de hacer el pago correspondiente por la reposición de dicho equipo ya que en el punto anterior da por aceptado que son equipos prestados, y que para que el comodante pueda seguir otorgándole el servicio se requiere contar con los equipos necesarios.<br>El comodatario reconoce que por ningún motivo estos equipos deberán ser alterados, modificados, configurados o removidos del lugar en que originalmente queden instalados, de ser así, todo servicio generado por estas causas tendrá un costo adicional. Por ningún motivo está permitido dar un uso diferente a sus características originales.<br>El comodatario se da por enterado que estos equipos requieren un mantenimiento físico y vía remota por lo que se les estará testeando (monitoreando) de manera continua y autoriza la realización de estas actividades durante el tiempo que mantenga en su poder los equipos.<br>En el caso de que algunos de los equipos presenten alguna falla, El comodatario se compromete a enterar al comodante para que este inicie las acciones necesarias para restablecer el servicio.<br>El comodatario se da por enterado que por ningún motivo puedo hacer uso comercial de estos equipos. (Prestamos de password, claves, contraseñas o demás datos que permitan ser usados en otra ubicación que no sea la propia).<br>El comodatario está obligado a entregar el equipo en buenas condiciones y conforme a lo solicitado por el propietario, en caso contrario el equipo deberá cubrirse con el costo vigente que en ese momento marque el tabulador de costos del comodante.</p>
<p >DIRECCIÓN DE LA INSTALACIÓN: <B><?php echo "$line[2]"?></B><br>TIPO DE INSTALACIÓN: <?php } $query = "SELECT * FROM Cliente_VC WHERE Id_ClienteVC='$id_cliente'";

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


while ($line = mysql_fetch_array($result, MYSQL_NUM)) { echo $line[2]?><br>MEGAS: <?php echo $line[3] ?><br>FECHA DE CORTE: Dia 1 de cada mes<br>DIAS DE PAGO: Del 30 al 2 de cada mes.</p>
	<div class="saltopagina"></div>
<p align="left">Personas como referencias.<br><?php echo $line[22].": ".$line[23]?><br><?php echo $line[24].": ".$line[25]?></p>
<p align="left">Amparados bajo las siguientes caraterísticas</p>
<center>
<table width="85%" border="1"><tr><th width="30%">Equipo</th><th width="30%">Modelo</th><th width="40%">Número de serie</th></tr>
<?php if($line[2]=='Completa'){
	echo "<tr><td>Radio Ubiquiti</td><td></td><td></td></tr><tr><td>Routher MikroTik</td><td></td><td></td></tr>";}else{echo "<tr><td>Routher MikroTik</td><td></td><td></td></tr>";}?></table>
	</center>
<p align="center">Se aceptan en mutuo acuerdo los puntos descritos anteriormente en este documento</p>
<img src="img/Pagarefirma.PNG">

</div>
</body>
</html>
<?php 
}
 ?>
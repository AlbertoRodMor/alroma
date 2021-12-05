<?php 
error_reporting(0);
require('../conexionBD/conexion.php');

$nombre_bici = $_POST['nombre'];

for($i=1; $i<=5; $i++){

	if(($_POST['stock'.$i]) == ""){

	}
	else{
	 $stock = $_POST['stock'.$i];
	 break;
	}
}


$hoy = date('Y-m-d');

if(isset($_POST['confirmar_reserva'])){
 
 
 
 $nombre_arrendatario = $_POST['nombreReserva'];
 $cantidadDeseada = $_POST['cantidadalquilar'];
 $nombre_bici_reservada = $_POST['nombre_bici_reservada'];
 $fecha_inicio = $_POST['fechaInicio'];
 $fecha_fin = $_POST['fechaFin'];





 $pdo1 = conexion();
 $sql_reserva = "SELECT cod from bicis_alquiler where nombre='".$nombre_bici_reservada."'";
 $stmt2 = $pdo1->query($sql_reserva);

 $row3 = $stmt2->fetch();	
 /*SEGÚN EL ID DE LA BICI SABEMOS SI ES DE TIPO MTB O CARRETERA*/
 $tipo_bici = "";
	if($row3['cod'] == 5 || $row3['cod'] == 6 ){ $tipo_bici = "MTB";}else{ $tipo_bici = "Carretera";}


 $fecha_inicio_format = new DateTime($fecha_inicio);

/*PASAR LA FECHA AL FORMATO DESEADO PARA GUARDARLO EN LA BD*/
date_format($fecha_inicio_format, 'Y-m-d');

/*CALCULAR NÚMERO DE DÍAS TOTALES DE ALQUILER*/

$datetime1 = date_create($fecha_inicio);
$datetime2 = date_create($fecha_fin);
$contador = date_diff($datetime1, $datetime2);
$differenceFormat = '%a';

 $diasAlquilar = $contador->format($differenceFormat);
 $totalImporte = ($diasAlquilar * 10);
 
 $total = $cantidadDeseada * $totalImporte;

 $stockTotal = $_POST['stockrestante'];
 $stockRestante = $stockTotal-$cantidadDeseada;
 
  $pdo1 = conexion();
  $sql_guardar_reserva = "INSERT INTO alquiler_bicis (id_bici, nombre_arrendatario, tipo_bici, fecha_inicio, fecha_fin, cantidad_alquilada, Total_importe) 
 						 VALUES (?,?,?,?,?,?,?)";
  $stmt3 = $pdo1->prepare($sql_guardar_reserva);
  $stmt3->execute([$row3['cod'], $nombre_arrendatario, $tipo_bici, $fecha_inicio, $fecha_fin,$cantidadDeseada,$total]);

  
  $sqlActualizar = "UPDATE bicis_alquiler set stock=':stockRestante' WHERE cod=".$row3['cod']; 
  $consulta=$pdo1->prepare($sqlActualizar);
  $consulta->bindParam(':stockRestante',$stockRestante,PDO::PARAM_INT);
  
  $consulta->execute();

  echo '<script type="text/javascript">alert("GRACIAS POR SU RESERVA.);</script>';
    
}

?>

<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reserva</title>
	<meta charset='utf-8' />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../estilos.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<script type="text/javascript" src="../jsHome.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<link href='../fullcalendar/main.css' rel='stylesheet' />
	<script src='../fullcalendar/main.js'></script>
		
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">CONFIRMACIÓN RESERVA</h1>
			</div>
			<div class="col-12 d-flex justify-content-center mt-5">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="formulario_datos_arrendatario">
					<label for="nombreReserva">Nombre del que reserva:</label><br>
					<input type="text" name="nombreReserva" required value="<?php if(isset($_POST['confirmar_reserva'])){ echo $_POST['nombreReserva']; } ?>"><br>
					<label class="mt-3">Fechas de reserva:</label><br>
					<input type="date" name="fechaInicio" value="" min="<?php echo $hoy; ?>" required <?php if(isset($_POST['confirmar_reserva'])){ echo $_POST['fechaInicio']; } ?>>
					<input type="date" name="fechaFin" required min="<?php echo $hoy; ?>" <?php if(isset($_POST['confirmar_reserva'])){ echo $_POST['fechaFin']; } ?>><br>
					<label class="mt-3">Bicicleta a reservar: <?php if(isset($_POST['confirmar_reserva'])) echo $nombre_bici_reservada; else echo $nombre_bici; ?></label><br>
					<label class="mt-3">¿Cuántas bicicletas necesitas?:</label><br>
					<input class="" style="width: 20%;" type="number" name="cantidadalquilar" value="<?php if(isset($_POST['confirmar_reserva'])){ echo $_POST['cantidadalquilar']; } ?>" id="cantidadalquilar" min="0" max="<?php echo $stock; ?>" required><br>
					<label class="mt-3">Total importe:</label><br>
					<input class="mb-5" style="width: 20%;" type="text" name="totalImporte" value="<?php echo $total;?>€" disabled> <br>

					<input type="hidden" name="stockrestante" value="<?php echo $stock; ?>">
					<input type="hidden" class="" name="nombre_bici_reservada" value="<?php echo $nombre_bici; ?>">
					<input type="hidden" name="totalapagar" value="<?php echo $total;?>€">
					<div class="d-flex justify-content-center">
						<input class="btn btn-secondary" type="submit" name="confirmar_reserva" value="Confirmar" <?php if(isset($_POST['confirmar_reserva'])){ echo "disabled"; } ?> >
						<input class="btn btn-secondary" type="reset" name="">
						<a href="calendario.php" class="btn btn-secondary">VOLVER</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
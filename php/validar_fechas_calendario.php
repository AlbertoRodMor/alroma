<?php 

require('../conexionBD/conexion.php');
error_reporting(0);

$pdo = conexion();

$sql="SELECT fecha_inicio,fecha_fin FROM alquiler_bicis";

$stmt = $pdo->query($sql);
$arrayFechas = array();

while($row = $stmt->fetch()){
	echo $fechasIn=$row['fecha_inicio'];
	
	array_push($arrayFechas , $fechasIn);

	echo $fechasIn;
}

?>
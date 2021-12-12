<?php 
require('../conexionBD/conexion.php');
$array_fechas = array();
$pdo=conexion();
$codBicisCantntidad=array();

if(isset($_POST['fechaSeleccionada'])){
$fechaSelec=$_POST['fechaSeleccionada'];


$stmt = $pdo->prepare("select distinct alquiler_bicis.id_bici, sum(alquiler_bicis.cantidad_alquilada) as cantidad_alquilada from alquiler_bicis, bicis_alquiler where alquiler_bicis.id_bici=bicis_alquiler.cod and '".$fechaSelec."' between alquiler_bicis.fecha_inicio and alquiler_bicis.fecha_fin group by alquiler_bicis.id_bici;");


$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmt->execute();
// Mostramos los resultados
while ($row = $stmt->fetch()){
 $codBicisCantntidad[$row['id_bici']]=$row['cantidad_alquilada'];
}



$codBicisStock = array();

$stmt2 = $pdo->prepare("select cod,stock from bicis_alquiler");
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmt2->execute();
// Mostramos los resultados
while ($row2 = $stmt2->fetch()){
 $codBicisStock[$row2['cod']]=$row2['stock'];
}

$arrayFinal=array();
foreach ($codBicisStock as $id => $stock) {
	if(array_key_exists($id,$codBicisCantntidad)){
		$arrayFinal[$id]=$stock-$codBicisCantntidad[$id];
	} else{
		$arrayFinal[$id]=$stock;
	}
}
	echo json_encode($arrayFinal);
}
?>



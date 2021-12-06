<?php 

require('../conexionBD/conexion.php');
$array_fechas = array();
$pdo=conexion();

//$fechaSelec='2021-11-30';
if(isset($_POST['fechaSeleccionada'])){
$fechaSelec=$_POST['fechaSeleccionada'];

$bicisOcupadasDiaSeleccionado = "select alquiler_bicis.id_bici,alquiler_bicis.fecha_inicio,alquiler_bicis.fecha_fin,bicis_alquiler.stock, alquiler_bicis.cantidad_alquilada,bicis_alquiler.cod,bicis_alquiler.nombre from alquiler_bicis join bicis_alquiler on alquiler_bicis.id_bici=bicis_alquiler.cod where '".$fechaSelec."' between alquiler_bicis.fecha_inicio and alquiler_bicis.fecha_fin";

$stmt0 = $pdo->query($bicisOcupadasDiaSeleccionado);
$row = $stmt0->fetch();
$cucu="";
$test = array();
$test2 = array();
for($i=0; $i<$row = $stmt0->fetch(); $i++){

	//array_push($test,$row['id_bici'],$row['cantidad_alquilada']);
	if(isset($test[$row['id_bici']])){
		$test[$row['id_bici']]=$test[$row['id_bici']]+$row['cantidad_alquilada'];
	} else{
		$test[$row['id_bici']]=$row['cantidad_alquilada'];
	}
	

	$fecha_inicio_format = new DateTime($fechaSelec);
	$fechaINI = date_format($fecha_inicio_format, 'd/m/Y');
	//echo "id bici: ".$row['id_bici']."<br>fecha: ".$fechaINI."<br>stock: ".$row['stock']."<br> cantidad alquilada: ".$row['cantidad_alquilada']."<br><br>";


}



//echo "<pre>";
//print_r($test);
//echo "</pre>";



$test3 = array();
$stockBicis="select cod,stock from bicis_alquiler";
$stmt1 = $pdo->query($stockBicis);
//$row1 = $stmt1->fetch();
for($i=0; $i<$row1 = $stmt1->fetch(); $i++){
	$test3[$row1['cod']]=$row1['stock'];
}
	//echo "<pre>";
	//print_r($test3);
	//echo "</pre>";
$arrayFinal=array();
foreach ($test3 as $id => $cantidad) {
	//echo "id: ".$id." cantidad: ".$cantidad."<br>" ;
	if(array_key_exists($id,$test)){
		$arrayFinal[$id]=$cantidad-$test[$id];
	} else{
		$arrayFinal[$id]=$cantidad;
	}
}
	//echo "<pre>";
	echo json_encode($arrayFinal);
	//echo "</pre>";
}
?>
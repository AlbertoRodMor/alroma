<?php 

require('conexionBD/conexion.php');

// $selectPopUpDiasOcupados = "select alquiler_bicis.id_bici,alquiler_bicis.fecha_inicio,alquiler_bicis.fecha_fin,alquiler_bicis.cantidad_alquilada,bicis_alquiler.cod,bicis_alquiler.stock,bicis_alquiler.nombre from alquiler_bicis join bicis_alquiler on alquiler_bicis.id_bici=bicis_alquiler.cod where alquiler_bicis.fecha_inicio='2021-11-30' or alquiler_bicis.fecha_fin='2021-11-30'";	
// $pdo=conexion();
// $stmt0 = $pdo->query($selectPopUpDiasOcupados);
// 		 $row = $stmt0->fetch();

// 		while($row = $stmt0->fetch()){
						
// 			$fecha_inicio_format = new DateTime($row['fecha_inicio']);
// 			$fecha_fin_format = new DateTime($row['fecha_fin']);
// 			$fechaINI = date_format($fecha_inicio_format, 'd/m/Y');
// 			$fechaFIN = date_format($fecha_fin_format, 'd/m/Y');
			
// print_r($row);
// 		}	
		
echo $GET['fechaSeleccionada'];
?>
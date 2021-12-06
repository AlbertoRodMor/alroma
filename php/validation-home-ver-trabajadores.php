<style type="text/css">
	.listado-tabla{
		border: 2px solid #17a2b8;
		margin: auto;
    	color: white;
		
	}
	.listado-tabla tr td{
		border: 2px solid #17a2b8;
		
	}
	.listado-tabla .fila-cabecera {
		background-color: #007bff;
		color: white;
	}
</style>
<?php 
require('../conexionBD/conexion.php');
$pdo = conexion();
$sql="SELECT * FROM login_trabajadores";
$stmt2 = $pdo->query($sql);   
?>

<table class="listado-tabla">
<tr class="text-center fila-cabecera"><td class='p-2 text-center' style='font-weight: bolder;'>NOMBRE</td>
<td class='p-2 text-center' style='font-weight: bolder;'>APELLIDOS</td>
<td class='p-2 text-center' style='font-weight: bolder;'>USUARIO</td>
</tr>
<?php 
	
	while($row = $stmt2->fetch()){

	echo "<tr class='p-2 text-center'>
		 <td class='p-2 text-center'>".$row['nombre']."
		 </td>
		 <td class='p-2 text-center'>".$row['apellidos'].
		 "</td>
		 <td class='p-2 text-center'>".$row['user'].
		 "</td>	
		 </tr>";

		 // $row = $stmt2->fetch();	

}?>	
</table>


<?php 
require('../conexionBD/conexion.php');
$pdo = conexion();
$sql="SELECT * FROM facturas";
$stmt = $pdo->query($sql);   

?>
<table class="listadoFacturas-tabla">
<tr class="text-center fila-cabecera"><td class='p-2 text-center' style='font-weight: bolder;'>NOMBRE CLIENTE</td>
<td class='p-2 text-center' style='font-weight: bolder;'>ARTÍCULO</td>
<td class='p-2 text-center' style='font-weight: bolder;'>CANTIDAD</td>
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
?>

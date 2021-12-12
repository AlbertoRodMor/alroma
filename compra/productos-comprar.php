<html lang="en">
<head>

		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<script type="text/javascript" src="../jsHome.js"></script>

</head>
<style type="text/css">
	.imagen-bici{
		width: 600px;
	}
	@media (max-width: 767px){
	 .imagen-bici{
		width: 320px;
	 }	
	}
</style>
<body>
	<?php 
include('../conexionBD/conexion.php');

session_start();
/*Controlar si existe una sesión de usuario abierta, si no es así te redigirá a registrarte*/
if (!isset($_SESSION['usuarioCliente'])) {
	die("Error - debe <a href='../index.php'>identificarse</a>.<br />");
}else{
	/*Si le hemos dado al botón de comprar*/
	if(isset($_GET['ver_compra'])){

		$cod_prod="";		
		$cod_prod=$_GET['oculto-codigo1'];	
		
		/*Realizamos la consulta de la Base de datos filtrando por el código producto*/
	 	$pdo = conexion();
		$sql = "SELECT * FROM productos where cod='".$cod_prod."'";
		$stmt = $pdo->query($sql);	

		echo "<div class='container mt-5'>";
		echo "<div class='row'>";
		echo "<div class='col-12 text-center'>";

		
		while ($row = $stmt->fetch()) {
			
			echo "<h2>".$row['nombre']."</h2>";
			echo "<img class='imagen-bici' src=../img/".$row['imagen']." >";
			echo "<h5>".$row['descripcion']."</h5>";
			echo "<h5>".$row['PVP']." €</h5>";

			$codigo=$row['cod'];
			$nombre=$row['nombre'];
			$descripcion=$row['descripcion'];
			$pvp=$row['PVP'];
		}
		echo "<button type='button' name='comprar' class='btn btn btn-success boton-comprar'>COMPRAR</button>";
		echo "<a href='../home.php' class='btn btn btn-light'>VOLVER</a>";
		echo "</div>";
		echo "</div>";
		
		echo "</div>";
	}
	elseif(isset($_GET['ver_compra2'])){
		$cod_prod2="";
		$cod_prod2=$_GET['oculto-codigo'];
		$pdo = conexion();
		$sql = "SELECT * FROM productos where cod='".$cod_prod2."'";
		$stmt = $pdo->query($sql);	

		echo "<div class='container'>";
		echo "<div class='row text-center'>";
		echo "<div class='col-12 text-center'>";

		
		while ($row = $stmt->fetch()) {
			
			$codigo=$row['cod'];
			$nombre=$row['nombre'];
			$descripcion=$row['descripcion'];
			$pvp=$row['PVP'];

			echo "<h2>".$row['nombre']."</h2>";
			echo "<img class='imagen-bici' src=../img/".$row['imagen']." >";			
			echo "<h5>".$row['descripcion']."</h5>";
			echo "<h5>".$row['PVP']." €</h5>";
			
		}
		

		echo "<button type='button' name='comprar' class='btn btn btn-success boton-comprar'>COMPRAR</button>";

		
		echo "</div>";
		echo "</div>";
		
		echo "</div>";
	}
	

}

?>
<div class="modal" id="modal-reserva" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CESTA DE LA COMPRA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <table style="border:3px solid #007bff !important;" class="border border-primary">
        	<tr class="border border-primary">
        		<td class="text-center mr-5 border border-primary p-2" colspan="3"><strong>PRODUCTO</strong></td><td class="text-center p-2"><strong>TOTAL</strong></td>
        	</tr>	
        	<tr class="border border-primary">	
        		<td class="text-center mr-5  border border-primary p-2" colspan="3"><?php echo $nombre;?></td>
        		<td class="text-center border border-primary p-2"><?php echo $pvp." €";?></td>
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary finalizar_compra" data-dismiss="modal">Finalizar compra</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>


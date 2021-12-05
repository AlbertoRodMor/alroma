<?php 
include('conexionBD/conexion.php');

error_reporting(0);
session_start();


if (!isset($_SESSION['usuarioCliente'])) {
	die("Error - debe <a href='index.php'>identificarse</a>.<br />");
}else{

	?>
	<!DOCTYPE html>
	<html>
	<head>

		<meta charset="utf-8">
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<script type="text/javascript" src="jsHome.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<style type="text/css">
		body{
			background-image: url(img/fondoLoginOpacity.jpg);
			background-size: cover;

		}
		.salir_usuario{
			color: #007bff;
			border: 0px;
			cursor: pointer;
			background-color: transparent;
		}
		.fa-shopping-cart{
			
			font-size: 40px;
    		margin-top: 10px;

		}


	</style>

<div class="container-fluid mt-3">
		<div class="row">
			<div class="offset-md-9 col-md-3 col-12 justify-content-center d-flex justify-content-md-end columna-saludo">
				<div class="imagen_saludo mr-3" style="display: grid;"><?php $saludo_usuario = ($_SESSION['usuarioCliente']);echo "Hola"." ".$saludo_usuario;?>
				
				<!-- <i class="fas fa-shopping-cart"></i> -->

				
			</div>
		</div>
	</div>
</div>
<div class="container-fluid p-0">
	<div class="row mt-5 mb-5">
		<div class="col-md-3 col-12 ml-md-5 d-flex justify-content-center justify-content-md-start icono">
			<a href="http://localhost/prueba-alroma"><img src="http://localhost/prueba-alroma/img/LOGO.png"></a>
		</div>

		<div class="ml-md-3 col-md-8 col-12 d-none align-items-center justify-content-md-end justify-content-center mt-3 mt-md-0 d-md-flex">
			<div class="d-flex">
				
				<a href="php/facturas_clientes.php">CONSULTAR FACTURAS</a><span>|</span>
				<a href="php/calendario.php" target="_blank">ALQUILA TU BICI</a><span>|</span>
				<a href="contacto.php" target="_blank">CONTACTO</a><span>|</span>
				<form action='index.php' method='post' name="form_salir">
					
					<input class="salir_usuario" name="salir" type="submit" value="SALIR">
				</form>
				

			</div>
		</div>
		<div class="ml-md-3 col-md-8 col-12 d-flex align-items-center justify-content-md-end justify-content-center mt-3 mt-md-0 d-md-none">
			<div class="d-block text-center">
				<img class="menu_movil" style="width: 30px;" src="http://localhost/prueba-alroma/img/menu_hamburguesa.png">

				<div class="menu_movil_items d-none mt-3 pl-2 pr-2">
					<a href="quienes-somos.php" target="_blank">¿QUIENES SOMOS?</a><span>|</span>
					<a href="#">CONSULTAR FACTURAS</a><span>|</span>
					<a href="php/calendario.php" target="_blank">ALQUILA TU BICI</a><span>|</span>
					<a href="contacto.php" target="_blank">CONTACTO</a><span>|</span>
					<form action='index.php' method='post' name="form_salir">

						<input class="salir_usuario" name="salir" type="submit" value="SALIR">
					</form>
				</div>
				

			</div>
		</div>


	</div>
	
	<div class="row">
		<div class="col-12">
			<div id="carousel-slider-cabecera" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="img/slider_cannondale.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="img/slider_conway_01.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="img/slider_specialized_.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carousel-slider-cabecera" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-slider-cabecera" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row mt-5 mb-5" style="margin-top: 50px;">
		<div class="col-12">

			<h1 class="text-center">PRODUCTOS DESTACADOS</h1>

		</div>
	</div>
	<div id="carousel_slider_productos" class="carousel slide" data-ride="carousel">
		
			<!-- <div class="col-12 p-0"> -->
				
					<?php 
					$vista=0;
						$contador = 0;
						$pdo = conexion();
						$sql = "SELECT * FROM productos";
						$stmt = $pdo->query($sql);
						
						

					?>
				<div class="carousel-inner">
					<div class="row">
						<?php while ($row = $stmt->fetch()){
							
							if($contador<3)	{
    		if ($vista==0) {
    			echo "<div class='carousel-item active'><div class='row'>";
    		}
    		echo "<div class='col-4 text-center'>
    		<form action='compra/productos-comprar.php' method='GET'>
    		<img class='w-50' name='imagen' src='img/".$row['imagen']."'>
    		<p class='text-center' name='nombre'>".$row['nombre']."</p>    		
    		<p class='text-center name='pvp' text-white' style='font-size: 15px;'><strong>".$row['PVP']." €</strong></p>
    		<input class='btn btn-light mb-2' style='cursor:pointer;font-weight: 700;'type='submit' name='ver_compra' id='enviar_compra' value='VER'>
    		<input type='hidden' class='oculto-codigo-carrito' name='oculto-codigo1' value='".$row['cod']."'>
    		
    		</form>
    		
    		</div>";
    		/*echo "<div class='col-4'>Total: ".$total."Contador: ".$contador." - Vista: ".$vista."</div>";    compra/carrito-compra.php*/
    		$vista++;   
    		if ($vista==3) {
    			echo "</div>";

    		?>
    		<a class="carousel-control-prev d-flex justify-content-md-start ml-3"  style="width: fit-content;" href="#carousel_slider_productos" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next d-flex justify-content-md-end mr-3" style="width: fit-content;" href="#carousel_slider_productos" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
			</a>
    		<?php	
    			echo "</div>";
    			$vista=0;
    		}

    	} else {
    		if ($vista==0) {
    			echo "<div class='carousel-item'><div class='row d-flex justify-content-center'>";
    		}
    		echo "<div class='col-4 text-center'>
    		<form action='compra/productos-comprar.php' method='GET'>
    		<img class='w-50' src='img/".$row['imagen']."'>
    		<p class='text-center'>".$row['nombre']."</p>
    		<p class='text-center text-white' style='font-size: 15px;'>".$row['descripcion']."</p>
    		<input class='btn btn-light mb-2' style='cursor:pointer;font-weight: 700;' type='submit' name='ver_compra2' id='enviar_compra' value='VER'>
    		<input type='hidden' class='oculto-codigo-carrito' name='oculto-codigo' value='".$row['cod']."'>  		
    		
			</form>
			
    		</div>";
    		/*echo "<div class='col-4'>Contador: ".$contador." - Vista: ".$vista."</div>";*/
    		$vista++;
    		if ($vista==3) {
    			echo "</div></div>";
    			$vista=0;
    		}
    	}
    	$contador++;
							
						}?>
					<a class="carousel-control-prev d-flex justify-content-md-start ml-3"  style="width: fit-content;" href="#carousel_slider_productos" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next d-flex justify-content-md-end mr-3" style="width: fit-content;" href="#carousel_slider_productos" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
						
					</div>
					
				<!-- </div> -->
			</div>
		</div>	



	</div>



</html>

<?php 
}

?>

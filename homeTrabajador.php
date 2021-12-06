
<?php
require('conexionBD/conexion.php');
session_start();
if (!isset($_SESSION['usuarioTrabajador'])) {
	die("Error - debe <a href='index.php'>identificarse</a>.<br />");

}else{ ?>

	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<script type="text/javascript" src="jsHome.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
//if(isset($_POST['terminar-reserva'])){
	// $pdo1 = conexion();
	// $sqlActualizar = "UPDATE alquiler_bicis set reserva_activa='0' WHERE codigo_reserva=".$_POST['codigo-reserva']; 
 //  	$consulta=$pdo1->prepare($sqlActualizar);
 //  	$consulta->bindParam(':stockRestante',$stockRestante,PDO::PARAM_INT);
 //  	$consulta->execute(); 
 //  	select del stock actual de ese codigo de bici y sumarlo a $_POST['cantidad_alquilada']
 //  	coger las cantidades alquiladas de ese codigo reserva y sumarlo al stock del id de esa bici en bicis alquiler
 //  	$selectStockActual="";
 //  	$stockActual=$row['stock'];//select del stock actual de ese codigo de bici;
 //  	$stockFinal=$stockActual+$_POST['cantidad-alquilada'];
 //  	$sqlActualizar = "UPDATE bicis_alquiler set stock='".$stockFinal."' WHERE cod=".$_POST['cod-alquilada']; 
 //  	$consulta=$pdo1->prepare($sqlActualizar);
 //  	$consulta->bindParam(':stockRestante',$stockRestante,PDO::PARAM_INT);
 //  	$consulta->execute();
  	?>
<?php
// }
// if(isset($_POST['terminar-reserva'])){ ?>
<!-- <script type="text/javascript">
	jQuery(document).ready(function(){jQuery('.boton_alquiler').click();});
</script> -->

<?php
// }
?>
	</head>
	<style type="text/css">
		body{
			background-image: url(img/fondoLoginOpacity.jpg);
			background-size: cover;

		}	

		.dropdown-menuTrabajadores{
			top: -2px !important;
		}
		.dropdown-menuTrabajadores .dropdown-item:hover{

			color: white;
			background-color: #117a8b;

		}
		#tablaTrabajadores{
			border: 2px solid #17a2b8;
			border: 20px !important;
		}
		#tablaTrabajadores tr td{
			border: 2px solid #17a2b8;
		}
		#tablaTrabajadores button img{
			
			width: 30px;
		}
		button.boton_anadir_trabajador{
			background-color: transparent;
			border: 0px;
			cursor: pointer;
		}
		button.boton-ver-trabajadores{
			background-color: transparent;
			border: 0px;
			cursor: pointer;
		}
		button.boton-ver-trabajadores img{

			width: 30px;
			
		}
		#tablaTrabajadores input[type=text]{
			border: 0px;
			border-radius: 15px;
		}
		.tarjeta1,.tarjeta2,.tarjeta3{

			background-color: transparent;
			border: 0px;
		}
		#tablaTrabajadores .fila-cabecera {
			background-color: #007bff;
			color: white;
		}
		body .icono a{
			background-color: transparent !important;
			border: 0px !important;
		}
		button:hover,a:hover{
			background-color: white !important;
			color: black !important;
			border: 1px solid black;
		}
		input.texto_nombre_factura::placeholder {
			font-size: 12px !important;
		}

	</style>

	<body>
		<div class="container-fluid mt-3">
			<div class="row">
				<div class="offset-md-9 col-md-3 col-12 justify-content-center d-flex justify-content-md-end columna-saludo">
					<div class="imagen_saludo mr-3" style="display: grid;">
						<?php $saludo_usuario = ($_SESSION['usuarioTrabajador']);echo "Hola"." ".$saludo_usuario;?>				
						<!-- 	<i class="fas fa-shopping-cart"></i> -->				
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

					<form action='index.php' method='post' name="form_salir">					
						<input class="salir_usuario" name="salir_trabajador" type="submit" value="SALIR">
					</form>

				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php 
					$pdo = conexion();
					$sql = "SELECT id_trabajador from login_trabajadores where user='".$_SESSION['usuarioTrabajador']."'";
					$stmt = $pdo->query($sql);
					$row = $stmt->fetch(); 
					
					?>	

					<p>
						<a class="btn btn-primary boton_trabajadores_click" data-toggle="collapse" href="#trabajadores" role="button" aria-expanded="false" aria-controls="trabajadores">TRABAJADORES</a>
						<button class="btn btn-primary facturas_boton_deplegar" type="button">FACTURAS</button>
						<!-- <a class="btn btn-primary" href="php/calendario.php">ALQUILER DE BICIS</a> -->
						<button class="btn btn-primary boton_alquiler" data-toggle="collapse" href="#alquiler" role="button" aria-expanded="false" aria-controls="alquiler">ALQUILER DE BICIS</button>
					</p>
					<div class="row">
						<div class="col-12">
							<div class="collapse" id="trabajadores">
								<div class="card card-body tarjeta1 row">
									<div class="col-12">
										<?php if($row['id_trabajador'] == 1){ ?>
											<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' id='formulario_insertar_trabajador'>
												<table id="tablaTrabajadores" class="">
													<tbody>	
														<tr class="text-center fila-cabecera" >
															<td class="p-2" style="font-weight: bolder;">NOMBRE</td>
															<td class="p-2" style="font-weight: bolder;">APELLIDOS</td>
															<td class="p-2" style="font-weight: bolder;">USUARIO</td>
															<td class="p-2" style="font-weight: bolder;">CONTRASEÑA</td>							
														</tr>
														<tr>
															<td class="p-2"><input type="text" name="insertNombreTr"></td>
															<td class="p-2"><input type="text" name="insertApellTr"></td>
															<td class="p-2"><input type="text" name="insertUsuarioTr"></td>
															<td class="p-2"><input type="text" name="insertPassTr"></td><td class="p-2"><button class="boton_anadir_trabajador"><img src="img/mas.png"></button><!-- ----<button class="boton-ver-trabajadores" name="boton-ver-trabajadores"><img src="img/ojo.png"></button> --></td>
														</tr>
													</tbody>	
												</table>		
											</form>
										<?php } ?>
										<div class="listado-ver-trabajadores">

										</div>


									</div>
								</div>
							</div>
						</div>
						

					</div>
							<!-- <div class="col">
								<div class="collapse" id="alquiler">
									<div class="card card-body tarjeta3">
										
									</div>
								</div>
							</div> -->

							<div class="d-none" id="facturas">
								<div class="card card-body tarjeta2">
									<div class="col-12">
										<h2 class="text-white text-center">FACTURAS <i style="font-size: 20px" title="Buscar facturas por nombre"  class="fas fa-info-circle"></i></h2>	
									</div>
									<div class="col-12 mt-4 d-flex justify-content-center align-items-center">
										
										<form class="mt-3 buscador_facturas" name="buscador_facturas" method="POST" action="php/facturas.php">
											<div class="d-flex">
												<input class="mr-3 texto_nombre_factura" type="text" placeholder="Buscar por nombre del cliente" name="buscar_nombre">
												<!-- <input class="mr-3" type="date" name="buscar_fecha"> -->
												<button class="buscar_facturas btn btn-primary mr-3" name="buscar_facturas">BUSCAR FACTURAS</button>
												
											</div>
										</form>
										<button class="crear_facturas btn btn-primary mr-3">CREAR FACTURAS</button><button class="crear_facturas_noregistro btn btn-primary">CREAR FACTURAS NO REGISTRO</button>
										<div class="contenedor-facturas"></div>
									</div>
									<div class="contenedor-crear-facturas d-none">
										<div class="col-12">

											<form action='php/facturas.php' method='POST' id="form_crear_factura">
												<label for="nombre_factura">NOMBRE DEL CLIENTE</label>
												<input type="text" id="nombre_factura" value="" name="nombre_factura"><br>
												<label for="articulo_factura">ARTÍCULO</label>
												<input type="text" value="" name="articulo_factura"><br>
												<label for="cantidad_factura">CANTIDAD</label>
												<input type="text" value="" name="cantidad_factura"><br>
												<label for="PVP">PVP DEL ARTÍCULO</label>
												<input type="text" value="" name="pvp_factura"><br>
												<label for="total">TOTAL DE LA FACTURA</label>
												<input type="text" value="" name="total_factura"><br>
												<button class="mt-4 insertar_facturas btn btn-primary mr-3" name="insertar_facturas">INSERTAR FACTURAS</button>
												<input class="mt-4 btn btn-primary" type="reset" name="" value="LIMPIAR">
											</form>

										</div>
									</div>
									<div class="contenedor-crear-facturas-noregistro d-none">
										<div class="col-12">

											<form action='php/facturas.php' method='POST' id="form_crear_factura">
												<label for="nombre_factura">NOMBRE DEL CLIENTE</label>
												<input type="text" id="nombre_factura" value="" name="nombre_factura"><br>
												<label for="articulo_factura">ARTÍCULO</label>
												<input type="text" value="" name="articulo_factura"><br>
												<label for="cantidad_factura">CANTIDAD</label>
												<input type="text" value="" name="cantidad_factura"><br>
												<label for="PVP">PVP DEL ARTÍCULO</label>
												<input type="text" value="" name="pvp_factura"><br>
												<label for="total">TOTAL DE LA FACTURA</label>
												<input type="text" value="" name="total_factura"><br>
												<button class="mt-4 insertar_facturas_noregistro btn btn-primary mr-3" name="insertar_facturas_noregistro">INSERTAR FACTURAS NO REGISTRO</button>
												<input class="mt-4 btn btn-primary" type="reset" name="" value="LIMPIAR">
											</form>

										</div>
									</div>
								</div>
							</div>
							<div class="collapse" id="alquiler" >
								<div class="card card-body">

									<?php 

									$pdo = conexion();
									$sqlVerAlquileres = "SELECT * FROM alquiler_bicis order by fecha_fin DESC";
									$stmt = $pdo->query($sqlVerAlquileres);
									echo "<div class='row'>";
									echo  "<div class='col-12'>";
									echo "<table style='border:3px solid'>";
									echo "<thead style='border:3px solid'>";
									echo "<th style='border:3px solid' class='text-center'>Código Reserva</th>";
									echo "<th style='border:3px solid' class='text-center'>Id bicicleta</th>";
									echo "<th style='border:3px solid' class='text-center'>Nombre Arrendatario</th>";
									echo "<th style='border:3px solid' class='text-center'>Fecha de Inicio</th>";
									echo "<th style='border:3px solid' class='text-center'>Fecha de Fin</th>";
									echo "<th style='border:3px solid' class='text-center'>Cantidad de bicicletas a alquilar</th>";
									echo "<th style='border:3px solid' class='text-center'>Total Importe</th>";
									// echo "<th style='border:3px solid' class='text-center'>Reserva activa</th>";
									echo "</thead>";
									echo "<tbody style='border:3px solid'>";
									while($rowAlquiler = $stmt->fetch()){										   
										echo "<tr>";												
										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['codigo_reserva']."</td>";												
										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['id_bici']."</td>";												
										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['nombre_arrendatario']."</td>";												
										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['fecha_inicio']."</td>";	

										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['fecha_fin']."</td>";
										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['cantidad_alquilada']."</td>";
										echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['Total_importe']."</td>";	
										// if(date('Y-m-d')==$rowAlquiler['fecha_fin'] && $rowAlquiler['reserva_activa']!=0){
										// 	echo "<td style='background-color: red;border:3px solid' class='text-center'>".$rowAlquiler['fecha_fin']."</td>";
										// }else if($rowAlquiler['reserva_activa']==0){
										// 	echo "<td style='background-color: green;border:3px solid' class='text-center'>".$rowAlquiler['fecha_fin']."</td>";	
										// } else{
										// 	echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['fecha_fin']."</td>";
										// }						
																						
										// echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['cantidad_alquilada']."</td>";												
										// echo "<td style='border:3px solid' class='text-center'>".$rowAlquiler['Total_importe']."</td>";
										//if($rowAlquiler['reserva_activa']==1){ ?>
											<!-- <td style='border:3px solid' class='text-center'>Si
											<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="terminarReserva">
												<input type="submit" name="terminar-reserva" value="¿Terminar reserva?">
												<input type="hidden" name="codigo-reserva" value="<?php //echo $rowAlquiler['codigo_reserva'];?>">
												<input type="hidden" name="cantidad-alquilada" value="<?php //echo $rowAlquiler['cantidad_alquilada'];?>">
												<input type="hidden" name="cod-alquilada" value="<?php //echo $rowAlquiler['id_bici'];?>">
											</form>
											</td> -->
											<?php
										// } else if($rowAlquiler['reserva_activa']==0){
										// 	echo "<td style='border:3px solid' class='text-center'>No</td>";	
										// }
										
										echo "</tr>";											
									}
									echo "</tbody>";
									echo "</div>";
									echo "</div>";
									?>
								</div>
							</div>

						</div>										
					</div>

				</div>
			</div>		
		</body>
		</html>
	<?php }

?>
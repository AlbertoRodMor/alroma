
<?php 
require('conexionBD/conexion.php');
// error_reporting(0);
?>
<!DOCTYPE html>
<html>
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
	
	<script type="text/javascript" src="js.js"></script>

</head>
<header>
	<style type="text/css">
	.error{
		border: 3px solid red;
	}
</style>
<?php
session_start(); 
if(isset($_POST['salir'])){
	unset($_SESSION['usuarioCliente']);
}
if(isset($_POST['salir_trabajador'])){
	unset($_SESSION['usuarioTrabajador']);
}
?>
<div class="container-fluid">
	<div class="row mt-5 mb-5">
		<div class="col-md-4 col-12 ml-md-5 d-flex justify-content-center justify-content-md-start icono">
			<a href="http://localhost/prueba-alroma"><img src="http://localhost/prueba-alroma/img/LOGO.png"></a>
		</div>

		<div class="ml-md-3 col-md-7 col-12 d-flex align-items-center justify-content-md-end justify-content-center mt-3 mt-md-0">
			<div class="d-flex">
				<a class="enlaces-login mr-2" id="enlace-login-trabajador" href="#">Trabajador</a><span>|</span>
				<a class="enlaces-login ml-2" id="enlace-login-cliente" href="#">Cliente</a>
			</div>
		</div>


	</div>
</div>
</header>
<body>
	<div class="container">

		<div class="row">
			<div class="col-12 text-center mx-auto columna-bienvenida text-center">
				<p class="text-center" style="position: absolute;">Hola bienvenido a ALROMA, tratamos a tu bici como algo más que un simple objeto, miramos por calidad, confianza y progreso. Nos adaptamos a todas las circunstancias.<br> ¡Ven y haz de ALROMA tu taller de confianza, algo más que un taller!</p>
				<img class="img-fluid mx-auto" src="http://localhost/prueba-alroma/img/LOGO.png">

			</div>
		</div>
		<div class="row mt-5 mb-5 fila-login-trabajador d-none">
			<div class="col-12 d-flex justify-content-center logo-login-trabajador">
				<img class="img-fluid" src="img/LOGO.png">
				<div style="position: absolute;" class="text-center">
					<form method='POST' action="<?php echo $_SERVER['PHP_SELF']?>" id="form-trabajador-ajax">
						<fieldset style="border: 1px solid;">
							<legend class="text-center pl-2 pr-2" style="width: fit-content;">Login para trabajadores</legend>

							<div class='user'>
								<label for='usuario'>Usuario:</label><br/>
								<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
								<input type='text' name='usuarioTrabajador' id='usuarioTrabajador' maxlength="50" /><br/>
							</div>
							<div class='pass'>
								<label for='password'>Contraseña:</label><br/>
								<input type='current-password' name='passwordTrabajador' id='passwordTrabajador' maxlength="50" required="true" /><br/>
							</div>
							<div id="respuesta"></div>
							<div class='boton-enviar d-flex justify-content-center mt-5 mt-3 mb-3'>							
								<input id="boton-submit-trabajadores" type="button" name='enviarTrabajadores' value='ENVIAR'/>
							</div>
						</fieldset>
					</form>					
				</div>
			</div>
		</div>
		<div class="row mt-5 mb-5 fila-login-clientes d-none">
			<div class="col-12 d-flex justify-content-center logo-login-clientes">
				<img class="img-fluid" src="/img/LOGO.png">
				<div style="position: absolute;">
					<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' id="form-cliente-ajax">
						<fieldset class="text-center" style="border: 1px solid;">
							<legend class="text-center pl-2 pr-2" style="width: fit-content;">Login para clientes</legend>

							<div class='user'>
								<label for='usuarioCli'>Usuario:</label><br/>
								<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
								<input type='text' name='usuarioCli' id='usuarioClientes' maxlength="50" /><br/>
							</div>
							<div class='pass'>
								<label for='passwordCli'>Contraseña:</label><br/>
								<input type='current-password' name='passwordCli' id='passwordCliente' maxlength="50" /><br/>
							</div>
							<div id="respuestaCliente"></div>
							<div class='boton-enviar d-flex justify-content-center mt-3 mb-3'>
								<input type='button' id="boton-submit-clientes" name='enviar' value='ENVIAR' />
							</div>
							<div class="mt-3 ml-2 mr-2">
								Si todavía no tienes una cuenta, rellena el <a href="#" id="enlace-registro-login">siguiente formulario !!</a>
							</div>
						</fieldset>

					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="modal" id="popup-registro-cliente" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Regístrese como cliente</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="formulario-registro">
									<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id="form-registro-clientes-ajax">
										<fieldset class="text-center" style="border: 1px solid;">
											<legend class="text-center pl-2 pr-2" style="width: fit-content;font-weight: 600;">REGISTRATE</legend>

											<div class='apelnom'>
												<label for='apelnom'>Nombre y apellidos:</label><br/>
												<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
												<input type='text' name='apelnom' id='apelnom' maxlength="50" required="true"/><br/>
											</div>
											<div class='direccion'>
												<label for='direccion'>Dirección:</label><br/>
												<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
												<input type='text' name='direccion' id='direccion' maxlength="50" required="true" /><br/>
											</div>
											<div class='telefono_registro'>
												<label for='telefono-registro'>Teléfono:</label><br/>
												<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
												<input type='text' name='telefono_registro' id='telefono-registro' maxlength="50" required="true" /><br/>
											</div>
											<div class='email'>
												<label for='email-registro'>Correo electrónico:</label><br/>
												<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
												<input type='email' name='email_registro' id='email_registro' maxlength="50" /><br/>
											</div>
											<div class='user'>
												<label for='usuario_registro'>Usuario:</label><br/>
												<!-- Utilizamos HTML 5 para que todos los campos de entrada sean obligatorios -->
												<input type='text' name='usuario_registro' id='usuario_registro' maxlength="50" /><br/>
											</div>
											<div class='pass'>
												<label for='password_registro'>Contraseña:</label><br/>
												<input type='current-password' name='password_registro' id='password_registro' maxlength="50" /><br/>
											</div>
											<div id="respuestaRegistro"></div>
											<div class='boton-enviar d-flex justify-content-center mt-3 mb-3'>
												<input type='button' id="boton-submit-registro" name='enviarRegistro' value='ENVIAR' />
											</div>

										</fieldset>

									</form>
								</div>
							</div>
							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-primary">Save changes</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</footer>
	</html>
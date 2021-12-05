<style type="text/css">body{
			background-image: url(img/fondoLoginOpacity.jpg);
			background-size: cover;

		}
</style>
<?php 

$_POST['usuario_registro'] = $usuario_registro;
$_POST['email_registro'] = $email; 
$_POST['direccion'] = $direccion;
$_POST['apelnom'] = $nombre_cliente;
$_POST['email']	  = $correo_cliente;

echo "Hola"." ".$nombre_cliente." gracias por contactar con nosotros en breves recibiras un correo al ".$correo_cliente." con noticias sobre tu nueva cuenta. Si tienes alguna duda puede contactar con nosotros a traves del número: <a href='tel:000000000'>000000000</a>";
	

?>
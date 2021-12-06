<?php 
require('../conexionBD/conexion.php');

if(($_POST['insertNombreTr'] != "") or ($_POST['insertApellTr'] != "") or ($_POST['insertUsuarioTr'] != "") or $_POST['insertPassTr'] != "")  {
	
	$nombreTrab   = $_POST['insertNombreTr'];
	$apellTrab    = $_POST['insertApellTr'];
	$usuarioTrab  = $_POST['insertUsuarioTr'];
	$passTrab	  = $_POST['insertPassTr'];

	$pdo = conexion();
	$sql = "INSERT INTO login_trabajadores (nombre,apellidos,user,pass) VALUES (?,?,?,?)";
	$pdo->prepare($sql)->execute([$nombreTrab, $apellTrab, $usuarioTrab,$passTrab]);
	echo "true"; 
}
else{
	echo "false";
}	


?>
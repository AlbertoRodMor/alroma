<?php 
require_once('../conexionBD/conexion.php');
/*AQUÍ COMPROBAMOS QUE LOS CAMPOS DE LA TABLA DONDE VAMOS A INGRESAR A UN TRABAJADOR ESTÉN RELLENAS, Y SI ES ASÍ INGRESAMOS ESE TRABAJADOR EN NUESTRA BD EN LA TABLA
DE LOS TRABAJADORES*/



	$nombreTrab   = $_POST['nombreTrabajador'];
	$apellTrab    = $_POST['ApellTr'];
	$usuarioTrab  = $_POST['UsuarioTr'];
	$passTrab	  = $_POST['PassTr'];

if(($nombreTrab != "") && ($apellTrab != "") && ($usuarioTrab != "") && ($passTrab != ""))  {
	
	$pdo = conexion();
	$sql = "INSERT INTO login_trabajadores (nombre,apellidos,user,pass) VALUES (?,?,?,?)";
	$pdo->prepare($sql)->execute([$nombreTrab, $apellTrab, $usuarioTrab,$passTrab]);
	
	echo $usuarioTrab; 
}
else{
	echo false;
}	


?>
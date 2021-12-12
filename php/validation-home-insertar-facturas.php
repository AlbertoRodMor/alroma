<?php 
require('../conexionBD/conexion.php');
	
setlocale(LC_ALL,"es_ES");
/*REALIZAMOS UNA CONSULTA A LA TABLA DE LOS CLIENTES Y DE LAS FACTURAS QUE PERTENEZCAN A DICHO CLIENTE PARA SABER POR EL NOMBRE DEL CLIENTE REGISTRADO QUE ID TIENE, Y ASI ASIGNARLE SU FACTURA*/
$pdo = conexion();

$nombreCli = "";
$articulo = "";
$cantidad = "";
$pvp_articulo = "";
$total_factura = "";


 $nombreCli = $_POST['nombreClienteFactura'];
 $articulo = $_POST['articulo_factura'];
 $cantidad = $_POST['cantidad_factura'];
 $pvp_articulo = $_POST['pvp_factura'];
 $total_factura = $_POST['total_factura'];

$sql = "SELECT login_clientes.id_cliente FROM login_clientes join facturas on login_clientes.id_cliente = facturas.id_cliente WHERE apenom_cliente='".$nombreCli."'";

$stmt = $pdo->query($sql); 

$row = $stmt->fetch();


$id_cliente_consulta = $row['id_cliente'];
$hoy = date("Y-m-j"); 

/*AQUÍ INSERTAMOS UNA FACTURA PARA UN CLIENTE EN CONCRETO*/
$sqlInsertar = "INSERT INTO facturas (id_cliente,fecha_factura,articulo,cantidad,PVP,total) VALUES (?,?,?,?,?,?)";

    $stmt2= $pdo->prepare($sqlInsertar);

    $stmt2->execute([$id_cliente_consulta,$hoy, $articulo,$cantidad,$pvp_articulo,$total_factura]);

	echo "<span class='registroCorrecto'>FACTURA AGREGADA CORRECTAMENTE</span>";


?>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
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
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.btn-success').click(function(){

                window.print();

            });
        });
    </script> 
</head>
<body>
<?php 
require('../conexionBD/conexion.php');
// error_reporting(0);
session_start();

$usuario_cliente = $_SESSION['usuarioCliente'];
$pdo = conexion();

$sql = "SELECT id_cliente FROM login_clientes where usuario_cliente='".$usuario_cliente."'";

$stmt = $pdo->query($sql);
$row = $stmt->fetch();

$sqlFacturas = "SELECT fecha_factura,articulo,cantidad,PVP,total from facturas where id_cliente=".$row['id_cliente'];
$stmt2 = $pdo->query($sqlFacturas);

while($row = $stmt2->fetch()){ ?>

		
	<table class="tabla_muestra_facturas mb-3 mt-3 table">
                            <thead class="thead-dark">

                                <tr class="cabecera_tabla text-center">

                                    <th class="thead-dark">FECHA</th>
                                    <th class="thead-dark">ARTÍCULO</th>
                                    <th class="thead-dark">CANTIDAD</th>
                                    <th class="thead-dark">PVP</th>
                                    <th class="thead-dark">PVP TOTAL(21% IVA)</th>

                                </tr>
                            </thead>
                            <tbody>
                            		
                                <tr class="cabecera_tabla text-center">
                                    <?php
                                    echo "<td>".$row['fecha_factura']."<br></td>";
                                    echo "<td>".$row['articulo']."<br></td>";
                                    echo "<td>".$row['cantidad']."<br></td>";
                                    echo "<td>".$row['PVP']."<br></td>";
                                    echo "<td>".$row['total']."<br></td>";

                                    

                                    echo "</tr>" ?>
                                </tr>
                            </tbody>
                        </table>
<?php }
?>
<div class="col-12 d-flex justify-content-center mt-3">    
        <button class="btn btn-success mr-3">IMPRIMIR</button>
        <a href="../home.php" class="btn btn-secondary">VOLVER</a>
</div>
</body>
</html>
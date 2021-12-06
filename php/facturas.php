<html>
<head>
    <meta charset="utf-8">
    <title>Facturas</title>
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
</head>
<body>



    <?php 
    require('../conexionBD/conexion.php');
    error_reporting(0);
    setlocale(LC_ALL,"es_ES");

    $pdo = conexion();

    if(isset($_POST['buscar_facturas'])){

        $nombre_buscar_cliente = "";
        $nombre_buscar_cliente = $_POST['buscar_nombre'];

        $sql = "select facturas.id_cliente from login_clientes join facturas on login_clientes.id_cliente=facturas.id_cliente where login_clientes.apenom_cliente='".$nombre_buscar_cliente."'";

        $stmt = $pdo->query($sql); 

        $row = $stmt->fetch();
        $id_cliente_buscar = $row['id_cliente'];

        $sqlMostrar = "select * from facturas where id_cliente='".$id_cliente_buscar."'";
        $stmt1 = $pdo->query($sqlMostrar);
        $row1 = $stmt1->fetch();

        ?>
        <style type="text/css">
            .tabla_muestra_facturas tr, .tabla_muestra_facturas td,.tabla_muestra_facturas th{
                border: 2px solid;
                text-align: center;
                padding: 5px;
            }
        </style>
        <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.fa-print').click(function(){

                window.print();

            });
        });
        </script>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-center mt-5 mb-5">FACTURAS DEL CLIENTE</h2><br><i class="fa fa-print" aria-hidden="true"></i>
                    <?php        for ($i=0; $i<count($row1); $i++){  

                        ?>

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
                                    echo "<td>".$row1['fecha_factura']."<br></td>";
                                    echo "<td>".$row1['articulo']."<br></td>";
                                    echo "<td>".$row1['cantidad']."<br></td>";
                                    echo "<td>".$row1['PVP']."<br></td>";
                                    echo "<td>".$row1['Total']."<br></td>";

                                    $row1 = $stmt1->fetch();

                                    echo "</tr>" ?>
                                </tr>
                            </tbody>
                        </table>

                    <?php } ?>
                     <a href="../homeTrabajador.php" class="btn btn-secondary">VOLVER</a>
                </div>
            </div>
        </div>


    <?php }elseif(isset($_POST['insertar_facturas_noregistro'])){
        $nombreCli = "";
        $articulo = "";
        $cantidad = "";
        $pvp_articulo = "";
        $total_factura = "";

        $nombreCli = $_POST['nombre_factura'];
        $articulo = $_POST['articulo_factura'];
        $cantidad = $_POST['cantidad_factura'];
        $pvp_articulo = $_POST['pvp_factura'];
        $total_factura = $_POST['total_factura'];

        
           $hoy = date("Y-m-j"); 

        $separador = ",";

        $cadenaArticulos = $articulo;
        $separadaArt = explode($separador, $cadenaArticulos);

        $cadenaCantidad = $cantidad;
        $separadaCant = explode($separador, $cadenaCantidad);

        $cadenaPVP = $pvp_articulo;
        $separadaPVP = explode($separador, $cadenaPVP);


        $sum_total = array_sum($separadaPVP);

$totalIVA = ((float)$sum_total * 21) / 100; // Regla de tres
$totalIVA = round($totalIVA, 2);  // Redondear a dos decimales

$total_facturaIVA = $sum_total + $totalIVA;



$sqlInsertar = "INSERT INTO facturas (id_cliente,fecha_factura,articulo,cantidad,PVP,total) VALUES (?,?,?,?,?,?)";


$stmt2= $pdo->prepare($sqlInsertar);

$stmt2->execute([0,$hoy, $articulo,$cantidad,$pvp_articulo,$total_factura]);

?>
<style type="text/css">

    .tabla_facturas th, tr,td{
        border: 3px solid;
        padding: 5px;
    }    
      
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.btn-success').click(function(){

                window.print();

            });
        });
    </script>    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <table class="tabla_facturas">
                    <thead>
                        <th colspan="4">NOMBRE DEL CLIENTE: <?php echo $nombreCli; ?></th>
                        <tr class="cabecera_tabla text-center">

                            <th>ARTÍCULO</th>
                            <th>CANTIDAD</th>
                            <th>PVP</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php  
                        $array_todo = array();
                        for ($i=0; $i<count($separadaArt); $i++) { ?>

                          <tr class="cabecera_tabla text-center">
                            <?php    echo "<td>".$separadaArt[$i]."</td><td>".$separadaCant[$i]."</td><td>".$separadaPVP[$i]." €</td>"; ?>        
                        </tr>

                        <?php  
                    } 
                    ?>

                    <tr>
                        <th>TOTAL (CON IVA)</th>
                        <td colspan="4" class="text-right">
                            <?php echo $total_facturaIVA; ?> € 
                        </td>
                    </tr>   


                </tbody>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-center mt-3">    
            <button class="btn btn-success mr-3">IMPRIMIR</button>
            <a href="../homeTrabajador.php" class="btn btn-secondary">VOLVER</a>
        </div>
    </div>
</div>
</body>
</html>
<?php } 
    elseif(isset($_POST['insertar_facturas'])){

        $nombreCli = "";
        $articulo = "";
        $cantidad = "";
        $pvp_articulo = "";
        $total_factura = "";


        $nombreCli = $_POST['nombre_factura'];
        $articulo = $_POST['articulo_factura'];
        $cantidad = $_POST['cantidad_factura'];
        $pvp_articulo = $_POST['pvp_factura'];
        $total_factura = $_POST['total_factura'];


        $sql = "SELECT id_cliente FROM login_clientes WHERE apenom_cliente='".$nombreCli."'";

        $stmt = $pdo->query($sql); 

        $row = $stmt->fetch();


        $id_cliente_consulta = $row['id_cliente'];

        $hoy = date("Y-m-j"); 

        $separador = ",";

        $cadenaArticulos = $articulo;
        $separadaArt = explode($separador, $cadenaArticulos);

        $cadenaCantidad = $cantidad;
        $separadaCant = explode($separador, $cadenaCantidad);

        $cadenaPVP = $pvp_articulo;
        $separadaPVP = explode($separador, $cadenaPVP);


        $sum_total = array_sum($separadaPVP);

$totalIVA = ((float)$sum_total * 21) / 100; // Regla de tres
$totalIVA = round($totalIVA, 2);  // Redondear a dos decimales

$total_facturaIVA = $sum_total + $totalIVA;



$sqlInsertar = "INSERT INTO facturas (id_cliente,fecha_factura,articulo,cantidad,PVP,total) VALUES (?,?,?,?,?,?)";


$stmt2= $pdo->prepare($sqlInsertar);

$stmt2->execute([$id_cliente_consulta,$hoy, $articulo,$cantidad,$pvp_articulo,$total_factura]);

?>
<style type="text/css">

    .tabla_facturas th, tr,td{
        border: 3px solid;
        padding: 5px;
    }    
      
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.btn-success').click(function(){

                window.print();

            });
        });
    </script>    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <table class="tabla_facturas">
                    <thead>
                        <th colspan="4">NOMBRE DEL CLIENTE: <?php echo $nombreCli; ?></th>
                        <tr class="cabecera_tabla text-center">

                            <th>ARTÍCULO</th>
                            <th>CANTIDAD</th>
                            <th>PVP</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php  
                        $array_todo = array();
                        for ($i=0; $i<count($separadaArt); $i++) { ?>

                          <tr class="cabecera_tabla text-center">
                            <?php    echo "<td>".$separadaArt[$i]."</td><td>".$separadaCant[$i]."</td><td>".$separadaPVP[$i]." €</td>"; ?>        
                        </tr>

                        <?php  
                    } 
                    ?>

                    <tr>
                        <th>TOTAL (CON IVA)</th>
                        <td colspan="4" class="text-right">
                            <?php echo $total_facturaIVA; ?> € 
                        </td>
                    </tr>   


                </tbody>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-center mt-3">    
            <button class="btn btn-success mr-3">IMPRIMIR</button>
            <a href="../homeTrabajador.php" class="btn btn-secondary">VOLVER</a>
        </div>
    </div>
</div>
</body>
</html>
<?php }?>
<?php 
require('../conexionBD/conexion.php');
error_reporting(0);
session_start();
$pdo = conexion();


?>
<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Calendario Reservas</title>
	<meta charset='utf-8' />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../estilos.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<script type="text/javascript" src="../jsHome.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<link href='../fullcalendar/main.css' rel='stylesheet' />
	<script src='../fullcalendar/main.js'></script>
</head>	
<style type="text/css">
	#tabla-alquileres-bicis tr,#tabla-alquileres-bicis td,#tabla-alquileres-bicis th{

		border: 3px solid black;
		padding: 5px;
    vertical-align: middle;


	}
	#popupbicisdisponibles{
		  overflow: scroll;
	}
	img.imagen_bici {
    
    
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;
	
	}
	.transition {
    -webkit-transform: scale(3); 
    -moz-transform: scale(3);
    -o-transform: scale(3);
    transform: scale(3);
	}
	.enlace_reservar:hover{
		background-color: black;
		color: white !important;
	}
	.modal-dialog {
    max-width: 555px !important;
    
	}
	.fc-day:hover {

		-webkit-box-shadow: 5px 5px 3px 0px rgb(0 0 0 / 75%) !important;
		-moz-box-shadow: 5px 5px 3px 0px rgb(0 0 0 / 75%) !important;
		box-shadow: 5px 5px 3px 0px rgb(0 0 0 / 75%) !important;
	}
</style>
<body>
<?php
//jesus
					$selectFechasOcupadas = "SELECT fecha_inicio,fecha_fin,cantidad_alquilada FROM `alquiler_bicis`";

					$consultafechasOcupadas = $pdo->query($selectFechasOcupadas);	
					$fechasOcupadas = $consultafechasOcupadas->fetch();
					while($fechasOcupadas = $consultafechasOcupadas->fetch()){
						echo $fechasOcupadas['cantidad_alquilada']."bicis ocupada desde: ".$fechasOcupadas['fecha_inicio']." a ".$fechasOcupadas['fecha_fin']."<br>";


$begin = new DateTime( $fechasOcupadas['fecha_inicio'] );
$end = new DateTime( $fechasOcupadas['fecha_fin'] );
$end = $end->modify( '+1 day' ); 

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);

foreach($daterange as $date){
    echo $date->format("Y-m-d") . "<br>";
    echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery(".fc-daygrid-day[data-date='.$date->format("Y-m-d").'] > div").append("<span class=\'ocupado\'>*</span>");

    

    });
    </script>';
}
							echo "<br><br>";
					}

?>
<script type="text/javascript">
	/*jQuery(document).ready(function(){
		jQuery(".fc-next-button").click(function(e){
			e.preventDefault();
			//alert("clicko");
			jQuery(".fc-daygrid-day").each(function(){
				console.log("ocupado: "+jQuery(this).find(".ocupado").length);
				if(jQuery(this).find(".ocupado").length>0){

					alert(jQuery(this).attr("data-date")+" "+jQuery(this).find(".ocupado").length);
				}
				
			});
		});

	});*/
</script>

<!--fin jesus	-->
	<div class="modal" id="popupbicisdisponibles" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ELIGE TU BICI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabla-alquileres-bicis" class="table"> 
					<thead class="thead-dark">

					<tr class="table-primary">
						
						<th class="text-center text-white thead-dark">IMAGEN</th>
						<th class="text-center text-white thead-dark">BICI</th>
						<th class="text-center text-white thead-dark">CANTIDAD DISPONIBLE</th>
					</tr>
					
				  </thead>
				  <tbody>	
				<?php 	
					$sqlMostrar = "SELECT imagen,nombre,stock from bicis_alquiler";

					$stmt3 = $pdo->query($sqlMostrar);	
					$row = $stmt3->fetch();
					$contador=0;
					while($row = $stmt3->fetch()){
						$contador++;

						  echo "<form action='reserva_bicis.php' method='POST'>";//reserva_bicis.php
							echo "<tr class='text-center'><td class='text-center'><img class='imagen_bici mx-auto' width='150px' src='../img/".$row['imagen']."'></td>";
							echo "<td class='text-center'>".$row['nombre']."</td>
									  <td class='stock text-center' name='stock".$contador."'>".$row['stock']."</td>
									  <input type='hidden' name='stock".$contador."' value='".$row['stock']."'/>
									  <input type='hidden' name='nombre' value='".$row['nombre']."'/> 
									  <td><input style='cursor:pointer;' type='submit' value='RESERVAR' name='boton_reserva' class='text-center boton_reserva'></td>
									  </tr>
									  <input type='hidden' name='fechaCLicada' value=''>";
							?>
							
							
							<script type="text/javascript">
								jQuery(document).ready(function(){
									jQuery('.fc-daygrid-day').click(function(){
										jQuery('input[name="fechaCLicada"]').val(jQuery(this).find(".fc-daygrid-day-number").attr('aria-label'));
								});
								});
							</script>
							<?php		  
							echo "</form>";		  
							
					}
					$row = $stmt3->fetch();
					
				?>
				</tbody>
				</table>
      </div>
      
      <script>

		document.addEventListener('DOMContentLoaded', function() {
			


			/*SCRIPT PARA AUMENTAR LA IMAGEN AL HACER HOVER EN ELLA*/

			$(document).ready(function(){
    	$('.imagen_bici').hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    	 });
		});


			/*SCRIPTS PARA PINTAR EL CALENDARIO EN EL DIV CALENDAR*/
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth'
			});
			calendar.render();
			var divPrueba = document.createElement("div");
			document.getElementById('calendar').append(divPrueba);
			divPrueba.className += "divPruebasAjax";

		/*CERRAR POP UP*/	
		jQuery('.close').click(function(){
			jQuery('#popupbicisdisponibles').hide();
		});	
		/*FUNCIONES CUANDO CLICAMOS EN EL BOTÓN HOY DEL CALENDARIO, PARA HACER SCROLL AL DÍA DE HOY*/
		jQuery('.fc-today-button').click(function(){
			
			
			jQuery('html, body').animate({
 				scrollTop: jQuery(".fc-day-today").offset().top
 			}, 1000);

		});

		/*MOSTRAR POP UP CON BICIS AL CLICAR EN CADA DÍA*/
		jQuery('.fc-day').each(function(){
			jQuery('.fc-day').css('cursor','pointer');
		});
		
// 		function getdestinos() {
//   		var objXMLHttpRequest = new XMLHttpRequest();
// 			objXMLHttpRequest.onreadystatechange = function() {
//   		if(objXMLHttpRequest.readyState === 4) {
//   		  if(objXMLHttpRequest.status === 200) {
//   		  	var valorMes = jQuery('.fc-toolbar-title').html();
//   		    var obtenido = valorMes.indexOf(" ",[ 0])    
//   		    var mes =  valorMes.substring(0, obtenido);

//   		    switch(mes){
//   		    	case 'noviembre': console.log("mes de noviembre");
  		    	
//   		    	 for(var i=0; i<objXMLHttpRequest.responseText.length; i++){
//   		    	 	var mesFecha = objXMLHttpRequest.responseText[i].indexOf("-",[0]);


//   		    		console.log(mesFecha);

//   		    	 }
//   		    }	
//   		      // console.log(objXMLHttpRequest.responseText);
  		    
  		        

//   		  } else {
//   		        alert('Error Code: ' +  objXMLHttpRequest.status);
//   		        alert('Error Message: ' + objXMLHttpRequest.statusText);
//   		  }
//   		}
// 		}
// objXMLHttpRequest.open('GET', 'validar_fechas_calendario.php');
// objXMLHttpRequest.send();
// 		}


		// getdestinos();

			jQuery('.fc-day').click(function(){
				//
				var contador = 0;
				jQuery('#popupbicisdisponibles').toggle();

				jQuery('.stock').each(function(){
					contador++;
					if(jQuery('input[name="stock'+contador+'"]').val() == 0){

							jQuery(this).css('background-color','red');
							jQuery(this).parent().find('input.boton_reserva').attr('disabled',true);
					}
				});
			});
		});

		/*CAMBIAR COLOR DEL SELECT DE LAS BICI AL RESERVAR*/
		
			
	

	</script>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
      </div> 
    </div>
  </div>
</div>



	<div class="container">
		<div class="row mt-5 mb-5">
			<div class="col-12 text-center mb-5">
				<h2 class="text-center">RESERVAS DE ALQUILER DE BICICLETAS</h2>
			</div>
		</div>
		<div class="row">			
			<div class="col-8 mx-auto">
				<div id='calendar'></div>
				<div class="row">
					<div class="col-12 mt-5 d-flex justify-content-center">
						<a href="../homeTrabajador.php" class="btn btn-secondary">VOLVER</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
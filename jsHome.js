
jQuery(document).ready(function(){
	
	//función mostrar, ocultar menú móvil en el menú de los clientes

	jQuery('.menu_movil').click(function(){

	if(jQuery('.menu_movil_items').hasClass('d-none')){
		jQuery('.menu_movil_items').removeClass('d-none');
		jQuery('.menu_movil_items').addClass('d-block justify-content-center');
		
	}
	else{
		jQuery('.menu_movil_items').removeClass('d-block');
		jQuery('.menu_movil_items').addClass('d-none');
		
	}
	});
	/*POP UP Comprar*/
	jQuery('.boton-comprar').click(function(){

		jQuery('#modal-reserva').modal('show');
		
	});
	jQuery('.finalizar_compra').click(function(){
		alert("¡GRACIAS POR SU COMPRA!");
	});
	
	/*Menú trabajadores*/

	jQuery('.insertarTrabajador').click(function(){

		if(!jQuery('#tablaTrabajadores').hasClass('d-none')){

			jQuery('#tablaTrabajadores').addClass('d-none');
		}else{

			jQuery('#tablaTrabajadores').removeClass('d-none');
			jQuery('#tablaTrabajadores').removeClass('d-flex');
		}

	});

	/**AJAX INSERTAR TRABAJADOR***/
	jQuery('.boton_anadir_trabajador').click(function(){
		var url ="php/validation-home-trabajadores.php";
			jQuery.ajax({

				type : 'POST',
				url : url,
				data : jQuery('#formulario_insertar_trabajador').serialize(),

				success: function(data){
					console.log(data);
					if(data == "true"){
						alert("TRABAJADOR AÑADIDO CORRECTAMENTE");
					}
					else{	
						alert("ERROR CAMPOS VACÍOS");
		 			}
		 		}

		 	});
	});


	/*MOSTRAR LISTA DE TRABAJADORES*/
	jQuery('.boton_trabajadores_click').click(function(){	
		var url ="php/validation-home-ver-trabajadores.php";
			jQuery.ajax({

				type : 'POST',
				url : url,
				//data : jQuery('#formulario_insertar_trabajador').serialize(),

				success: function(data){
					console.log(data);
					var datosTrabajadores = data;
					jQuery('.listado-ver-trabajadores').html("");
					jQuery('.listado-ver-trabajadores').append(datosTrabajadores);
		 		}

		 	});
	});
	/*INSERTAR FACTURA*/

	jQuery('.crear_facturas').click(function(){

	 if(jQuery('.contenedor-crear-facturas').hasClass('d-none')){

	 	jQuery('.contenedor-crear-facturas').removeClass('d-none');
	 	jQuery('.contenedor-crear-facturas').addClass('d-block');
	 }else{
	 	jQuery('.contenedor-crear-facturas').removeClass('d-block');
	 	jQuery('.contenedor-crear-facturas').addClass('d-none');
	 	
	 }

	});
	/*INSERTAR FACTURAS EN LA BD*/

	jQuery('.facturas_boton_deplegar').click(function(){

		if(jQuery('#facturas').hasClass('d-none')){

			jQuery('#facturas').removeClass('d-none');
			jQuery('#facturas').addClass('d-block');

		}else{

			jQuery('#facturas').removeClass('d-block');
			jQuery('#facturas').addClass('d-none');
		}
	});


	// jQuery('.insertar_facturas').click(function(){
	//  	var url ="php/validation-home-insertar-facturas.php";
	// 		jQuery.ajax({

	// 			type : 'POST',
	// 			url : url,
	// 			data : jQuery('#form_crear_factura').serialize(),

	// 			success: function(data){
	// 				console.log(data);
					
	// 				jQuery('.contenedor-facturas').html("");
	// 				jQuery('.contenedor-facturas').append(data);
	// 	 		}

	// 	 	});



	//  });



	/*BUSCADOR FACTURAS*/
	jQuery('.buscar_facturas').click(function(){
		var url ="php/validation-home-buscar-facturas.php";
			jQuery.ajax({

				type : 'POST',
				url : url,
				data : jQuery('.buscador_facturas').serialize(),

				success: function(data){
					console.log(data);
					var datosFacturas = data;
					jQuery('.contenedor-facturas').html("");
					jQuery('.contenedor-facturas').append(datosTrabajadores);
		 		}

		 	});

	});
		
});
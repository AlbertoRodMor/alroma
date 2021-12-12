	jQuery(document).ready(function(){

		/*MOSTRAR FORMULARIOS SEGÚN SE CLIKE EN TRABAJADOR O CLIENTES*/
		jQuery('#enlace-login-trabajador').click(function(){
			jQuery('.fila-login-trabajador').removeClass('d-none');
			jQuery('.fila-login-clientes').addClass('d-none');
			jQuery('.columna-bienvenida').addClass('d-none');

		});

		jQuery('#enlace-login-cliente').click(function(){
			jQuery('.fila-login-clientes').removeClass('d-none');
			jQuery('.fila-login-trabajador').addClass('d-none');
			jQuery('.columna-bienvenida').addClass('d-none');

		});

		/*MOSTRAR POP UP DE REGISTRO*/
		jQuery('#enlace-registro-login').click(function(){

			jQuery('#popup-registro-cliente').modal('show');

		});

		/*VALIDACIÓN DE FORMULARIO TRABAJADOR CON AJAX*/


		jQuery('#boton-submit-trabajadores').click(function(){

			
			var url ="php/validation-login-trabajadores.php";
			jQuery.ajax({

				type : 'POST',
				url : url,
				data : jQuery('#form-trabajador-ajax').serialize(),

				success: function(data){
					console.log(data);
					if( data == "error"){
							jQuery('#usuarioTrabajador').addClass('error');
		 					jQuery('#passwordTrabajador').addClass('error');
		 					jQuery('#respuesta').html("Usuario o contraseña incorrecta.");
		 					console.log(data); 	
		 					
		 			}
		 			else{
		 				window.location.href="http://localhost/prueba-alroma/homeTrabajador.php";
		 			}
		 			
		 		}

		 	});

		});


		
		/*Comprobar si existe el cliente en la BD*/
		jQuery('#boton-submit-clientes').click(function(){

			var url ="php/validation-login-clientes.php";
			jQuery.ajax({

				type : 'POST',
				url : url,
				data : jQuery('#form-cliente-ajax').serialize(),

				success: function(data){
				console.log(data);
					jQuery('#respuestaCliente').html("");
					jQuery('#respuestaCliente').html(data);


					if(data === "<span class='errorMensaje'>No puede haber campos vacíos</span><br>"){

		 				jQuery("#form-clientes-ajax input").each(function(){

		 					if(jQuery(this).val() == ""){

		 						jQuery(this).addClass("error");
		 					}

		 				});
		 			}else{
		 				window.location.href="http://localhost/prueba-alroma/home.php";
		 			}
		 		}

			});

		});

/*VALIDAR E INSERTAR EN LA BD LOS CLIENTES QUE SE VAYAN REGISTRANDO Y NO EXISTAN EN LA BASE DE DATOS*/

		jQuery('#boton-submit-registro').click(function(){

			var url ="php/validation-login-registro.php";
			jQuery.ajax({

				type : 'POST',
				url : url,
				data : jQuery('#form-registro-clientes-ajax').serialize(),

				success: function(data){
				console.log(data);
					jQuery('#respuestaRegistro').html("");
					jQuery('#respuestaRegistro').html(data);
					
		 			if(data === "<span class='errorMensaje'>No puede haber campos vacíos</span><br>"){

		 				jQuery("#form-registro-clientes-ajax input").each(function(){

		 					if(jQuery(this).val() == ""){

		 						jQuery(this).addClass("error");
		 					}

		 				});
		 			}				
				}

				
			});
		});	
});			
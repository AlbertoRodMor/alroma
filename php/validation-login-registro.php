<?php 
require('../conexionBD/conexion.php');

if(conexion())

/*NOS TRAEMOS POR EL MÉTODOS POST LAS VARIABLES DEL FORMULARIO DE REGISTRO*/

/*INSERTAR CLIENTE SI NO EXISTE*/
$apenom = $_POST['apelnom'];
$direccion = $_POST['direccion'];
$telefono_registro = $_POST['telefono_registro'];
$email_registro = $_POST['email_registro'];
$userRegistro = $_POST['usuario_registro'];
$password_registro = $_POST['password_registro'];
$arrayEmails= array();
$arrayUsuarios= array();
$errores="";
/*Consulta para recorrer todos los clientes de la tabla donde se alojan, los clientes registrados, para comprobar si existe o no antes de registrarse*/

	 	$pdo = conexion();

 		$sql = "SELECT apenom_cliente,direccion,email,usuario_cliente,pass_cliente,id_cliente from login_clientes";

		$stmt = $pdo->query($sql);
		
		
    		$row = $stmt->fetch();
			
    		while($row['email']){
/*GUARDO EL EMAIL EN UN ARRAY Y EL NOMBRE DE USUARIO DEL CLIENTE EN OTRO*/
    			array_push($arrayEmails, $row['email']);
    			array_push($arrayUsuarios, $row['usuario_cliente']);
    			   			
				$row = $stmt->fetch();

    		}
    		/**/
    		$contadorMensajeEmails=0;
    		$contadorMensajeUsuario=0;			
    		foreach ($arrayEmails as $key => $value) {
    			/*SI EL EMAIL INTRODUCIDO ES IGUAL A UNA YA EXISTENTE DE OTRO CLIENTE, MANDO UN MENSAJE DE ERROR Y UTILIZO UN CONTADO, POR QUE SI ESE CONTADOR NO ES 0, ES QUE HA PASADO POR ESTA CONDICIÓN Y YA EXISTEN UN EMAIL REGISTRADO, MÁS ABAJO CONTRO SI EL CONTADOR ES 0 Ó NO, HAGO LO MISMO CON EL NOMBRE DE USUARIO */
    			if($value == $email_registro){
					
					echo "<span class='errorMensaje'>Email ya existe</span><br>";    				
    				$contadorMensajeEmails++;
    			}else{

    				if(!filter_var($email_registro, FILTER_VALIDATE_EMAIL)){
				
   						echo "<span class='errorMensaje'>Email no válido</span><br>";
    					$contadorMensajeEmails++;
			 		}
			 		
    			}
    		}
    		foreach ($arrayUsuarios as $key => $value) {
    			
    			if($value == $userRegistro){
					echo "<span class='errorMensaje'>Usuario ya existe</span><br>";
					$contadorMensajeUsuario++;   				
    			}
    		}
    		/*SI LOS CONTADORES SON 0, ES QUE NO HAY NINGÚN EMAIL, NI NOMBRE DE USUARIO IGUAL QUE EL QUE SE QUIERE REGISTRAR Y PASAMOS A LA SIGUIENTE CONDICIÓN, QUE NOS VA A CONTROLAR QUE NO HAYA NINGÚN CAMPO VACÍO*/
    		if(($contadorMensajeEmails == 0) and $contadorMensajeUsuario==0){

    			if(($apenom=="") || ($direccion=="") || ($telefono_registro=="") || ($password_registro=="") ){

					echo "<span class='errorMensaje'>No puede haber campos vacíos</span><br>";

				}else{
					/*CON LOS CONTADORES A 0, Y CONTROLANDO QUE NO HAYA NINGÚN CAMPO VACÍO, INSERTAMOS DICHO CLIENTE EN LA TABLA DE REGISTRO*/
				$sqlInsertar = "INSERT INTO login_clientes (apenom_cliente,direccion,email,usuario_cliente,pass_cliente,id_cliente) 

                  VALUES (?,?,?,?,?,?)";

                  $stmt2= $pdo->prepare($sqlInsertar);

                  $stmt2->execute([$apenom, $direccion,$email_registro,$userRegistro,$password_registro,0]);

					echo "<span class='registroCorrecto'>En breve recibirás un correo autorizando tu cuenta. Gracias </span>";

									

			}


    		}
			
    		$row = $stmt->fetch();

 	

?>
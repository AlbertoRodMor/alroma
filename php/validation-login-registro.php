<?php 
require('../conexionBD/conexion.php');

if(conexion())

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


	 	$pdo = conexion();

 		$sql = "SELECT apenom_cliente,direccion,email,usuario_cliente,pass_cliente,id_cliente from login_clientes";

		$stmt = $pdo->query($sql);
		
		
    		$row = $stmt->fetch();
			
    		while($row['email']){

    			array_push($arrayEmails, $row['email']);
    			array_push($arrayUsuarios, $row['usuario_cliente']);
    			   			
				$row = $stmt->fetch();

    		}
    		
    		$contadorMensajeEmails=0;
    		$contadorMensajeUsuario=0;			
    		foreach ($arrayEmails as $key => $value) {
    			
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
    		if(($contadorMensajeEmails == 0) and $contadorMensajeUsuario==0){

    			if(($apenom=="") || ($direccion=="") || ($telefono_registro=="") || ($password_registro=="") ){

					echo "<span class='errorMensaje'>No puede haber campos vacíos</span><br>";

				}else{

				$sqlInsertar = "INSERT INTO login_clientes (apenom_cliente,direccion,email,usuario_cliente,pass_cliente,id_cliente) 

                  VALUES (?,?,?,?,?,?)";

                  $stmt2= $pdo->prepare($sqlInsertar);

                  $stmt2->execute([$apenom, $direccion,$email_registro,$userRegistro,$password_registro,0]);

					echo "<span class='registroCorrecto'>En breve recibirás un correo autorizando tu cuenta. Gracias </span>";

									

			}


    		}
			
    		$row = $stmt->fetch();


    		
			// if ($row['email'] == $email_registro){

			// 		echo "<span>Email ya existe</span><br>";


			// }else{

			// 	if ($row['usuario_cliente'] == $userRegistro){

			// 		echo "<span>Usuario ya existe</span><br>";
					
				
			// 	}else{

			// 	if(!filter_var($email_registro, FILTER_VALIDATE_EMAIL)){

				
   //  				echo "<span>Email no válido</span><br>";
    			
			// 	}else

			// 		if(($apenom=="") || ($direccion=="") || ($telefono_registro=="") ){

					
			// 			echo "<span>No puede haber campos vacíos</span><br>";
						
			// 		}else{

			// 		$sqlInsertar = "INSERT INTO login_clientes (apenom_cliente,direccion,email,usuario_cliente,pass_cliente,id_cliente) 
   //                  VALUES (?,?,?,?,?,?)";
   //                  $stmt2= $pdo->prepare($sqlInsertar);
   //                  $stmt2->execute([$apenom, $direccion,$email_registro,$userRegistro,$password_registro,0]);
			// 		echo "<span>Usuario registrado correctamente</span>";
									
			// 		}

					
			// } 
			//  }
			

		
    		// print_r($row['email']);
    		// print_r($row['apenom_cliente']);
    		// print_r($row['pass_cliente']);

			
			
		  	

?>
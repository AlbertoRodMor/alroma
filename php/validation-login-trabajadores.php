<?php 
require('../conexionBD/conexion.php');
session_start();
/*Validar trabajador*/
if(conexion()){
	$user = $_POST['usuarioTrabajador'];
	$pass = $_POST['passwordTrabajador'];
	
      $pdo = conexion();
      $boolean = false;
      $sql = "SELECT * from login_trabajadores";        
      $stmt = $pdo->query($sql);   
         while($row = $stmt->fetch()){
/*Si existe en la tabla trabajadores el usuario o el trabajador manda por una llamada ajax un echo, el cual si llega vacío es que existen y es válido*/
            if($row['user'] == $user){
               if($row['pass'] == $pass){
                  echo '';
                  $_SESSION['usuarioTrabajador']= $user;
                  $_SESSION['passwordTrabajador']= $pass;
                  break;
               }
               else{
                  echo "no no pass";
               }
            }
            else{
                  echo "no no user";
            }
         }

}

?>
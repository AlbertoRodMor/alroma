<?php 
require('../conexionBD/conexion.php');
session_start();
/*Validar cliente*/

$user="";
$pass="";
$user=$_POST['usuarioCli'];
$pass=$_POST['passwordCli'];
$mensaje="";

$arrayUsuarioCliente= array();
$arrayPassCliente= array();	




$pdo = conexion();

      $sql = "SELECT * from login_clientes";        
      $stmt = $pdo->query($sql);   
         while($row = $stmt->fetch()){

            if($row['usuario_cliente'] == $user){
               if($row['pass_cliente'] == $pass){
                  echo '';
                  $_SESSION['usuarioCliente']= $user;
                  $_SESSION['passCliente']= $pass;
                  break;
               }
               else{
                  echo "";
               }
            }
            else{
                  echo "";
            }
         }
        

?>
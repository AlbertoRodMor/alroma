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
/*AQUÍ SIMPLEMENTE HACIENDO UNA CONSULTA A LA BASE DE DATOS EN CONCRETO A LA TABLA DE LOS CLIENTES YA RTEGISTRADOS COMPROBAMOS SI EXISTE ESE USUARIO CON ESA CONTRASEÑA*/
      $sql = "SELECT * from login_clientes";        
      $stmt = $pdo->query($sql);   
         while($row = $stmt->fetch()){

            if($row['usuario_cliente'] == $user){
               if($row['pass_cliente'] == $pass){
                  echo '';
                  $_SESSION['usuarioCliente']= $user;/*GUARDAMOS EN LAS VARIABLES DE SESIÓN, EL USUARIO EN UNA Y LA CONTRASEÑA EN OTRA*/
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
<?php

function conexion(){
  
     
     $conexion = new PDO("mysql:host=localhost;dbname=alroma", "dwes", "abc123.");
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
  return $conexion;
 
 }

 // public static function isCliente($nombre, $contrasena) {
 //        $conexion = conexion();
 //        try {
 //            // Consulta preparada
 //            $sql = $conexion->prepare("SELECT * from login_clientes WHERE usuario = :usuario_cliente AND contrasena = :pass_cliente");
 //            $sql->bindParam(':usuario', $usuario, PDO::PARAM_STR);
 //            $sql->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
 //            $resultado = $sql->execute();

 //            $retorno = ($sql->rowCount() > 0);
 //        } catch (PDOException $e) {
 //            echo "ERROR - No se pudo acceder a la tabla usuarios: " . $e->getMessage();
 //        }
 //        return $retorno;
 // }
 
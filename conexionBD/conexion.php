<?php

function conexion(){
  
     
     $conexion = new PDO("mysql:host=localhost;dbname=alroma", "dwes", "abc123.");
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
  return $conexion;
 
 }

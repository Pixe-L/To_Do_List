<?php

require_once ("../php/conect.php");
$conex=conexion();
 

if(isset($_POST['addempresa'])) {
 
 $empre = $_POST['empresa'];

 if(!empty($empre)) {
  
  $agregar = "INSERT INTO empresa (nombre) VALUES ('$empre')"; 
  $query = $conex -> prepare($agregar);
  $result = $query -> execute();
 
  if ($result) { 
   header("Location: ../empresa.php");
   die(); 
  } 
 } else {
  echo "No se valido prro";
 }

}

?>
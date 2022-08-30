<?php

require_once ("../php/conect.php");
$conex=conexion();
 

if(isset($_POST['adduser'])) {
 
 $users = $_POST['nameuser'];

 if(!empty($users)) {
  
  $agregar = "INSERT INTO usuario (nombre) VALUES ('$users')";
  $query = $conex -> prepare($agregar);
  $result = $query -> execute();
 
  if ($result) {
 
   header("Location: ../usuario.php");
   die();
 
  } 
 } else {
  echo "No se valido prro";
 }
}

?>
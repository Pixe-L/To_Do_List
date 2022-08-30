<?php

require_once ("../php/conect.php");
$conex=conexion();
 

if(isset($_POST['addtarea'])) {
 
 $tare = $_POST['tarea'];
 $descri = $_POST['descrip'];
 $fein = $_POST['f-i'];
 $feve = $_POST['f-v'];
 $empress = $_POST['empres'];
 $usr = $_POST['user'];
 
 if($_POST['empres'] && $_POST['user'] ){
 if(!empty($tare or $descri or $fein or $feve or $empress or $usr)) {
  
  $agregar = "INSERT INTO tareas (nombre, descripcion, fecha_inicio, fecha_vencimiento, empresa, usuario) VALUES ('$tare', '$descri', '$fein', '$feve', '$empress', '$usr')"; 
  $query = $conex->prepare($agregar);
  $result = $query->execute();
 }else{
  return;
 }
  
 if ($result) { 
    header("Location: ../tareas.php");
    die(); 
  } 
 } else {
  echo "No se valido prro";
  header("Location: ../tareas.php");
 }
}

?>
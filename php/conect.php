<?php 

function conexion() {
 
$hostname="localhost";
$username="root";
$password="";
$dbname="exam";

 try {
    $mbd = new PDO('mysql:host=localhost;port=3306;dbname='.$dbname, $username, $password);
    return $mbd;
 }
 catch (PDOException $e) {
  return $e->getMessage();
 }
 
}
?>


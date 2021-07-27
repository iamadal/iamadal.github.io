<?php
 $db   = 'mysql:data;host=localhost';
 $user = 'root';
 $pass = '5576';

 try {
 	$conn = new PDO($db, $user, $pass);
 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 } catch(PDOException $e){
   echo "Database Error: " . $e->getMessage();
   die();
 }
 
?>
<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "user" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	 $answer = trim($_GET['answer']);
 }

?>
<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "admin" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>



<?php
  if(isset($_GET['username'])){
  	 $username = trim($_GET['username']);
     require_once "core/dbm.php";
     $sql = "DELETE FROM `message` WHERE `by` = '$username' ";
     $mysqli->query($sql);
     header("location: admin-messages.php");
  }
  
  ?>


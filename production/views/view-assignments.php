<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>



<?php
  if(isset($_GET['ass_id'])){
  	 $username = $_SESSION['username'];
     $id = trim($_GET['ass_id']);
     require_once "core/dbm.php";
     $sql = "SELECT `file_location` FROM `assignments` WHERE `ass_id` = '$id' ";
     $mysqli->query($sql);
  }
  
  ?>


<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>



<?php
  if(isset($_GET['class_id'])){
  	 $username = trim($_GET['class_id']);
     require_once "core/dbm.php";
     $sql = "DELETE FROM `live_class_sir` WHERE `class_id` = '$username' ";
     $mysqli->query($sql);
     header("location: teacher-home-live.php");
  }
  
  ?>


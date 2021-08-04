<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>



<?php
  if(isset($_GET['ass_id'])){
  	 $username = trim($_GET['ass_id']);
     require_once "core/dbm.php";

   

     $r = $mysqli->query("SELECT `filename` FROM `assignments` WHERE `ass_id` = '$username'");
  
     if($r->num_rows == 1){
        $rr = $r->fetch_assoc();
        
        unlink("uploads/" . $rr['filename']);
        
        $sql = "DELETE FROM `assignments` WHERE `ass_id` = '$username' ";
        $mysqli->query($sql);
        
     } 
     header("location: teacher-home-assignment.php"); 
  }
  
  ?>


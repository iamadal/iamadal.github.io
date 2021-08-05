<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php


 if(isset($_GET['ass_id']) && $_GET['user']) {
     $id   = $_GET['ass_id'];
     $user = $_GET['user'];
    
     require_once ("core/dbm.php");
     $mysqli->query("UPDATE `ass_students` SET `remarks`='Your Solution is accepted' WHERE `ass_id`='$id' AND `by`='$user';");
     header("location: teacher-home-report.php");
 } 

                   

?>


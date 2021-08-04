<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php


$by = "";
$ass_id = "";

if(isset($_GET['ass_id']) && isset($_GET['user'])){

                   $by     = $_GET['user'];
                   $ass_id = $_GET['ass_id'];

  



                   require_once ("core/dbm.php");
                   

                   $fetch_points = $mysqli->query("SELECT `points` FROM `assignments` WHERE `ass_id`='$ass_id' ");
                   $res = $fetch_points->fetch_assoc();
                   $points = $res['points'];

                   $mysqli->query("UPDATE `ass_students` SET `points`='$points' WHERE `ass_id`='$ass_id' AND `by`='$by' ");
                  header("location: teacher-home-report.php");
      
       }

?>
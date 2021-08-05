<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
      header("location: 404.php");
   }
?>





<?php
  // DELETE exam set alogn with Exam ID
  if(isset($_GET['exam_id'])){
    $exam_id = $_GET['exam_id'];
     $dbs = $exam_id ."_".$_SESSION['username'];
     require_once("core/dbm.php");
     $drop = "DROP TABLE " . $dbs; 
     $mysqli->query($drop);
     $mysqli->query("DELETE from `exam` WHERE `exam_id`='$exam_id'");
     header("location: teacher-home-exam.php");
  }

?>
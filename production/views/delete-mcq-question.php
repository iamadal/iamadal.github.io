<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
      header("location: 404.php");
   }
?>





<?php
  // DELETE exam set alogn with Exam ID
  if(isset($_GET['qn'])){
     $qn = $_GET['qn'];
     $dbs = $_SESSION['exam_id'] ."_".  $_SESSION['username'];
     require_once("core/dbm.php");
     $sql = "DELETE from ".$dbs. "  WHERE `qn`='$qn'";
     $mysqli->query($sql);
     header("location: teacher-create-exam.php");
  }

?>
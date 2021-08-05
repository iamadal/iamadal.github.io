<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
      header("location: 404.php");
   }
?>





<?php
  // DELETE exam set alogn with Exam ID
  if(isset($_GET['question_no'])){
  
     $qn  = $_GET['question_no'];
     $op1 = $_GET['option_1'];
     $op2 = $_GET['option_2'];
     $op3 = $_GET['option_3'];
     $op4 = $_GET['option_4'];
     $ans = $_GET['correct_options'];

     require_once("core/dbm.php");

     $dbs = $_SESSION['exam_id'] ."_".  $_SESSION['username'];
     $sql = "INSERT INTO ".$dbs. " (`question`,`option_1`,`option_2`,`option_3`,`option_4`,`correct_option`)  VALUES('$qn','$op1','$op2','$op3','$op4','$ans')";
     $mysqli->query($sql);
      
           
        header("location: teacher-create-exam.php");
  }

?>
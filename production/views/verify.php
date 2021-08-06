<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "user" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

          	$by =  $_SESSION['teacher']   ;
     	$exam_id =  $_SESSION['e_id']      ;
   	  $exam_name = $_SESSION['e_name']    ;
   	 $submitted_by = $_SESSION['username'];      
   	  $year = $_SESSION['year'];     
   	  $sems = $_SESSION['sems'];


 	 $answer = trim($_POST['answer']);
 	 $input = explode(" ", $answer);
     
     $_SESSION['mymarks'] = 0;

     require_once("core/dbm.php");
     
     $dbs = $_SESSION['e_id'] . "_" . $_SESSION['teacher'];

     $sql = "SELECT `qn`,`correct_option` FROM ".$dbs." ";
     
     $res = $mysqli->query($sql);
     while($row = $res->fetch_assoc()){
     	$a[] = $row['qn'];
     	$b[] = $row['correct_option'];
     }
    
     if(count($a)==count($input)){
     	$_SESSION['results'] = "Submitted";
     	$_SESSION['mymarks'] = $_SESSION['marks']*(count(array_intersect($input, $b)))/count($a);
     	$marksss = $_SESSION['mymarks'];

     	require_once("core/dbm.php");
        
         $sql = "INSERT INTO exam_std  (`exam_id`, `exam_name`, `by`, `submitted_by`, `status`, `marks`, `year`, `sems`) VALUES ('$exam_id','$exam_name','$by','$submitted_by',1,'$marksss','$year','$sems')";
         $mysqli->query($sql);
         echo $_SESSION['mymarks'];
         header("location: student-home-exam.php");

     } else {
     	$_SESSION['results'] = "Please check the answer sheet";
     }
     
 }

?>
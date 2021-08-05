<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
      header("location: 404.php");
   }
?>





<?php
  // DELETE exam set alogn with Exam ID

?>
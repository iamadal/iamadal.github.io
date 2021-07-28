<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != 'sir' || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
      if(isset($_SESSION["status"]) && $_SESSION["status"] !== "active"){
   	  session_unset();
   	  session_destroy();
   	  header("location: approval.php");

   }
?>


<h1>Teacher's Home</h1>
<a href="logout.php">Logout</a>
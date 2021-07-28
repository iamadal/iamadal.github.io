<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != 'sir'){
   	  header("location: 404.php");
   }
?>


<h1>Teacher's Home</h1>
<a href="logout.php">Logout</a>
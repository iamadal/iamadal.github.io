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


<style>
	 * {outline: 0px;}

form {margin: 0 auto; width: 50%}
form p {margin: 0  5px; font-size: 12px}
input[type=text], input[type=email],select, textarea{
  width: 95%;
  padding: 7px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  margin: 5px;
}

input[type=text]:focus, input[type=email]:focus {border: 1px solid #04AA6D; transition: all .5s}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 8px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin: 5px;
}



</style>











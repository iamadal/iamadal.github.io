<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "user" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php
  $_SESSION['result'] = 0;

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  	                      require_once("core/dbm.php");
                         $dbs = $_SESSION['e_id'] . "_" . $_SESSION['teacher'];

                         $sql = " SELECT correct_option FROM ". $dbs ." ";
                        
                         $result = $mysqli->query($sql);
                         
                         

  	                     $input = $_POST['answer'];
  	                     $arr = explode(" ", $input);

  	                  
                       $row = $result->fetch_row();

                       echo count( $row);
                  


  	 }
  

?>
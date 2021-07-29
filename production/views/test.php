<?php

 require_once "core/dbm.php";

 // $username = "soma";

 // if(empty($username)){
 //   echo "Please Insert username";
 // } else {
 //   // Find status for soma
 //   $sql = "SELECT username,status from users WHERE username = ?";
 //   if($stmt = $mysqli->prepare($sql)){
 //       $stmt->bind_param("s",$username);
 //       if($stmt->execute()){
 //           $stmt->store_result();
 //           if($stmt->num_rows == 1){
 //                echo "Information Match";
 //           } else {
 //              echo "User not found"; // Change soma to somas. somas is not in the database so it will be called
 //           }
 //       } else {
 //           echo "Execution Failed";
 //       }
 //   } else {
 //     echo "Query Failed";
 //   }
 // } This version is perfect for error handling. we will use short version

    $username = ""; 
    $sms = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") { /*Must use this way*/
      $username = trim($_POST['username']);
       $sql = "SELECT username,status FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows == 1){
        $sms = $username . " is in the Database";
    } else {
       $sms = "No Match Found";
    }  
    }

    
 ?>

<form action="test.php" method="post">
  <input type="text" name="username" required><input type="submit">
  <?php echo $sms ?>
</form>


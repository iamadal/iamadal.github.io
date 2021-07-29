<?php

 require_once "core/dbm.php";

 $username = "soma";

 if(empty($username)){
 	echo "Please Insert username";
 } else {
 	// Find status for soma
 	$sql = "SELECT username,status from users WHERE username = ?";
 	if($stmt = $mysqli->prepare($sql)){
       $stmt->bind_param("s",$username);
       if($stmt->execute()){
           $stmt->store_result();
           if($stmt->num_rows == 1){
                print_r($stmt->fetch_assoc());
           } else {
           	 echo "User not found"; // Change soma to somas. somas is not in the database so it will be called
           }
       } else {
       	  echo "Execution Failed";
       }
 	} else {
 		echo "Query Failed";
 	}
 }
<?php

 require_once "core/dbm.php";

 // $username = "soma";

 // if(empty($username)){
 // 	echo "Please Insert username";
 // } else {
 // 	// Find status for soma
 // 	$sql = "SELECT username,status from users WHERE username = ?";
 // 	if($stmt = $mysqli->prepare($sql)){
 //       $stmt->bind_param("s",$username);
 //       if($stmt->execute()){
 //           $stmt->store_result();
 //           if($stmt->num_rows == 1){
 //           	    $stmt->
 //                print_r($stmt->fetch_assoc());
 //           } else {
 //           	 echo "User not found"; // Change soma to somas. somas is not in the database so it will be called
 //           }
 //       } else {
 //       	  echo "Execution Failed";
 //       }
 // 	} else {
 // 		echo "Query Failed";
 // 	}
 // }


    $phone     =     "01821076088";
    $lastname  = "Adal";
    $firstname = "Khane"; 
    $gender = "Khane"; 
    $emails    ="asd@ccc";
    $address = "GA Best";
    $username = "msdd";

    // $mysqli->query( "INSERT INTO `webmaster`.`user_info` ( `phone`, `firstname`, `lastname`, `email`,`gender`, `address`, `username`) VALUES ( '$phone', '$firstname', '$lastname', '$emails', '$gender' ,'$gender', '$username')");

//         $sql = "SELECT sl FROM users_info WHERE username = ?";
//         if($stmt = $mysqli->prepare($sql)){
//             $stmt->bind_param("s", $param_username);
//             $param_username = $username;
//             if($stmt->execute()){
//             	echo 'Working';
//                 $stmt->store_result();
//                 // if given username and returned result are match int value 1 is retured else 0 will be returned
                
//                 if($stmt->num_rows == 1){
//                     $username_err = "This username is not available."; 
//                     echo $username_err;
//                 } else{
//                 	echo 'Working';
// //                    $username = trim($_POST["username"]); // No Match Found to INSERT DATA
//                      $mysqli->query("INSERT INTO `webmaster`.`user_info` ( `phone`, `firstname`, `lastname`, `email`,`gender`, `address`, `username`) VALUES ( '$phone', '$firstname', '$lastname', '$emails', '$gender' ,'$gender', '$username')" );
//                 }
//             } else{
//                 echo "Oops! Login error";
//             }
//             $mysqli->error;
//             $stmt->close();
//         }


        
       
        
         
            $m = $mysqli->query("INSERT INTO `webmaster`.`user_info` ( `phone`, `firstname`, `lastname`, `email`,`gender`, `address`, `username`) VALUES ( '$phone', '$firstname', '$lastname', '$emails', '$gender' ,'$gender', '$username')" );
            if(!$m){
               echo 'Found Username So UPDATing';
            }
        


 ?>
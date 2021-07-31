<?php
   echo '<h1 style="text-align:center">Green University of Bangladesh</h1>';
    $admin_user     = "admin";
    $admin_pass     = "55761910"; // Set Password


    $password = password_hash($admin_pass, PASSWORD_DEFAULT); // Don't Edit or Change hash Algorithms

    $username_db       = "root";  // Set Database User
    $password_db       = "55761910";  // Set Database Password



    $role   = "admin";   // Don't Edit it
    $status = "active";  // Don't Edit it
    


    $m = new mysqli("localhost",$username_db,$password_db);

    if($m->connect_error){
  	    die( "Failed to connect");
     } else {
  	      echo "1. Connecting ... OK<br>";
     }

      if($m->query("CREATE DATABASE webmaster") === TRUE){
  	        echo ' <p style="color:blue">2. Creating Database .... OK </p>';
  	        echo ' <p style="color:blue">3. Revoking .... OK </p>';
        } else {
  	        echo ' <p style="color:red">2. Already Installed .... OK </p>';
         }

       $m->close();

       $con = new mysqli("localhost",$username_db,$password_db,"webmaster");
       if($con->connect_error){
       	   echo ' <p style="color:red">1. Connection Failed .... OK </p>';
           exit;
       } else {
       	  echo ' <p style="color:purple">2. Connected .... OK </p>';
       }


    $users =   "CREATE TABLE `users` (
                                     	`id` INT(11) NOT NULL AUTO_INCREMENT,
	                                    `username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	                                    `password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	                                    `joined` DATETIME NULL DEFAULT current_timestamp(),
	                                    `role` VARCHAR(15) NOT NULL DEFAULT 'user' COLLATE 'utf8mb4_unicode_ci',
	                                    `status` VARCHAR(15) NOT NULL DEFAULT 'pending' COLLATE 'utf8mb4_unicode_ci',
	                                     PRIMARY KEY (`id`) USING BTREE,
	                                     UNIQUE INDEX `username` (`username`) USING BTREE
                                      ) COLLATE='utf8mb4_unicode_ci' ENGINE=InnoDB ";



       if($con->query($users) === TRUE){
    	      echo '<p style="color:purple">2. Creating Tables .... OK </p>';
        } else {
              echo '<p style="color:red">2. Failed to Create Table .... ERROR </p>' . $con->error;
        }

        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<p style="color:purple">3. Assigning Admin .... OK </p>';

        $stmt = $con->prepare("INSERT INTO users(username,password,status,role) VALUES(?,?,?,?)" );
    
        $stmt->bind_param("ssss",$admin_user,$password,$status,$role);
        $stmt->execute();

       
       $user_info = "CREATE TABLE `user_info` (
	`sl` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`phone` VARCHAR(50) NOT NULL DEFAULT '00000000000' COLLATE 'utf8_general_ci',
	`designation` VARCHAR(50) NOT NULL DEFAULT 'student' COLLATE 'utf8_general_ci',
	`firstname` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`lastname` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`department` VARCHAR(10) NOT NULL DEFAULT 'cse' COLLATE 'utf8_general_ci',
	`email` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`gender` VARCHAR(20) NOT NULL DEFAULT 'male' COLLATE 'utf8_general_ci',
	`address` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`sl`) USING BTREE,
	UNIQUE INDEX `username` (`username`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB" ;

     
     $con->query($user_info);
















        echo '<h3 style="color: purple"> Installation Completed </h3>' . 'ID: ' . $admin_user . " <br/> PASSWORD: " . $admin_pass;
        
        $file = fopen("views/core/db.ini","w");

        fwrite($file, "username=" . $username_db . "\n");
        fwrite($file, "password=" . $password_db);
       
       echo  '<br>' . '<a href="home.php">Goto Homepage</a>';

      
   ?>









<style>
  body {width: 50%; margin:0 auto;}
   * {margin: 3px;font-family: 'Roboto'}
</style>







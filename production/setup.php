<?php
   echo '<h1 style="text-align:center">Green University of Bangladesh</h1>';
    $admin_user     = "admin";
    $admin_pass     = "55761910"; // Set Password


    $password = password_hash($admin_pass, PASSWORD_DEFAULT); // Don't Edit or Change hash Algorithms

    $username_db       = "root";  // Set Database User
    $password_db       = "5576";  // Set Database Password



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


    $create =   "CREATE TABLE `users` (
                                     	`id` INT(11) NOT NULL AUTO_INCREMENT,
	                                    `username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	                                    `password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	                                    `joined` DATETIME NULL DEFAULT current_timestamp(),
	                                    `role` VARCHAR(15) NOT NULL DEFAULT 'user' COLLATE 'utf8mb4_unicode_ci',
	                                    `status` VARCHAR(15) NOT NULL DEFAULT 'pending' COLLATE 'utf8mb4_unicode_ci',
	                                     PRIMARY KEY (`id`) USING BTREE,
	                                     UNIQUE INDEX `username` (`username`) USING BTREE
                                      ) COLLATE='utf8mb4_unicode_ci' ENGINE=InnoDB ";



       if($con->query($create) === TRUE){
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

        echo '<h3 style="color: purple"> Installation Completed </h3>' . 'ID: ' . $admin_user . " <br/> PASSWORD: " . $admin_pass;
        
        $file = fopen("views/core/db.ini","w");

        fwrite($file, "username=" . $username_db . "\n");
        fwrite($file, "password=" . $password_db);
    

   ?>

  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
<style>
   * {margin: 3px;font-family: 'Roboto'}
</style>

<a href="views/login.php"> login</a>






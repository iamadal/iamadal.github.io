<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "admin" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="normalize.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Green University of Bangladesh</title>
	</head>
 <body>
 	             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="input-wrap">
              	  <div> 
              	  	 <i class="fa fa-user"></i> Username
              	  	 <input id="admin-email" type="text" id="admin-email" name="username"  class=" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"> <span class="invalid-feedback"><?php echo $username_err; ?></span></div>
              	  <div>
              	    <i class="fa fa-lock"></i> Password
              	    <input type="password" id="admin-pass"  name="password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"> <span class="invalid-feedback"><?php echo $password_err; ?></span>
              	  </div>
                  

                  <div><input class="login-button" type="submit" value="login"></div>
                  <p style="text-align: center; font-size: 14px"><a href="register.php"><i class="fa fa-external-link"></i> Don't have an account? - Signup now</a></p>
              </div>
			</form>
 </body>
 </html>
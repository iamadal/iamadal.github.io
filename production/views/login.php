<!-- MC -->
<?php
session_start();
if(isset($_SESSION['role'])){
  switch ($_SESSION['role']) {
      case 'user':
            header("location: student-home.php");
            break;
       case 'sir':
            header("location:  teacher-home.php"); 
            break;
     case 'admin':
            header("location: admin-home.php");
           break;
     default: 
         echo "Not found";
         break;
    }
}


require_once "core/dbm.php";
$username     = "";
$password     = "";
$username_err = ""; 
$password_err = "";
$login_err    = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password , role , status FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($id, $username, $hashed_password,$role, $status);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["username"] = true;
                            $_SESSION["id"]       = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["role"]     = $role;
                            $_SESSION["status"]   = $status;                        
                            switch ($_SESSION['role']) {
                              case 'user':
                                header("location: student-home.php");
                                break;

                              case 'sir':
                                header("location: teacher-home.php"); 
                                break;

                              case 'admin':
                                header("location: admin-home.php");
                                break;

                                default: 
                                  echo "Not found";
                                  break;
                            }
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Login failed";
            }

            $stmt->close();
        }
    }
    $mysqli->close();
}
?>
<!-- UI -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="views/css/normalize.min.css">
		<link rel="shortcut icon" type="image/jpg" href="img/fav.png">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Green University of Bangladesh</title>
	</head>
	<body>
		<div class="container">
			<!-- Header section -->
			<div class="header">
				<header class="head-section">
					<div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
					<h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
				</header>
			</div>
			<!-- main content area -->
			<div class="content">
              <div class="title-wrap">
              	<img src="img/admin.png" height="80px" width="80px">
              	<h1>  <i class="fa fa-user"></i> Please verify your identity</h1>
              	<p>   <i class="fa fa-lock"></i> Secure Login</p>
              
              	<?php 
                   if(!empty($login_err)){
                       echo '<p style="background-color: #ef1414; padding: 5px; color: #fff; margin: 10px; border-radius: 15px"> <i class="fa fa-frown-o"></i> ' . $login_err . '</p>';
                     }        
                 ?>
              
              </div>

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
			</div>
			
			<!-- footer section -->
			<div class="footer">
				<p>Copyright&copy; Department of CSE - GUB - 2021</p>
			</div>
		</div>
	</body>
</html>
<!-- Stylesheets -->
<style>
    {border: 1px solid red;}
body,html {font-family: 'Roboto'; background: #ddd;}
* {outline:0;box-sizing: border-box;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.footer p {text-align: center; font-family: 'Roboto' ; font-weight: normal; font-size: 14px; color: #fff; background-color: purple; padding: 5px}

.content .title-wrap         { font-family: 'Roboto'; font-weight: normal}
.content .title-wrap h1      { font-family: 'Roboto'; font-weight: 300; text-align: center; font-size: 24px}
.content .title-wrap p       { font-family: 'Roboto'; font-weight: 300; text-align: center;}
.content .title-wrap img     {margin-left: 40%; margin-top: 5px}

.content .input-wrap         {}
.content .input-wrap  div    { padding: 2px; width: 100%; margin: 0 auto}

#admin-email,#admin-pass {width: 100%;padding: 10px; margin-left: -1px; border: 1px solid #f0f0f0; background-color: #ddd; border-radius: 5px}
#admin-email:focus,#admin-pass:focus {border: 1px solid purple; transition: all  1s}
.login-button {text-transform: uppercase;background-color: purple;padding: 10px; color: #fff; border: 1px solid purple; width: 100%; border-radius: 5px}


.is-invalid {border: 1px solid red !important;}
.invalid-feedback {color: red; font-size: 12px} 


.container {width: 100%}

/* media queries*/
/* Very Small devices*/
@media (min-width: 320px){
	.container {width: 98%;margin:0 auto;margin-top: 5px; }
	.content .input-wrap  div {width: 90%; margin:0 auto;}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container {width: 98%;margin:0 auto;margin-top: 10px;}
    .content .input-wrap  div {width: 60%; margin:0 auto;}
}
/* Table */
@media (min-width: 768px){
   .container {width: 60%;margin:0 auto; margin-top: 50px; }
   .content .input-wrap  div {width: 50%; margin:0 auto;}
}
/*Desktop*/
@media (min-width: 1364px){
	.container {width: 40%; margin:0 auto; margin-top: 70px;}
    .content .input-wrap  div {width: 50%; margin:0 auto;}
    
}


/* Custom UI Control*/





</style>
<!-- Script -->
<script>
	 /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
</script>
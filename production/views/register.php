<?php

require_once "core/dbm.php";
 
$username             = "";
$password             = ""; 
$confirm_password     = "";
$username_err         = ""; 
$password_err         = "";
$confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                $stmt->store_result();
                // if given username and returned result are match int value 1 is retured else 0 will be returned
                if($stmt->num_rows == 1){
                    $username_err = "This username is not available.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Login error";
            }
            $stmt->close();
        }
    }
    /*  */
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            if($stmt->execute()){
                header("location: registered.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $mysqli->close();
}
?>
 






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GUB - Registration</title>
        <link rel="stylesheet" href="views/css/normalize.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <div class="header">
                <header class="head-section">
                    <div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
                    <h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
                </header>
            </div>
            <div class="content">
               <div class="title-wrap">
                <img src="img/admin.png" height="80px" width="80px">
                <h1>  <i class="fa fa-arrow-circle-o-down"></i> Registration</h1>
              </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-wrap">
                        <div>
                            <i class="fa fa-user"></i> Username
                            <input type="text" id="admin-email" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div>
                            <i class="fa fa-lock"></i> Password
                            <input type="password" id="admin-email" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div>
                            <i class="fa fa-lock"></i> Confirm Password
                            <input type="password" id="admin-email" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span><br>
                            <input type="submit" value="Signup"><input type="reset" value="Reset">
                        </div>
                    </div>
                    
                    <p style="text-align: center; color: purple; font-size: 14px;padding: 5px"><i class="fa fa-external-link"></i> <a href="login.php">Already have an account? - Login Here</a>.</p>
                </form>
            </div>
        </div>
    </body>
</html>

<style>

 * {outline:0px;}
 body {font-family: 'open sans'; background: #ddd}
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
   .container {width: 60%;margin:0 auto; margin-top: 30px; }
   .content .input-wrap  div {width: 50%; margin:0 auto;}
}
/*Desktop*/
@media (min-width: 1364px){
    .container {width: 40%; margin:0 auto; margin-top: 30px;}
    .content .input-wrap  div {width: 50%; margin:0 auto;}
    
}

/*
   UI
*/



input[type="submit"],input[type="reset"] 
 {
    border: none;
    padding: 10px;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
    margin: 5px;
}


input[type="submit"] {background-color: purple}
input[type="reset"]  {background-color: red}

input[type="submit"]:hover {background-color: #b019b0}
input[type="reset"]:hover  {background-color: #ff5e5e}

</style>

<script>
     /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
</script>
<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "admin" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php
    $cofirmation_message = "";
    $username = "";
    $password = "";
    $username_err = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
         $username = trim($_POST['username']);
         if($username == "admin"){
             session_unset();
             session_destroy();
         	 exit;
         }

         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

         require_once("core/dbm.php");

         $sql = "SELECT password FROM users WHERE username = ?";
         $stmt = $mysqli->prepare($sql);

         $stmt->bind_param("s",$username);
         $stmt->execute();
         $stmt->store_result();
         if($stmt->num_rows == 1){
         	 $cofirmation_message = '<p style="text-align:center; color:#0e8c16;"><i class="fa fa-check"></i> ' . 'Done: ' . $username . ' Password RESET Complete ..OK' . '</p>';
         	 $s = "UPDATE users SET password = ?  WHERE username = ?"; 
         	 $stmt= $mysqli->prepare($s);
         	 $stmt->bind_param("ss", $password ,  $username);
             $stmt->execute();
         } else {
         	$cofirmation_message = '<p style="text-align:center; color:red;"><i class="fa fa-frown-o"></i> ' . 'Error:  ' . $username . ' was not found!' . '</p>';
         }

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
		<div class="container" id="style-1">
			<div class="header">
				<header class="head-section">
					<div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
					<h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
				</header>
			</div>
			<!-- Navigation System -->
			<div class="navbar">
				<a id="menu" href="#" style="font-weight: normal"><i class="fa fa-bars"></i> MENU</a>
				<a href="admin-home.php"><i class="fa fa-chevron-circle-left"></i> Back to Admin</a>
				<a href="logout.php"><i class="fa fa-arrow-circle-o-up"></i> Logout</a>
				<div class="mega-menu">
					<p style="text-align: center; margin:0px;"><svg aria-label="close" class="icon" height="24" role="img" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></p>
					<div class="menu-wrap">
						<div class="profile">
							<img src="img/avater-male.png" height="80px" width="80px" alt=""><br>
							<span style="text-align:center;padding: 5px; background-color: #FA4E23 ; display: block;font-weight: normal; color:#fff"><?php echo $_SESSION['username'] ?></span>
							<div class="list-items">
								<ul>
									<li><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
									<li><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
									<li><a href="#"><i class="fa fa-cog fa-spin fa-2x"></i></a></li>
									<li><a href="#"><i class="fa fa-upload fa-2x"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Content -->
			<div class="content">
				<h1 style="font-weight: 300; text-align: center;"><i class="fa fa-user"></i> Password RESET REQUEST</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="container-form" style="background-color:white">
					    <label><?php echo $cofirmation_message; ?></label>
					    <p>Username</p>
						<input type="text"  name="username" class=" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" required>
						<p>New Password</p>
						 <input type="text"  name="password" placeholder="New Password(at least 6 Character)" required>
					</div>
					<div class="container-form">
						<input type="submit" value="RESET Password">
					</div>
					
				</form>
			</div>
		</div>
	</body>
</html>


<style>
form p {margin: 0  5px; font-size: 12px}
* {outline:0;}
body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.navbar         {font-family: 'Roboto';font-weight: 300;background-color: purple; position: sticky; top: 0px;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
.navbar a       {color:#fff; text-decoration: none; padding: 10px; font-size: 14px;display:inline-block;  }




.navbar a:hover {background-color: #b31eb3; transition: all .3s; cursor: pointer;}

.navbar .mega-menu  {border:1px solid #800080;background-color: rgba(255,255,255,.90); position: absolute; left:-100%; transition: 0.5s; width:40%;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.navbar .mega-menu img {margin-right: auto; margin-left: auto; display: block;}
.navbar .mega-menu .list-items ul            {margin: 0; padding: 0; font-weight: normal; flex: 1 0 100%; list-style: none}
.navbar .mega-menu .list-items ul li         {border-bottom: 1px solid #ddd}
.navbar .mega-menu .list-items ul li a       {color: #000; padding: 10px; text-align: center ;text-decoration: none; display: block;}
.navbar .mega-menu .list-items ul li a:hover {background-color: #ccc} 


/* Form container */
form {
  border: 3px solid #f1f1f1;
  font-family: 'Roboto';
}

.container-form {
  padding: 10px;
  background-color: #f1f1f1;
}

input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=text]:focus {
	  border: 1px solid purple;
	  transition: all .4s;
}


input[type=submit] {
  background-color: #04AA6D;
  color: white;
  border: none;
}

input[type=submit]:hover {
  opacity: 0.8;
}


.is-invalid {border: 1px solid red !important;}








@media (min-width: 320px){
	.container {width: 98%}
	.navbar .mega-menu {width: 22%;}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container {width: 98%}
    .navbar .mega-menu {width: 19%;}
}
/* Table */
@media (min-width: 768px){
   .container  {width: 50%;margin: 0 auto; height: 95vh; overflow-y: scroll; }
   .responsive {display: flex; flex-direction: row; flex-wrap: wrap;}
   .flex-items  {flex: 1 0 30%; margin: 3px;}
   .navbar .mega-menu {width:16%; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container  { width: 40%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
    .responsive { display: flex; flex-direction: row; flex-wrap: wrap; align-content:  center;}
    .flex-items  { flex: 1 0 30%;}
    .navbar .mega-menu   {width: 10%;}
}







#style-1::-webkit-scrollbar-track{border-radius: 5px;background-color: #F5F5F5;}
#style-1::-webkit-scrollbar {width: 3px;background-color: #F5F5F5;}
#style-1::-webkit-scrollbar-thumb { border-radius: 10px;background-color: #555;}

.progress      { width: 98%;  padding: 2px; border-radius: 3px; background-color: #fff; box-sizing: border-box; }
.hide-nav      {left: 0% !important; transition: 0.5s}

.icon{
	background-color: #f0f0f0;
	padding: 5px;
	margin:3px;
	color: #fff;
	border-radius: 20px;
    border:1px solid red;
}

.icon:hover {
	cursor: pointer;
	border: 1px solid red;
}

</style>

<script>


  const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
  const navmenu = document.querySelector(".mega-menu");
  const btn = document.querySelector(".navbar a:first-child");
  const close = document.querySelector(".icon");

  

   close.addEventListener('click',function(){
      navmenu.classList.toggle('hide-nav');
  });
  btn.addEventListener('click',function(){
      navmenu.classList.toggle('hide-nav');
  });
</script>
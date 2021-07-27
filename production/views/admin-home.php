<?php 
   session_start();
   if(isset($_SESSION['role']) && ($_SESSION['role'] === "user" && $_SESSION["status"] === "active") ){
   	  header("location: student-home.php");
   } else if(isset($_SESSION['role']) && ($_SESSION['role'] === "admin" && $_SESSION["status"] === "active")) {
   	  header("location admin-home.php");
   } else {
   	  header("location: approval.php");
   }



?>

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
		<div class="container" id="style-1">
			<!-- Header section -->
			<div class="header">
				<header class="head-section">
					<div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
					<h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
				</header>
			</div>
			<!-- Navigation System -->
			<div class="navbar">
				<a href="#"><i class="fa fa-cog fa-spin"></i> Dashboard</a>
				<a href="#">Manage</a>
				<a href="#">Config</a>
				<a href="logout.php"><i class="fa fa-arrow-circle-o-up"></i> Logout</a>
				<a href="#"> <i class="fa fa-user"></i> <?php echo $_SESSION['role'] ?></a>
			</div>
			
			<!-- main content area -->
			<div class="content">
		       <p>Welcome to dash</p>

			</div>
			<a href="logout.php">Logout</a>

			
			<!-- footer section -->
			<div class="footer">footer</div>
		</div>
	</body>
</html>
<!-- Stylesheets -->
<style>
       {border: 1px solid red;}
body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.navbar         {font-family: 'Roboto';font-weight: 300;background-color: purple; position: sticky; top: 0px;}
.navbar a       {color:#fff; text-decoration: none; padding: 10px; font-size: 14px;display:inline-block; }
.navbar a:hover {background-color: #b31eb3; transition: all .3s; cursor: pointer;}

.container {width: 100%}
/* media queries*/
/* Very Small devices*/
@media (min-width: 320px){
	.container {width: 98%}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container {width: 98%}
}
/* Table */
@media (min-width: 768px){
   .container {width: 80%;margin: 0 auto; height: 95vh; overflow-y: scroll; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container {width: 75%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
}


#style-1::-webkit-scrollbar-track{border-radius: 5px;background-color: #F5F5F5;}
#style-1::-webkit-scrollbar {width: 3px;background-color: #F5F5F5;}
#style-1::-webkit-scrollbar-thumb { border-radius: 10px;background-color: #555;}
</style>
<!-- Script -->
<script>
	 /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
</script>


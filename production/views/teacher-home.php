<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="views/css/normalize.min.css">
		<link rel="shortcut icon" type="image/jpg" href="img/fav.png">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
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
			<!-- Navigation System -->
			<div class="navbar">Navbar</div>
			
			<!-- main content area -->
			<div class="content"><h1>Teacher's Panel</h1></div>
			
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
body,html {font-family: 'ubuntu'; font-weight: 300}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.container {width: 100%}
/* media queries*/
/* Very Small devices*/
@media (min-width: 320px){
	.container {width: 98%;margin:0 auto;}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container {width: 98%;margin:0 auto;}
}
/* Table */
@media (min-width: 768px){
   .container {width: 80%;margin:0 auto;}
}
/*Desktop*/
@media (min-width: 1364px){
	.container {width: 75%; margin:0 auto;}
}
</style>
<!-- Script -->
<script>
	 /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
</script><?php
   echo "Admin";
?>
<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != 'sir' || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
      if(isset($_SESSION["status"]) && $_SESSION["status"] !== "active"){
   	  session_unset();
   	  session_destroy();
   	  header("location: approval.php");

   }
    
    $username = $_SESSION['username'];
    $complete_profile = "";
    require_once ("core/dbm.php");
    
    $m = $mysqli->query("SELECT `username` FROM `user_info` WHERE `username`='$username'");

    if($m->num_rows == 1){
    	$complete_profile = "done";
    }


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="shortcut icon" type="image/jpg" href="img/fav.png">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
				<a id="menu" href="#" style="font-weight: normal"><i class="fa fa-bars"></i> MENU</a>
				<a href="logout.php"><i class="fa fa-arrow-circle-o-up"></i> Logout</a>
				 <div class="mega-menu">
				 	<p style="text-align: center; margin:0px;"><svg aria-label="close" class="icon" height="24" role="img" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></p>
				    <div class="menu-wrap">
				    	<div class="profile">
				    		<a href="teacher-profile.php"> <img src="img/avater-male.png" height="80px" width="80px" alt=""></a><br>
                            <span style="text-align:center;padding: 5px; background-color: #FA4E23 ; display: block;font-weight: normal; color:#fff"><?php echo $_SESSION['username'] ?></span>
                            <div class="list-items">
                             <ul>
                            	<li><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
                            	<li><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
                            	<li><a href="#"><i class="fa fa-user fa-2x"></i></a></li>
                            	<li><a href="logout.php"><i class="fa fa-sign-out fa-2x"></i></a></li>
                            </ul>
                            </div>
				    	</div>
				    </div>
				 </div>
			</div>
			
			<!-- main content area -->
			<div class="content">
				<!-- Dashboard -->
				<?php
				   $username = $_SESSION['username'];

				   $firstname = "";
				   $lastname  = "";
				   $designation = "";
                   $welcome = "";

                   require_once ("core/dbm.php");
                   
                   $m = $mysqli->query("SELECT `firstname`,`lastname`,`designation` FROM `user_info` WHERE `username` = '$username'  ");
                   $r = $m->fetch_assoc();

                   if($m->num_rows == 1) {
                      	
                      $firstname   = $r['firstname'];
                      $lastname    = $r['lastname'];
                      $designation = $r['designation'];
                      
                      $welcome = "Welcome " . $firstname . " " . $lastname . " Sir  ## " . $designation . " of Green University";
                   } else {
                   	  $welcome = "Your Profile is incomplete";
                   }
                   

                  
				?>

				<p style="margin-left: 5px;background-color: #007EFF; color: #fff; display: inline-block;font-size: 14px; text-align: center; padding: 5px"><i class="fa fa-cog fa-spin"></i> <?php echo $welcome; ?></p>
				<p class="<?php echo (empty($complete_profile)) ? '' : 'display-none'; ?>"><a  href="teacher-profile.php"><i class="fa fa-external-link"></i> Please Complete your profile. Click Here</a></p>


		    	<div class="content-items">
			      		<i class="fa fa-envelope fa-3x"></i>
				</div>

			</div>
        </div>
		</body>
	</html>
<!-- Stylesheets -->
<style>


/* Styles for this page*/
.content a { padding: 5px; margin: 5px; background-color: yellow; color: #000; border-radius: 5px; text-align: center; }
.display-none {display: none}














 {border: 1px solid red;}
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


.container {width: 100%}
.responsive {display: flex; flex-direction: column; flex-wrap: wrap;}
.flex-items {width: 100%}









/* media queries*/
/* Very Small devices*/








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
   .container  {width: 80%;margin: 0 auto; height: 95vh; overflow-y: scroll; }
   .responsive {display: flex; flex-direction: row; flex-wrap: wrap;}
   .flex-items  {flex: 1 0 30%; margin: 3px;}
   .navbar .mega-menu {width:16%; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container  { width: 75%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
    .responsive { display: flex; flex-direction: row; flex-wrap: wrap; align-content:  center;}
    .flex-items  { flex: 1 0 30%;}
    .navbar .mega-menu   {width: 10%;}
}



/* UI Components */

hr {
	height: 0px;
	border-top: 1px solid #eee;
    outline: 0;

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
<!-- Script -->
<script>
	 /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
     
     /* Chartjs Setup >  config > getContext */
   

/*      const labels = [ 'admin','February','March','April']; // Label will be use along with x-axis - data will be placed along with y-axis. both must same number
       const data = {         labels: labels,
                            datasets: [{ label: 'Attendance',
                     backgroundColor: ['rgb(255, 99, 132)', 'rgb(233,233,210)', 'rgb(233,122,33,12)','rgb(12,33,44'], // making background for ecah bar
                         borderColor: [ 'rgb(255, 99, 132)','rgb(255, 99, 132)','rgb(255, 99, 132)','rgb(255, 99, 132)' ], // border color 
                                data: [0, 10,20,30],}]};


  const config = {type: 'doughnut',data,options: {}};
  var myChart = new Chart(document.getElementById('myChart'),config);*/

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
<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "admin" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>

<?php
// /* Handling Approve, Remove and Blocking Request */
//
//$approved = "";
//$blocked  = "";
//$removed  = "";
//$approval_err = "";
//$blocking_err = "";
//$removal_err  = "";
//$success = "";
//$teacher_success = "Added";
//$teacher_err = "";
//
//// Connect to The Database
//
//require_once "core/dbm.php";
//
//if($_SERVER['REQUEST_METHOD'] == 'POST') { 
//    /* Handle Approve UI*/
//    if(empty(trim($_POST['approve-user']))){
//        $approval_err = "Please enter username to approve";
//    } else { 
//        $sql = "SELECT id from users WHERE username = ?";
//        $stmt = $mysqli->prepare($sql);
//        $stmt->bind_param("s",$param_user);
//        $param_user = trim($_POST['approve-user']);
//        $stmt->execute();
//        $stmt->store_result();
//        if($stmt->num_rows == 1){
//        	$sql = "UPDATE users SET status = active WHERE username =  `${param_user}` "  ;
//        	$mysqli->query($sql);
//            $success = $param_user . " have been approved";
//        } else {
//        	$approval_err = $param_user . " doesn't found";
//         }
//        }
//}

$sms = "";
$request = "";
$registered = "";

require_once("core/dbm.php");

$s = $mysqli->query("SELECT * FROM `message`");
$sms =  $s->num_rows;


$ss = $mysqli->query("SELECT * FROM `users` WHERE `status` = 'pending'");
$request =  $ss->num_rows;

$sss = $mysqli->query("SELECT * FROM `users`");

$registered = $sss->num_rows;

$mysqli->close();



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
				    		<img src="img/avater-male.png" height="80px" width="80px" alt=""><br>
                            <span style="text-align:center;padding: 5px; background-color: #FA4E23 ; font-size: 12px; ;display: block;font-weight: normal; color:#fff"><?php echo $_SESSION['username'] ?></span>
                            <div class="list-items">
                             <ul>
                            	<li><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
                            	<li><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
                            	<li><a href="#"><i class="fa fa-cog fa-spin fa-2x"></i></a></li>
                            	<li><a href="logout.php"><i class="fa fa-arrow-circle-o-up fa-2x"></i></a></li>
                            </ul>
                            </div>
				    	</div>
				    </div>
				 </div>
			</div>
			
			<!-- main content area -->
			<div class="content">
				<!-- Dashboard -->
				<p class="item-title" > <i class="fa  fa-list-alt"></i> Dashboard</p>
				
				<div class="report responsive">
					<div class="inbox flex-items">
						 <h5 style="color:#fff; font-size: 1.5em; margin: 5px; font-weight: 300; text-align: center;"> <i  class="fa fa-envelope"></i> <?php echo empty($sms) ? '0' : $sms; ?> Messages </h5>
                         <div class="progress"></div>
						<p> <a href="admin-messages.php">View Messages </a></p>
					</div>
					<div class="request  flex-items">
						<h5 style="color:#fff; font-size: 1.5em; margin: 5px; font-weight: 300;text-align: center;"> <i  class="fa fa-spinner"> </i> <?php echo empty($request) ? '0' : $request; ?> Requests</h5>
						<div class="progress"></div>
						<p><a href="admin-request.php"> View Requests </a></p>
					</div>
					<div class="stat  flex-items">
						<h5 style="color:#fff; font-size: 1.5em; margin: 5px;font-weight: 300 ; text-align: center;"> <i class="fa fa-pencil-square-o "></i> <?php echo empty($registered) ? '0' : $registered; ?> Registered</h5>
						<div class="progress"></div>
						<p><a href="admin-registered.php">View Registered</a></p>
					</div>
				</div>
                
                <!-- Dashboard End -->
                
                <!-- Student Management -->
                <p class="item-title" style="margin-top:20px "><i class="fa fa-user"></i> User Management</p>
				          <div class="user-manager">
                    <div class="operations responsive">
                    	<div class="approve flex-items"><p style="text-align:center; color:#fff; padding:5px;background-color: #5D24D5"><i class="fa fa-plus-square"></i> Approve User</p>
                    	  <a href="admin-approve-users.php">Click Here to Approve</a>
                    	</div>
                    	<div class="block   flex-items"> <p style="text-align:center;padding:5px; color:#fff; background-color: #FA6B21"><i class="fa fa-power-off"></i> Block User</p>
                    	   <a href="admin-blocked-users.php">Click Here to Block</a>
                    	</div>
                    	<div class="remove  flex-items"> <p style="text-align:center;color:#fff; background-color: #F8432F;padding:5px"><i class="fa fa-close"></i> Remove User</p>
                    	   <a href="admin-removed-users.php">Click Here to Remove</a>
                    	</div>
                    	<div class="remove  flex-items"> <p style="text-align:center;color:#fff; background-color: #3A58EE;padding:5px"><i class="fa fa-plus-square"></i> Approve Teacher</p>
                    	   <a href="admin-add-teacher.php">Click Here to Add Teacher</a>
                    	</div>
                    </div>
			        	</div>

               <!-- Status management End -->
               <p class="item-title" style="margin-top:20px "><i class="fa fa-cog fa-spin"></i> System Operations </p><br>
                  <div class="user-manager">
                    <div class="operations responsive">
                  
                      <div class="block   flex-items"> <p style="text-align:center;padding:5px; color:#fff; background-color: #FA6B21"><i class="fa fa-power-off"></i> RESET Username</p>
                         <a href="admin-reset-user.php">RESET Now</a>
                      </div>

                      <div class="remove  flex-items"> <p style="text-align:center;color:#fff; background-color: #3A58EE;padding:5px"><i class="fa fa-plus-square"></i> RESET Password</p>
                         <a href="admin-reset-pass.php">RESET Now</a>
                      </div>

                      <div class="approve flex-items"><p style="text-align:center; color:#fff; padding:5px;background-color: #5D24D5"><i class="fa fa-plus-square"></i> Backup </p>
                        <a href="database-backup.php">Database Backup</a>
                      </div>

                      <div class="remove  flex-items"> <p style="text-align:center;color:#fff; background-color: #F8432F;padding:5px"><i class="fa fa-close"></i> RESTORE </p>
                         <a href="admin-removed-users.php">View</a>
                      </div>

               

                    </div>
                </div>
               
			</div>
          </div>
		</body>
	</html>
<!-- Stylesheets -->
<style>
{border: 1px solid red;}
body,html {font-family: 'Open sans'; background: #bbb;}
/* handle very small devices < 320px*/
.container { background-color: #ddd; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

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


.container { width: 100%; overflow-x: hidden}
.responsive {display: flex; flex-direction: column; flex-wrap: wrap;}
.flex-items {flex: 1 0 100%;}




/* content Area */

.content                    {width: 98%; margin: 0 auto; font-family: 'Roboto' }
.content .item-title        { border-radius: 3px; background-color: purple; color:#fff; text-align: center; padding: 5px; margin:5px; display: inline-block; font-size: 14px}
.content .report , .user-manager           {box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);font-family: 'Roboto'; font-size: 14px; background-color: #fff  }
.content .report .inbox     {margin-top: 5px; padding: 4px ;border-radius: 3px; margin-bottom: 5px;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);color:#fff;background: linear-gradient(45deg, #6a11cb , #2575fc);}
.content .report .inbox a   {color: #fff; text-align: center; display: block;  }
.content .report .request a , .content .report .stat a {color: #fff; text-align: center; display: block;  }

.content .report .request   {margin-top: 5px; padding: 4px ;border-radius: 3px; margin-bottom: 5px;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);;color:#fff;background: linear-gradient(45deg,#fc4a1a, #f7b733);}
.content .report .stat      {margin-top: 5px; padding: 4px ;border-radius: 3px; margin-bottom: 5px;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);;color:#fff;background: linear-gradient(45deg,#ee0979, #ff6a00);}



.content .user-manager  .operations .remove  { margin: 5px ; background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);  }
.content .user-manager  .operations .block   { margin: 5px ;background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
.content .user-manager  .operations .approve { margin: 5px ;background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
    .content .user-manager  .operations a    { 
     padding: 10px ;display: block; text-align: center; background-color: purple; color: #fff; margin: 0 auto; width: 70%; border-radius: 20px; margin-top: 20px;  margin-bottom: 25px 

 }


.content .user-manager  .operations  ul li  {display: inline-block; padding: 5px;}
.content .teachers {width:98%; background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%); margin: 0 auto}

    #teacher { border: 1px solid purple; padding: 5px; font-size:14px ;border-radius: 5px; background-color: #fff; display: inline-block}
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
   .flex-items  {flex: 1 1 18%; margin: 3px;}
   .navbar .mega-menu {width:16%; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container  { width: 75%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
    .responsive { display: flex; flex-direction: row; flex-wrap: wrap;  align-content:  center;}
    .flex-items  { flex: 1 1 18%;}
    .navbar .mega-menu   {width: 10%;}
   
    }



/* UI Components */

hr {
	height: 0px;
	border-top: 1px solid #eee;
    outline: 0;

}


.is-invalid {border: 1px solid red !important;}
.invalid-feedback {color: red; font-size: 12px} 
    
#ui-txt,#ui-pass {width: 95%;padding: 5px; border: 1px solid #f0f0f0; background-color: #ddd; border-radius: 5px}
#ui-txt:focus,#ui-pass:focus {border: 1px solid purple; transition: all  1s}
    
#ui-btn {background-color: purple;padding: 10px; color: #fff; border: 1px solid purple; width: 100%; border-radius: 5px}


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
    
    * {outline: 0}
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






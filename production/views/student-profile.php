<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "user" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php
  
  // Form Field serial phone fastname lastname department email gender address username

  $username = $_SESSION['username'];
  // $serial  no need to fetch

  $phone = ""; //  must check duplication
  $phone_err = "";
  $firstname = "";
  $lastname = "";
  $emails = ""; // check duplicate value
  $department = ""; // fixed no need to query or update
  $gender = "";
  $address = "";
  $designation =""; // restricted only available in teachers sections
  $success = "";


   

  require_once("core/dbm.php");

 
  // $sql = "SELECT id FROM users WHERE username = ?";
  // $stmt = $mysqli->prepare($sql);
  
  // $stmt->bind_param("s",$username);
  // $stmt->execute();
  // $stmt->store_result();
  // if($stmt->num_rows == 1){
  //        } else {
       
  //   }
  // Use for data lookup




// Fetch one row only so we don't need to use loop - First Check the Query in Heidi SQL then use it here

// $sql = "SELECT id FROM users WHERE username = '$username'" ;
// $result = $mysqli->query($sql);
// $row = $result->fetch_assoc();
// $id = $row['id'];
// echo $id . ' and user ' . $username;
// $mysqli->close();

// Data Testing - 1
// Debug MODE:
// ERROR



// Fetch user id first

$username = $_SESSION['username'];

$sql = "SELECT id from users WHERE username = '$username'";

// We must handle error while fetching data from users beacuse id no is important


// now Update Profile with username and id
// Case-1 table does not exist then create table.
// Case-2 username found so update data
// Case-3 username does not found . INSERT data



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = trim($_POST['firstname']); 
    $lastname  = trim($_POST['lastname']); 
    $emails    = trim($_POST['emails']); 
    $gender    = trim($_POST['gender']); 
    $years     = trim($_POST['years']);
    $sems      = trim($_POST['sems']);
    $address   = trim($_POST['address']); 
    
    if(!preg_match('/^[0-9]{11}+$/', $_POST['phones'])){
        $phone_err = "Please Check Phone number";
    } else {
        $phone = trim($_POST['phones']);
           $m = $mysqli->query("INSERT INTO `webmaster`.`user_info` ( `phone`, `firstname`, `lastname`, `email`,`gender`, `address`, `username`,`sems`,`year`) VALUES ( '$phone', '$firstname', '$lastname', '$emails', '$gender' ,'$address', '$username','$years','$sems')" );
           $success = '<p style="text-align:center; color:#0e8c16;"><i class="fa fa-check"></i> ' . 'Done: ' . $username . ' Your Data has been updated ..' . '</p>'; 
            if(!$m){
               $success = '<p style="text-align:center; color:red; font-size: 13px"><i class="fa fa-close"></i> ' . 'Error: Please Recheck the form. or Message to admin ' . '</p>'; 
            }
    }
    
    
    /*Data Update - Checking Existance in Database */
    
   
    
    
}



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Green University of Bangladesh</title>
	</head>
	<body id="style-1">
		<div class="container-box" id="style-1">
			<div class="header">
				<header class="head-section">
					<div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
					<h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
				</header>
			</div>
			<!-- Navigation System -->
			<div class="navbar">
				<a id="menu" href="#" style="font-weight: normal"><i class="fa fa-bars"></i> MENU</a>
				<a href="student-home.php"><i class="fa fa-chevron-circle-left"></i> Back to Home</a>
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
									<li><a href="#"><i class="fa fa-sign-out fa-2x"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Content -->

			<div class="wrap">
				<h2 style="text-align: center; font-weight: 300 "><i class="fa fa-cog fa-spin"></i> Profile Information</h2>
				<?php if(!(empty($success))) echo $success ?>
				<form action="student-profile.php" method="post">
					<p>First Name:</p>
					<input type="text" name='firstname' placeholder="First Name" required>
					<p>Last Name:</p>
					<input type="text" name='lastname' placeholder="Last Name" required>
					<p>Phone:</p>
					<input type="text" id="phone" name='phones' placeholder="Phone(11 Digits)"  class="<?php echo (!empty($phone_err)) ? 'invalid' : ''; ?>" required>
					<p>Email:</p>
					<input type="email"  name='emails' placeholder="Email">
					<input type="text" placeholder="Department" value="CSE" disabled="true" style="display: none">
					<select name="years" id="yr" required>
                      <option value="select">-- Year --</option>
                      <option value="1">1st Year</option>
                      <option value="2">2nd Year</option>
                      <option value="3">3rd Year</option>
                      <option value="4">4th Year</option>
                    </select>
                    <select name="sems" id="sm" required>
                    	<option value="select">-- Semester --</option>
                    	<option value="1">Spring - 1 </option>
                    	<option value="2">Summer - 2 </option>
                    	<option value="3">Fall - 3 </option>
                    </select>
                    <select name="gender" id="gen" required>
                    	<option value="select">-- Gender --</option>
                    	<option value="male">Male</option>
                    	<option value="female">Female</option>
                    	<option value="other">Other</option>
                    </select>
                    <p>Address:</p>
                    <input type="text" name="address" placeholder="address">
                    <input type="submit" value="Submit Data">
				</form>
			</div>
		</div>
	</body>
</html>


<style>

/* Style for this Page*/


#yr, #sm , #gen { border: 1px solid purple; padding: 3px; }


 /* User Form*/


/* Style inputs, select elements and textareas */
* {outline:0;}
form {margin: 0 auto;}
form p {margin: 0  5px; font-size: 12px}
input[type=text], input[type=email],select, textarea{
  width: 95%;
  padding: 7px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  margin: 5px;
}

input[type=text]:focus, input[type=email]:focus {border: 1px solid #04AA6D; transition: all .5s}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 8px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin: 5px;
}


.invalid {color: red}
.invalid {border: 1px solid red !important;}





 {border: 1px solid red;}
body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container-box { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.navbar         {font-family: 'Roboto';font-weight: 300;background-color: purple; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
.navbar a       {color:#fff; text-decoration: none; padding: 10px; font-size: 14px;display:inline-block;  }




.navbar a:hover {background-color: #b31eb3; transition: all .3s; cursor: pointer;}

.navbar .mega-menu  {border:1px solid #800080;background-color: rgba(255,255,255,.90); position: absolute; left:-100%; transition: 0.5s; width:40%;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.navbar .mega-menu img {margin-right: auto; margin-left: auto; display: block;}
.navbar .mega-menu .list-items ul            {margin: 0; padding: 0; font-weight: normal; flex: 1 0 100%; list-style: none}
.navbar .mega-menu .list-items ul li         {border-bottom: 1px solid #ddd}
.navbar .mega-menu .list-items ul li a       {color: #000; padding: 10px; text-align: center ;text-decoration: none; display: block;}
.navbar .mega-menu .list-items ul li a:hover {background-color: #ccc} 


@media (min-width: 320px){
	.container-box {width: 98%}
	.navbar .mega-menu {width: 22%;}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container-box {width: 98%}
    .navbar .mega-menu {width: 19%;}
}
/* Table */
@media (min-width: 768px){
   .container-box  {width: 80%;margin: 0 auto; height: 95vh; overflow-y: scroll; }
   .responsive {display: flex; flex-direction: row; flex-wrap: wrap;}
   .flex-items  {flex: 1 0 30%; margin: 3px;}
   .navbar .mega-menu {width:16%; }
   form {width: 70%}
}
/*Desktop*/
@media (min-width: 1364px){
	.container-box  { width: 75%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
    .responsive { display: flex; flex-direction: row; flex-wrap: wrap; align-content:  center;}
    .flex-items  { flex: 1 0 30%;}
    .navbar .mega-menu   {width: 10%;}
    form {width: 60%; margin: 0 auto;}
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



  // Form validation


 
</script>
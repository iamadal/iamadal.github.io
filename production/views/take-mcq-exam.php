<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "user" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>



<?php
    
   if(isset($_GET['len'])){

   	  $time    =  $_GET['len'];
   	  $e_id    =  $_GET['e_id'];
   	  $e_name  =  $_GET['exam_name'];
   	  $teacher =  $_GET['teacher'];
   	  $sems    =  $_GET['sems'];
   	  $year    =  $_GET['year'];
   	  $markss    = $_GET['marks'];

   	  $_SESSION['teacher']   = $teacher;
   	  $_SESSION['e_id']      = $e_id;
   	  $_SESSION['e_name']    = $e_name;
   	  $_SESSION['sems']      = $sems;
   	  $_SESSION['year']      = $year;
   	  $_SESSION['marks']    = $markss;
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
				<a href="student-home-exam.php"><i class="fa fa-chevron-circle-left"></i> Back to Home</a>
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
			<h1 style="text-align: center; color: red" id="demo"><h1/>
			
			<div class="contents">
                     <table border="1">

                        <tr style="background-color: purple;"> <td> no.  </td> <td> Question </td> <td>  1 </td> <td>  2 </td> <td>  3 </td> <td>  4 </td>  </tr>
                      
                        <?php
                         require_once("core/dbm.php");
                         $dbs = $e_id . "_" . $teacher;
                         $sql = " SELECT * FROM ". $dbs ." ";

                         $result = $mysqli->query($sql);
                         
                         while($row = $result->fetch_assoc()){
                         echo '<tr>';
                            echo '<td style="text-align:center">' . $row['qn'] .        '</td>'; 
                            echo '<td style="text-align:center">' . $row['question'] .        '</td>'; 
                            echo '<td style="text-align:center">' . $row['option_1'] .   '</td>'; 
                            echo '<td style="text-align:center">' . $row['option_2'] .     '</td>'; 
                            echo '<td style="text-align:center">' . $row['option_3'] .     '</td>'; 
                            echo '<td style="text-align:center">' . $row['option_4'] .     '</td>'; 
                            
                         echo '</tr>'; 


                     }
                     if($result->num_rows == 0) {
                      echo '<h3 style="text-align:center; color: red"> No Messages </h3>';
                     }
                      
                     
                     ?>
                    <tr><td colspan="6"><form action="verify.php" method="post"><input type="text" name="answer" placeholder="answer(E.G: 1 6 3 2 7 3 4 2 1 4)" required="true"><input type="submit" value="Submit answer"></form></td></tr>
                    </table>
              
    
			</div>
			
		</div>
	</body>
</html>


<style>
 * {outline: 0px;}

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

	 table ,tr ,td { border-collapse: collapse; padding: 10px; margin: 0 auto; font-family: 'Roboto' ; font-size: 13px}
  tr:first-child td {color:#fff; text-align: center;}
  

body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
 .btn {background-color: red; color: #fff; padding: 5px; margin:2px; text-decoration: none; border-radius: 5px}
.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.navbar         {font-family: 'Roboto';font-weight: 300;background-color: purple; position: sticky; top: 0px;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
.navbar > a       {color:#fff; text-decoration: none; padding: 10px; font-size: 14px;display:inline-block;  }




.navbar > a:hover {background-color: #b31eb3; transition: all .3s; cursor: pointer;}

.navbar .mega-menu  {border:1px solid #800080;background-color: rgba(255,255,255,.90); position: absolute; left:-100%; transition: 0.5s; width:40%;box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.navbar .mega-menu img {margin-right: auto; margin-left: auto; display: block;}
.navbar .mega-menu .list-items ul            {margin: 0; padding: 0; font-weight: normal; flex: 1 0 100%; list-style: none}
.navbar .mega-menu .list-items ul li         {border-bottom: 1px solid #ddd}
.navbar .mega-menu .list-items ul li a       {color: #000; padding: 10px; text-align: center ;text-decoration: none; display: block;}
.navbar .mega-menu .list-items ul li a:hover {background-color: #ccc} 


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
   .container  {width: 80%;margin: 0 auto; height: 100vh; overflow-y: scroll; }
   .responsive {display: flex; flex-direction: row; flex-wrap: wrap;}
   .flex-items  {flex: 1 0 30%; margin: 3px;}
   .navbar .mega-menu {width:16%; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container  { width: 75%; margin: 0 auto; height: 100vh; overflow-y: scroll; }
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

.hide {display: none;}

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




<script>
var time = <?php echo $time; ?>; // This is the time allowed
var saved_countdown = localStorage.getItem('saved_countdown');

if(saved_countdown == null) {
    // Set the time we're counting down to using the time allowed
    var new_countdown = new Date().getTime() + (time) * 60 * 1000;

    time = new_countdown;
    localStorage.setItem('saved_countdown', new_countdown);
} else {
    time = saved_countdown;
}

var x = setInterval(() => {

    // Get today's date and time
    var now = new Date().getTime();


    var distance = time - now;

   

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

   document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
        
    if (distance < 0) {
        clearInterval(x);
        localStorage.removeItem('saved_countdown');
        document.getElementById("demo").innerHTML = "Time Out";
        document.querySelector(".contents").classList.toggle('hide');
    }
}, 1000);
</script>

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
                      
                      $welcome = "Welcome " . $firstname . " " . $lastname . " Sir  - " . $designation . " of Green University -";
                   } else {
                      $welcome = "Your Profile is incomplete";
                   }
                   

                  
        ?>


<?php
  
  

   if(!isset($_SESSION['message_assignments'])){
      $_SESSION['message_assignments'] = "";
   }

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
     $_SESSION['ass_id']         = trim($_POST['ass_id']);
     $_SESSION['designation']         = $designation;
     
     $_SESSION['title']          = trim($_POST['title']);
     $_SESSION['points']         = trim($_POST['points']);
     $_SESSION['year']           = $_POST['year'];
     $_SESSION['sems']           = $_POST['sems'];
     $_SESSION['deadline']       = $_POST['deadline'];

     header("location: upload-sir.php");

     
    }

     // if(isset($_FILES['name'])){
     //       $target_file = "uploads/" . $filename;
     //       move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file);
     // }

     
   //   require_once("core/dbm.php");
     
   //  $m = $mysqli->query( "INSERT INTO `webmaster`.`assignments` ( `ass_id`, `by`, `title`,`designation`,`points`,`file_location`,`dead_line`,`sems`,`year`) VALUES ( '$ass_id', '$by', '$title','$designation','$points','$filename','$deadline','$sems','$year')"   );
   //  if($m){
   //     $message_assignments = '<p style="font-size:14px; padding:5px;color:#000;text-align:center; background-color:yellow">' . $title . " with id=" . $ass_id . " is Created" . '</p>' ;
   //  } else {
   //     $message_assignments = '<p style="color:#fff; font-size:14px; padding:5px; ;text-align:center; background-color:red"> Please Check ID </p>' ;
   //  }
    
   // }

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


				<p style="margin-left: 5px;background-color: #007EFF; color: #fff; display: inline-block;font-size: 14px; text-align: center; padding: 5px"><i class="fa fa-cog fa-spin"></i> <?php echo $welcome; ?></p>
				<p class="bgc <?php echo (empty($complete_profile)) ? '' : 'display-none'; ?>"><a  href="teacher-profile.php"><i class="fa fa-external-link"></i> Please Complete your profile. Click Here</a></p>


		            <div class="tabbed <?php echo (!empty($complete_profile)) ? '' : 'display-none'; ?>">
                  <ul>
                    <li><a href="teacher-home.php">Messages</a></li>
                    <li><a href="teacher-home-exam.php" >Exam</a></li>
                    <li><a href="teacher-home-assignment.php" style="background-color:purple;color:#fff">Assignment</a></li>
                    <li><a href="teacher-home-live.php">Live Class</a></li>
                    <li><a href="teacher-home-report.php">Report</a></li>
                  </ul>
                  <div class="tabbed-content responsive">
                     <div class="A flex-items" style="border:1px solid #ddd;font-size: 13px">
                     

                      <p style="text-align: center; background-color: purple; margin:0px; color:#fff;padding: 5px">Create an Assignment</p>
                      <?php echo $_SESSION['message_assignments']; ?>
                   


                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="ass_id" placeholder="Assignment ID(0 - 10 Digit) E.G 23221" required="true">
                        <input type="text" name="title" placeholder="Assignment title" required="true">
                        <input type="text" name="points" placeholder="Points(1-100)" required="true">
                        <label style="" for="">Deadline:</label><input style="padding: 5px" name="deadline" type="date" required="true">
                        <select name="year" required="true">
                          <option value="0">--Select Year--</option>
                          <option value="1">1st Year</option>
                          <option value="2">2nd Year</option>
                          <option value="3">3rd Year</option>
                          <option value="4">4th Year</option>
                        </select>

                        <select name="sems" required="true">
                          <option value="0">--Select Semester</option>
                          <option value="1">Spring 1</option>
                          <option value="2">Summer 2</option>
                        </select>
                        <input type="submit" value="Upload Files">
                      </form>
                    




                     </div>
                    <div class="flexitems b" style="border:1px solid red">
                          <p style="text-align: center; background-color: red; margin-bottom:5px; margin-top:0 ;color:#fff;padding: 5px; font-size: 14px"> Active Assignments </p>
              <table border="1">
                <tr style="background-color: purple;"> <td> ID </td> <td>Deadline</td>   </tr>
                     <?php
                     require_once("core/dbm.php");
                     $result = $mysqli->query("SELECT `ass_id`,`dead_line` FROM `assignments`   ORDER BY `dead_line` DESC LIMIT 1000 ");
                     while($row = $result->fetch_assoc()){
                           echo '<tr>';
                                echo '<td style="text-align:center">' . $row['ass_id'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['dead_line'] .        '</td>'; 
                           echo '</tr>';
                           
                     }
                     if($result->num_rows == 0) {
                      echo '<h3 style="text-align:center; color: red"> No Messages </h3>';
                     }
                       

                     ?>
                      </table>
                    </div>
                    <div class="flexitems c" style="border:1px solid purple">
                        <p style="text-align: center; background-color: yellow; margin-bottom:5px;margin-top:0 ; color:#000;padding: 5px; font-size: 14px">Your Assignments </p>
                        <table border="1">
                <tr style="background-color: purple;"> <td> ID </td> <td> Title </td> <td> Year </td> <td> Sems </td> <td>Deadline</td> <td>Points</td> <td>Action</td> <td> Documents </td>  </tr>
                     <?php
                     $username = $_SESSION['username'];
                     require_once("core/dbm.php");
                     $result = $mysqli->query("SELECT `ass_id`,`title`,`year`,`sems`,`dead_line`,`points`,`file_location` FROM `assignments` WHERE `by`='$username' ORDER BY `dead_line` DESC LIMIT 1000 ");
                     while($row = $result->fetch_assoc()){
                           echo '<tr>';
                                echo '<td style="text-align:center">' . $row['ass_id'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['title'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['year'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['sems'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['dead_line'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['points'] .        '</td>'; 
                                echo '<td >' . '<a style="background-color: red; color: #fff; padding:5px; text-decoration:none;";  href="delete-assignments.php?ass_id=' . $row['ass_id'] . ' "  ">   Delete</a>' . '</td>';
                                echo '<td>'  . '<a style="color:#fff; background-color:purple; text-decoration: none; padding:5px" href="'  . $row['file_location'] . ' "  ">' . ' View</a>';
                           echo '</tr>';
                     }
                     if($result->num_rows == 0) {
                      echo '<h3 style="text-align:center; color: red"> No Messages </h3>';
                     }
                       

                     ?>
                     </table>   
                    </div>
                      
                  </div> 
                </div>

			</div>
        </div>
		</body>
	</html>
<!-- Stylesheets -->
<style>


/* Styles for this page*/
 * {outline: 0px;}

  table ,tr ,td { border-collapse: collapse; padding: 10px; margin: 0 auto; font-family: 'Roboto' ; font-size: 13px}
  tr:first-child td {color:#fff; text-align: center;}
  tr:hover {cursor: pointer; background-color: #eee}


form {margin: 0 auto;}
form p {margin: 0  5px; font-size: 12px !important}
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




 /* Styles for this page*/

.content .bgc { padding: 5px; margin: 5px; background-color: yellow; color: #000; border-radius: 5px; text-align: center  ; color:#000;}
.display-none {display: none}

.content .tabbed {margin: 5px}
.content .tabbed ul {list-style: none;margin: 0; padding: 0; display: flex; }
.content .tabbed ul li{ border: 1px solid purple; border-bottom: none; flex: 0 0 100px ; font-size: 14px;border-left:none; }
.content .tabbed ul li:first-child {border-left:1px solid purple;}
.content .tabbed ul li a{text-decoration: none; display: block; padding: 10px; text-align: center;color:#000;}
.content .tabbed ul li a:hover{color: #fff; background-color: purple; transition: all .2s}

.content .tabbed .tabbed-content     {clear: both; border: 1px solid purple;}
.content .tabbed .tabbed-content div {margin: 5px}



.display-none {display: none}














 {border: 1px solid red;}
body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'Roboto';}
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
.flex-items {width: 98%}









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
   .container  {width: 100%;margin: 0 auto; height: 95vh; overflow-y: scroll; }
   .responsive {display: flex; flex-direction: row; flex-wrap: wrap;}
   .flex-items  {flex: 1 0 30%; margin: 3px;}
   .navbar .mega-menu {width:16%; }
}
/*Desktop*/
@media (min-width: 1364px){
  .container  { width: 100%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
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
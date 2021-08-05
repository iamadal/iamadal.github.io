<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "user" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }


  
?>

<!-- Session Control -->
<?php

 $is_submitted = "Please upload your document.";
 $bool_submit = 0;
 $ass_ids = "";
 
 if(isset($_GET['ass_id'])){
     $ass_ids = $_GET['ass_id'];
     $_SESSION['ass_ids'] = $ass_ids;
 }




/* Check File Submission */
require_once("core/dbm.php");
   $mn = $mysqli->query("SELECT `file_location` FROM `ass_students` WHERE `ass_id` = '$ass_ids'  ");
   $s = $mn->fetch_assoc();
   if($mn->num_rows == 1) {
   	   if(file_exists($s['file_location'])){
   	   	   $is_submitted = "You have already submitted the Assignment";
   	   	   $bool_submit  = 1; 
   	   } else {
   	   	 $bool_submit  = 0;
   	   }
   }


 
// Handle Post request
 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $ass_id       = $_SESSION['ass_ids'];
  $by           = $_SESSION['username'];
  $target_dir   = "uploads_std/";
  $target_file  = $target_dir . $_SESSION['ass_ids'] . "_" . $by . "_". basename($_FILES["file"]["name"]);
  $sems         = 0;
  $year         = 0;
  $sub          = 1;
  $username     = $_SESSION['username'];


   require_once("core/dbm.php");
   $m  = $mysqli->query("SELECT `sems`,`year` FROM `user_info` WHERE `username` = '$username'  ");
    $r = $m->fetch_assoc();
       if($m->num_rows == 1) {
            $sems        = $r['sems'];
            $year        = $r['year'];
     }
                  

 if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
     require_once("core/dbm.php");

    $m = $mysqli->query( "INSERT INTO `webmaster`.`ass_students` ( `ass_id`, `by`, `year` , `sems` , `file_location`,`submitted` ) VALUES ('$ass_id','$by','$year','$sems','$target_file','$sub')"   );
    if($m){
       header("location: student-home-assignment.php");
    } else {
    	$mysqli->query( "UPDATE `webmaster`.`ass_students` SET `file_location` = '$target_file'  " );
        header("location: student-home-assignment.php");

    }

   
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
				<a href="student-home-assignment.php"><i class="fa fa-chevron-circle-left"></i> Back to Home</a>
				<a href="logout.php"><i class="fa fa-arrow-circle-o-up"></i> Logout</a>
			</div>
			<!-- Content -->
			<div class="content-upload">
				<h1 style="text-align: center; background-color: yellow; color: #000;"><i class="fa fa-file"></i> <?php echo $_SESSION['username']; ?> -  <?php echo $is_submitted;?></h1>
				<h3 style="text-align: center; color:#000;  font-weight: 300">Assignment ID:<?php echo $ass_ids;?> </h3>


                 <form id="forms" class="<?php echo ($bool_submit) ? 'display-none' : '' ?>" style="border: 1px solid purple; margin: 0 auto; width: 40%; padding: 5%" action="student-upload.php" method="post" enctype="multipart/form-data">
                   <input type="file" name="file" required="true"><br>
                   <input type="submit" name="submit">
                 </form>

			</div>
		</div>
	</body>
</html>


<style>

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


input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 8px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin: 5px;
  font-size: 14px;
}

input[type=file] {
  background-color: #04AA6D;
  color: white;
  padding: 8px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin: 5px;
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


.display-none {
	display: none;
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
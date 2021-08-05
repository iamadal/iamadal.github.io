<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "sir" || !isset($_SESSION['username'])){
   	  header("location: 404.php");
   }
?>


<?php



if(isset($_GET['exam-id'])){
	 $_SESSION['exam_id']    = $_GET['exam-id'];
     $_SESSION['exam_name']  = $_GET['exam-name'];
     $_SESSION['marks']      = $_GET['marks'];
     $_SESSION['duration']   = $_GET['duration'];
     $_SESSION['semss']      = $_GET['sems'];
     $_SESSION['years']      = $_GET['year'];

}


 $exam_id     =  $_SESSION['exam_id'] ;
 $exam_name   =  $_SESSION['exam_name']; 
 $by          =  $_SESSION['username'];
 $designation =  $_SESSION['designation'];
 $marks       =  $_SESSION['marks'];  
 $duration    =  $_SESSION['duration'];
 $sems        =  $_SESSION['semss'] ;
 $year        =  $_SESSION['years'];



// Create a Table Based On exam id and user id






// INSERT Exam information

 require_once("core/dbm.php");
 
 $sql = "INSERT INTO `webmaster`.`exam` (`exam_id`, `exam_name`, `by`, `designation`, `marks`, `duration`, `sems`, `year`) VALUES ('$exam_id', '$exam_name', '$by', '$designation', '$marks', '$duration', '$sems', '$year');";
 $r = $mysqli->query($sql);
 if($r){
 	$message = 'MCQ Exam' . 'with ID: ' .$_SESSION['exam_id']  . " is Created. Now Add Question";
 } else {
 	$message = 'MCQ Exam' . 'with ID: ' . $_SESSION['exam_id']  . "Cannot be Created. Check Input form";
 }
  


    $dbs = $exam_id ."_".$by;

  require_once("core/dbm.php");
  $sql = "CREATE TABLE ".$dbs." (
  `qn` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `option_1` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `option_2` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `option_3` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `option_4` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `correct_option` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
  PRIMARY KEY (`qn`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=InnoDB" ;


 $mysqli->query($sql); 



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
			
			<!-- Content -->
            <div class="responsive">

            	<div class="flex-items" >
            		<h3 style="text-align: center;">Add Questions for: <?php echo $exam_name; ?> ## ID: <?php echo $exam_id; ?></h3>
            		<form action="add-mcq-question.php" method="get">
            		 <input type="text" name="question_no" placeholder="Question Name" required="true">
            		 <input type="text" name="option_1" placeholder="Option 1" required="true">
            		 <input type="text" name="option_2" placeholder="Option 2" required="true">
            		 <input type="text" name="option_3" placeholder="Option 3" required="true">
            		 <input type="text" name="option_4" placeholder="Option 4" required="true">
            		 <p>Which Option is correct?</p>
            		 <select name="correct_options" id="ns">
            		 	<option value="1">1</option>
            		 	<option value="2">2</option>
            		 	<option value="3">3</option>
            		 	<option value="4">4</option>
            		 </select>
            		<button type="submit"><i class="fa fa-plus"></i> Add Question</button>	
            		 <a style="background-color: yellow; color: #000;padding: 5px; border-radius: 5px; text-decoration: none " href="teacher-home-exam.php" ><i class="fa fa-home"></i> Save and Exit </a>
            		</form>
                   
            	</div>
            	<div class="flex-items">
            		<p style="text-align: center; background-color: yellow; color:#000; padding: 10px"> Added Questions   </p>
                        <table border="1">
                <tr style="background-color: purple;"> <td> no. </td> <td> Question </td> <td> OP 1 </td> <td> OP 2 </td> <td>OP 3</td> <td>OP 4</td> <td>Ans.</td> <td>Action</td>   </tr>
                     <?php
                     $username = $_SESSION['username'];
                     require_once("core/dbm.php");
                     $result = $mysqli->query("SELECT `qn`,`question`,`option_1`,`option_2`,`option_3`,`option_4`,`correct_option` FROM ".$dbs." ");
                     while($row = $result->fetch_assoc()){
                           echo '<tr>';
                                echo '<td style="text-align:center">' . $row['qn'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['question'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['option_1'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['option_2'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['option_3'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['option_4'] .        '</td>'; 
                                echo '<td style="text-align:center">' . $row['correct_option'] .        '</td>'; 
                                echo '<td >' . '<a style="background-color: red; color: #fff; padding:5px; text-decoration:none;";  href="delete-mcq-question.php?qn=' . $row['qn'] . ' "  ">   Delete</a>' . '</td>';
                           echo '</tr>';
                     }
                     if($result->num_rows == 0) {
                      echo '<h3 style="text-align:center; color: red"> No Messages </h3>';
                     }
                       

                     ?>
            	</div>
            </div>
			
		</div>
	</body>
</html>


<style>

a.add {
	background-color: purple;
	color: #fff;
	text-decoration: none;
	padding: 5px;
	display: block;
	width: 234px;
	text-align: center;
	
	margin: 0 auto;
}










body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}
.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'Roboto';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}


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
   .container  {width: 80%;margin: 0 auto; height: 95vh;  }
   .responsive {display: flex; flex-direction: row; flex-wrap: wrap;}
   .flex-items  {flex: 1 0 30%; margin: 3px;}
   .navbar .mega-menu {width:98%; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container  { width: 98%; margin: 0 auto; height: 95vh;  }
    .responsive { display: flex; flex-direction: row; flex-wrap: wrap; align-content:  center;}
    .flex-items  { flex: 1 0 30%;}
    .navbar .mega-menu   {width: 10%;}
}

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
input[type=submit],button {
  background-color: #04AA6D;
  color: white;
  padding: 8px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin: 5px;
}



</style>

<script>
  const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);


  


</script>
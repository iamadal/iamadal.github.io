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

?>


<?php


     $ass_id      = $_SESSION['ass_id'];     
     $by          = $_SESSION['username'];    
     $designation = $_SESSION['designation'];        
     $title       = $_SESSION['title'];          
     $points      = $_SESSION['points'];         
     $year        = $_SESSION['year'];           
     $sems        = $_SESSION['sems'];          
     $deadline    = $_SESSION['deadline'];       


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $target_dir = "uploads/";
  $target_file = $target_dir . $_SESSION['ass_id'] . "_" . basename($_FILES["file"]["name"]);
  


   $filename = $ass_id . "_" . $_FILES["file"]["name"];

// Check if image file is a actual image or fake image

if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
     require_once("core/dbm.php");
     
    $m = $mysqli->query(" INSERT INTO `webmaster`.`assignments` ( `ass_id`, `by`, `title`,`designation`,`points`,`file_location`,`dead_line`,`sems`,`year`,`filename`) VALUES( '$ass_id', '$by', '$title','$designation','$points','$target_file','$deadline','$sems','$year','$filename')  ");
    if($m){
       $_SESSION['message_assignments'] = '<p style="font-size:14px; padding:5px;color:#000;text-align:center; background-color:yellow">' . $_SESSION['title'] . " with ID = " . $_SESSION['ass_id'] . " is Created" . '</p>' ;
          
       unset($_SESSION['title']);
       unset($_SESSION['designation']);
       unset($_SESSION['points']);        
       unset($_SESSION['year']);
       unset($_SESSION['sems']);
       unset($_SESSION['deadline']);        
       header("location: teacher-home-assignment.php");

    } else {
       $_SESSION['message_assignments'] = '<p style="color:#fff; font-size:14px; padding:5px; ;text-align:center; background-color:red"> Please Check ID </p>' ;
        header("location: teacher-home-assignment.php");
    }
    
   }

   

 }



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
  <title>Confirm Assignment Creation</title>
</head>
<body>

<div>

 <form action="upload-sir.php" method="post" enctype="multipart/form-data">
  <h1 style="text-align: center;">Please Upload Documents for Assignment ID: <?php echo $_SESSION['ass_id'] ?></h1>
  <p style="color:red"><?php echo "Assignment ID: " . $_SESSION['ass_id'] ?></p>
  <p style="color:red"><?php echo "Assignment Title: " . $_SESSION['title'] ?></p>
   <input type="file" name="file" required="true"><br>
   <input type="submit" name="submit">
   <a href="teacher-home-assignment.php">Back</a>
  </form>
</div>


</body>
</html>

<style>
  * {
    font-family: 'Roboto';
  }


form {
  border: 1px solid purple;
  padding: 10px;
  width: 60%;
  margin:0 auto;
  margin-top: 50px;
}


a,input[type=submit] {
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



</style>

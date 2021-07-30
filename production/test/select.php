<?php
   
   $selection_value ="";
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   	   echo $_POST['color']; // value inside the option tag will be sent via post
   }


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="select.php" method="post">
		<select name="color" id="colorv">
			<option value="default">-- Select --</option>
			<option value="red">RED</option>
			<option value="blue">BLUE</option>
		</select>
		<input type="submit">
	</form>
</body>
</html>
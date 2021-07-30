<?php

 require_once("core/dbm.php");


 

 $result = $mysqli->query('SELECT * FROM users');
 
 
 	echo '<table>
 	         <tr>
 	           <td> ID Number </td>
 	           <td> Name </td>
 	           <td> Joined</td>
 	         </tr> 
 	        ';
 while($row = $result->fetch_assoc()){
 echo '<tr> 
                   <td> ' . $row['id']       . '</td>' 
                . '<td> ' . $row['username'] . '</td>'
                . '<td> ' . $row['joined']   . '</td>'
                . '</tr>'
                .  '</table>' ; 
 	           
 	
 }



 var_dump($row);

 ?>

 <style>
 	
 	table , tr , td {padding:10px; border-collapse: collapse; text-align: center; }
 	table , tr,td {border: 1px solid red;}

 </style>


 
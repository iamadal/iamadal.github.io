<?php
 
 array_map('unlink',glob('uploads_std/*') );
 header("location: admin-home.php");

 ?>
<?php
 
 array_map('unlink',glob('uploads/*') );
 header("location: admin-home.php");
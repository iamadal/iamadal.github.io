<?php

$file = parse_ini_file("db.ini");

$DB_SERVER   = "localhost";
$DB_USERNAME = $file["username"];
$DB_PASSWORD = $file["password"];
$DB_NAME     = "webmaster";
 
$mysqli = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
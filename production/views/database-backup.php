<h1 style="text-align: center;"> Database Backup </h1>

<?php
//Enter your database information here and the name of the backup file

$file = parse_ini_file("core/db.ini");

$DB_SERVER   = "localhost";
$DB_USERNAME = $file["username"];
$DB_PASSWORD = $file["password"];
$DB_NAME     = "webmaster";


$mysqlDatabaseName = $DB_NAME;
$mysqlUserName =  $DB_USERNAME;
$mysqlPassword = $DB_PASSWORD;
$mysqlHostName = $DB_SERVER;
$mysqlExportPath = 'backup.sql';

//Please do not change the following points
//Export of the database and output of the status
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output,$worked);
switch($worked){
case 0:
echo 'The database <b>' .$mysqlDatabaseName .'</b> was successfully stored in the following path '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'An error occurred when exporting <b>' .$mysqlDatabaseName .'</b> zu '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'An export error has occurred, please check the following information: <br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}
?>
<?php
/* 
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/
 
/**
 * mysql_connect is deprecated for new version
 * using mysqli_connect instead
 */
 
$databaseHost = '127.0.0.1';
$databaseName = 'mydb';
$databaseUsername = 'root';
$databasePassword = '';
 
$DBConnect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
	
?>

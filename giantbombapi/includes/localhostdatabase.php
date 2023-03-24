<?php


/**
* Retrieve the database connection

@return object Connection to MySQL server
*/

# Database information, the database is accessed using phpMyAdmin and it's on a localhost.
# Used for testing purposes.
function getDB(){
$db_host = "localhost";
$db_name = "giantbombapi";
$db_user = "root";
$db_pass = "";


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if (mysqli_connect_error()){
	echo mysqli_connect_error();
	exit;
}
	return $conn;
}
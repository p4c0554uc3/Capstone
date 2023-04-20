<?php

function getDB(){
	$db_host = "sql9.freemysqlhosting.net";
	$db_name = "sql9604955";
	$db_user = "sql9604955";
	$db_pass = "hXgfF5mzzg";
	
	
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	
	if (mysqli_connect_error()){
		echo mysqli_connect_error();
		exit;
	}
		return $conn;
	}
?>
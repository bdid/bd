<?php

/**
 * This file provides the database connection and selects the database.
 */

$host = 'localhost';
$username = 'qa_user2';
$password = 'qaPwd2';
$database = 'fertilityTravels_qa_local';

$connection = mysql_connect($host, $username, $password);

if (is_resource($connection)) {

	if (! mysql_select_db($database, $connection)) { //Same as use <dbname>; sql cmd
		
		mysql_query("CREATE DATABASE $database;", $connection);
		
		mysql_select_db($database, $connection);
		
	}

	
} else {
	
	echo "Could not connect: " . mysql_error();
	
	exit();
	
}

?>

<?php

/**
 * This file provides the database connection and selects the database.
 */

$host = 'localhost';
$username = 'Naveena';
$password = 'naveena';
$database = 'hiramku_fertilitytravels_qa_backup';

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

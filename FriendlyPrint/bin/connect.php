<?php
	//
	// This file includes the connection data for the system.
	// ABSOLUTELY NO MODIFICATIONS TO THIS FILE
	//

	require_once("functions.php");

	// Read connection data from config file
	$DB__HOST = read_config("./config","DB_HOST"); 
	$DB__USERNAME = read_config("./config","DB_USERNAME");
	$DB__PASSWORD = read_config("./config","DB_PASSWORD");
	$DB__DATABASE = read_config("./config","DB_DATABASE");

	// Instantiate database connection objects
	$DB__CONNECT = mysql_connect($DB__HOST,$DB__USERNAME,$DB__PASSWORD);
	$DB__HANDLER = mysql_select_db($DB__DATABASE,$DB__CONNECT);
?>

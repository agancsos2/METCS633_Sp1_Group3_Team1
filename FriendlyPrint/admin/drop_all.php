<?php
	//
	// This file contains commands needed to drop the database schema
	//
	require_once("../bin/connect.php");
	require_once("../bin/functions.php");

	$table_query = "select table_name from information_schema.tables where table_schema = '$DB__CONNECT'";
	$getter = mysql_query($table_query);
	while($table_name = mysql_fetch_assoc($getter))
	{
		mysql_query("drop table $DB__CONNECT." . $table_name['table_name']);
	}
?>

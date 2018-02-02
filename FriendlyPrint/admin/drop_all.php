<?php
	//
	// This file contains commands needed to drop the database schema
	//
	require_once("../bin/connect.php");
	require_once("../bin/functions.php");

	$table_query = "select table_name from information_schema.tables where table_schema = '$__DB__DATABASE'";
	$getter = mysql_query($table_query);
	while($table_name = mysql_fetch_assoc($getter))
	{
		mysql_query("drop table $__DB__DATABASE." . $table_name['table_name']);
	}
?>

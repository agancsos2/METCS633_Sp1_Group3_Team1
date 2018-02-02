<?php
	//
	// This file will set the session data and allow the user to access the system
	//
    require_once("functions.php");
	require_once("functions_db.php");
	if($_POST['login'])
	{
        $temp_user=$_POST['session_user'];
        $temp_pass=$_POST['session_pass'];
        setcookie("Username",$temp_user);
        setcookie("Password",$temp_pass);
        print '<meta http-equiv="refresh" content="0; url=./" />';
    }
?>

<?php
	//
	// This file will remove session data and invalidate the current session.
	//
    setcookie("Username","");
    setcookie("Password","");
    print '<meta http-equiv="refresh" content="0; url=./" />';
?>


<?php
    $SESSION_USER2 = $_COOKIE['Username'];
    $SESSION_PASS2 = $_COOKIE['Password'];

	require_once("functions_db.php");

	if($PAGE__SECURE)
	{
		if($SESSION_USER2 == "" && $SESSION_PASS2 == "")
		{
			print('<meta http-equiv="refresh" content="0; url=./signout.php" />');
		}
		else
		{
			if(!valid_user($SESSION_USER2,$SESSION_PASS2))
			{
				print('<meta http-equiv="refresh" content="0; url=./signout.php" />');
			}
			else
			{
				$SESSION_ACCOUNT = get_account($SESSION_USER2);
			}
		}
	}
	else
	{
       	$SESSION_ACCOUNT = get_account($SESSION_USER2);
	}
?>

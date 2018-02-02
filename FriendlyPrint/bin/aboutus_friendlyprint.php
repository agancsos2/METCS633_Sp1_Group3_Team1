<?php
 $PAGE__NAME = "about";
 require_once("header.php");
 require_once("functions_db.php");
?>

<table id = "member-table">
<?php
	$getter = mysql_query("select * from members");
	while($data = mysql_fetch_assoc($getter))
	{
		print("<tr class='member-header'><th colspan=2 style='text-align:center;'>" . $data['full_name'] . "</th></tr>");
		print("<tr><th>Roles</th><td>" . $data['roles'] . "</td></tr>");
        print("<tr><th>Responsibilities</th><td>" . $data['biography'] . "</td></tr>");
	}
?>
</table>
<?php
 require_once("footer.php");
?>

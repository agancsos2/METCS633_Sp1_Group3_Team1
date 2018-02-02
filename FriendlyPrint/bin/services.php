<?php
 $PAGE__NAME = "services";
 require_once("header.php");
 require_once("functions_db.php");
?>
<!-- <h2>Services</h2> -->
<?php
	$services = get_services();
	foreach($services as $data)
	{
		print("<div class = 'detail-header'>");
		print($data->header . ":");
		print("</div>");
        print("<div class = 'detail-description'>");
        print($data->description2);
        print("</div>");
	}
?>
<?php
 require_once("footer.php");
?>

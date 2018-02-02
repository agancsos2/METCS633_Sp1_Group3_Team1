<?php
 $PAGE__NAME = "pricing";
 require_once("header.php");
?>
<!-- <h2>Pricing</h2> -->
<table id = "pricing-table">
 <tr>
  <th>Price Category</th>
  <th>Price Selection</th>
  <th>Price Type</th>
  <th>Price Option</th>
  <th>Price</th>
 </tr>
<?php
	$prices = get_pricing();
    foreach($prices as $data)
    {
		print("<tr>");
		print("<td>" . $data->category . "</td>");
        print("<td>" . $data->selection . "</td>");
        print("<td>" . $data->type2 . "</td>");
        print("<td>" . $data->option . "</td>");
        print("<td>$" . $data->value2 . "/sheet</td>");
		print("</tr>");
    }
?>
</table>
<?php
 require_once("footer.php");
?>

<?php
 $PAGE__NAME = "checkout";
 $PAGE__SECURE = True;
 require_once("header.php");
?>
<center>
 <?php
	if(sizeof(get_cart($SESSION_ACCOUNT->id2)) > 0)
	{
 		print("<form id = 'order-options-form' method = 'POST'>");
		print("<div class = 'label'>Shipping Address</div>");
		print("<input type = 'text' readonly value = '");
		print($SESSION_ACCOUNT->address . ", " . $SESSION_ACCOUNT->city . ", " . $SESSION_ACCOUNT->state . " ".$SESSION_ACCOUNT->zip_code."'/>"); 
		print("<div class = 'label'>Shipping Preference</div>");
		print("<select name = 'shipping_pref'>");
		print("<option value = 'Ground'>Ground</option>");
    	print("<option value = 'Air'>Air</option>");
		print("</select>");
    	print("<div class = 'label'>Payment Method</div>");
    	print("<select name = 'payment_method' onchange = 'unhide_payment(this.value)'>");
		print("<option value = ''></option>");
    	print("<option value = 'Credit Card'>Credit Card</option>");
    	print("</select>");
    	print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-label'>Credit Card #</div>");
		print("<input type = 'text' name = 'payment_detail' style = 'visibility:hidden;' id = 'credit-card-detail' placeholder = '0909283094820394'/>");
    	print("<div class = 'label'>Discount Code</div>");
    	print("<input type = 'text' name = 'discount' placeholder = ''/>");
		print("<input type = 'submit' name = 'submit-order' value = 'Submit Order'/>");
		print("</form>");

		if(isset($_POST['submit-order']))
		{
			$sp = $_POST['shipping_pref'];
			$pm = $_POST['payment_method'];
			$pd = $_POST['payment_detail'];
			$dis = $_POST['discount'];
		
			if($sp != "" && $pm != "" && $pd != "")
			{
				if(submit_order($sp,$pm,$pd,$dis,$SESSION_ACCOUNT))
				{
					?><script>alert("Thank you for your payment!");window.location = "dashboard.php";</script><?php
				}
			}
		}
	}
	else
	{
		print("Nothing in the cart...");
	}
 ?>
</center>
<?php
 require_once("footer.php");
?>


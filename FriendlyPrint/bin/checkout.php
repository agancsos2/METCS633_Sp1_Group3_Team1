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
		$options = get_shipping_options();
		foreach($options as $option)
		{
			print("<option value = '" . $option->label . "'>" . $option->label . ", $" . $option->fee . ", " . $option->days . "</option>");
		}
		print("</select>");
    	print("<div class = 'label'>Payment Method</div>");
    	print("<select name = 'payment_method' onchange = 'unhide_payment(this.value)'>");
		print("<option value = ''></option>");
    	print("<option value = 'Credit Card'>Credit Card</option>");
    	print("</select>");
    	print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-label'>Credit Card #</div>");
		print("<input type = 'text' name = 'payment_detail' style = 'visibility:hidden;' id = 'credit-card-detail' placeholder = '0909283094820394'/>");
        print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-ccv'>CCV</div>");
        print("<input type = 'text' name = 'payment_ccv' style = 'visibility:hidden;' id = 'credit-card-ccv2' placeholder = '090'/>");
        print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-month'>Expiration Month (MM)</div>");
        print("<input type = 'text' name = 'payment_month' style = 'visibility:hidden;' id = 'credit-card-month2' placeholder = '02'/>");
        print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-year'>Expiration Year (YYYY)</div>");
        print("<input type = 'text' name = 'payment_year' style = 'visibility:hidden;' id = 'credit-card-year2' placeholder = '2018'/>");
        print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-fn'>First Name</div>");
        print("<input type = 'text' name = 'payment_fn' style = 'visibility:hidden;' id = 'credit-card-fn2' placeholder = 'John'/>");
        print("<div class = 'label' style = 'visibility:hidden;' id = 'credit-card-ln'>Last Name</div>");
        print("<input type = 'text' name = 'payment_ln' style = 'visibility:hidden;' id = 'credit-card-ln2' placeholder = 'Smith'/>");
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
			$ccv = $_POST['payment_ccv'];
		    $mm = $_POST['payment_month'];
            $yr = $_POST['payment_year'];
            $fn = $_POST['payment_fn'];
            $ln = $_POST['payment_ln'];

			if($sp != "" && $pm != "" && $pd != "")
			{
				if($pm == "Credit Card")
				{
					if($ccv != "" && $mm != "" && $yr != "" && $fn != "" && $ln != "")
					{
						if(submit_order($sp,$pm,$pd,$dis,$SESSION_ACCOUNT))
						{
							?><script>alert("Thank you for your payment!");window.location = "dashboard.php";</script><?php
						}
					}
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


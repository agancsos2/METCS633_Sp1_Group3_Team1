<?php
 $PAGE__NAME = "order";
 $PAGE__SECURE = True;
 require_once("header.php");
?>
<center>
 <?php
 	if(!isset($_POST['product_type']))
	{
		print("<form method = 'POST' id = 'order-type-form'>");
	    $products = get_products();
    	foreach($products as $data)
    	{
			print("<div class='order-product-div'>");
        	print("<input type='submit' name='product_type' value='" . $data->header . "'/>");
			print("<img src = './media/images/icons/info.png' alt = ''  class='product-info' onclick=\"display_hidden('" . $data->header . "-info')\"/>");
			print("<br /><span id = '" . $data->header . "-info' style='visibility:hidden;'>");
        	print($data->description2);
			print("</span>");
			print("</div>");
    	}
		print("</form>");
	}
	else
	{
		print("<form method ='POST' id = 'order-options-form' enctype = 'multipart/form-data'>");
		print("<input type = 'hidden' name='product_type' value = '" . $_POST['product_type'] . "'/>");
		print("<div class = 'label'>File</div><input type = 'file' name='file_path'/>");
		$options = get_options($_POST['product_type']);
		foreach($options as $opt)
		{
			print("<div class = 'label'>" . $opt->description2 . "</div>");
			print("<select name = '" . strtolower(str_replace(" ","",$opt->description2)) . "'>");
			$values = get_option_values($_POST['product_type'],$opt->description2);
			foreach($values as $vals)
			{
				print("<option value = '" . $vals->description2 . "'>" . $vals->description2 . "</option>");
			}
			print("</select>");
		}
		print("<div class = 'label'>Quantity</div><input type='text' name='quant'/>");
		print("<input type = 'submit' name = 'add_cart' value = 'Add to Cart'/>");
        print("<input type = 'submit' name = 'view_cart' value = 'View Cart' />");
		print("</form>");

		if(isset($_POST['add_cart']))
		{
			$file_name = "";
			$quant = $_POST['quant'];
			$finish = $_POST['finish'];
			$size = $_POST['size'];
			if($quant != "" && $finish != "" && $size != "" && is_numeric($quant))
			{
				$temp_order = new Order();
            	$temp_order->user2 = $SESSION_ACCOUNT->id2;
            	$temp_order->filename = $file_name;
            	$temp_order->finish = $finish;
            	$temp_order->status = "Cart";
            	$temp_order->sheets = $quant;
            	$temp_order->size = $size;
            	$temp_order->type2 = $_POST['product_type'];
            	$temp_order->quantity = $quant;
				add_order($temp_order);
			}
			else if(!is_numeric($quant))
			{
				print("Discount code is invalid...");
			}
		}
		else if(isset($_POST['view_cart']))
		{
			?><script>goto_page('cart.php');</script><?php
		}
	}
 ?>
</center>
<?php
 require_once("footer.php");
?>


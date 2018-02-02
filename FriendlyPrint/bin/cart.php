<?php
 $PAGE__NAME = "cart";
 $PAGE__SECURE = True;
 require_once("header.php");
?>
<center>
 <table id = 'cart-grid'>
 	<?php
		$total = 0.00;
		$cart = get_cart($SESSION_ACCOUNT->id2);
		$cart_index = 1;
		foreach($cart as $order)
		{
			if($cart_index == 1 || ($cart_index > 1 && $cart_index % 4 == 0))
			{
				print("<tr>");
			}

			print("<td>");
			print("Order ID: " . $order->id2 . "<br />");
            print("File    : " . $order->filename . "<br />");
            print("Size    : " . $order->size . "<br />");
            print("Finish  : " . $order->finish . "<br />");
            print("Quantity: " . $order->quantity . "<br />");
            print("Sheets  : " . $order->sheets . "<br />");
			print("</td>");
			// Calculate the total

			$total += ((get_price($order->type2,"size",$order->size) + 
					get_price($order->type2,"finish",$order->finish)) * 
					$order->sheets * $order->quantity);

			if($cart_index == 0 || ($cart_index > 1 && $cart_index % 4 == 0))
            {
                print("</tr>");
            }
			$cart_index += 1;
		}
 	?>
  <tr>
   <td>Total: $<?php print($total); ?></td>
  </tr>
 </table>
 <form id = 'clear-cart-form' method = "POST">
  <input type = "submit" name = "clear-cart" value = "Clear Cart"/>
 </form>
 <?php
	if(isset($_POST['clear-cart']))
	{
		clear_cart($SESSION_ACCOUNT->id2);
		?><script>goto_page('cart.php');</script><?php
	}
 ?>
</center>
<?php
 require_once("footer.php");
?>


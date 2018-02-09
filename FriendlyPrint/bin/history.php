<?php
 $PAGE__NAME = "history";
 $PAGE__SECURE = True;
 $RECEIPT_ID = $_GET['rid'];
 require_once("header.php");
?>
<center>
 <table id = 'cart-grid'>
    <?php
		if($RECEIPT_ID == "")
		{
        	$receipts = get_history($SESSION_ACCOUNT->id2);
        	$receipt_index = 1;
        	foreach($receipts as $receipt)
        	{
				$total = 0.00;
            	if($receipt_index == 1 || ($receipt_index > 1 && $receipt_index % 4 == 0))
            	{
                	print("<tr>");
            	}

            	print("<td onclick=\"goto_page('history.php?rid=" . $receipt->id2 . "')\">");
				print("<table id = 'order-prop-table'>");
				print("<tr>");
            	print("<td>Receipt ID    : " . $receipt->id2 . "</td>");
            	print("<td>Paid          : " . $receipt->paid . "</td>");
            	print("<td>Total         : $" . $receipt->total . "</td></tr><tr>");
            	print("<td>Payment Type  : " . $receipt->payment_type . "</td>");
           		print("<td>Payment Detail: " . $receipt->payment_detail . "</td>");
            	print("<td>Last Updated  : " . $receipt->last_updated_date . "</td></tr>");
				print("</table>");
            	print("</td>");

				print("<tr>");
				if($total != 0.00)
				{
					print("<td>Total: $" . $total . "</td>");
				}
				print("</tr>");
				print("</table>");

        		if($receipt_index == 0 || ($receipt_index > 1 && $receipt_index % 4 == 0))
            	{
                	print("</tr>");
            	}
            	$receipt_index += 1;
        	}
		}
		else
		{
			$receipt = get_receipt($SESSION_ACCOUNT->id2,$RECEIPT_ID)[0];
 			print("<table id = 'cart-grid'>");
        	$total = 0.00;
        	$orders = $receipt->orders;
        	$order_index = 1;
        	foreach($orders as $order)
        	{
            	if($order_index == 1 || ($order_index > 1 && $order_index % 4 == 0))
            	{
                	print("<tr>");
            	}

            	print("<td>");
            	print("<table id = 'order-prop-table'>");
            	print("<tr>");
           	 	print("<td>Order ID: " . $order->id2 . "</td>");
            	print("<td>File    : " . $order->filename . "</td>");
            	print("<td>Size    : " . $order->size . "</td></tr><tr>");
            	print("<td>Finish  : " . $order->finish . "</td>");
            	print("<td>Quantity: " . $order->quantity . "</td>");
            	print("<td>Sheets  : " . $order->sheets . "</td></tr><tr>");
				print("<td>Total   : $" );

                // Calculate the total
                $total += ((get_price($order->type2,"size",$order->size) +
                    get_price($order->type2,"finish",$order->finish)) *
                    $order->sheets * $order->quantity);
				print($total . "</td></tr>");
            	print("</table>");
            	print("</td>");

            	if($order_index == 0 || ($order_index > 1 && $order_index % 4 == 0))
            	{
                	print("</tr>");
            	}
            	$order_index += 1;
        	}
 			print("</table>");
		}
    ?>
 </table>
<?php
 require_once("footer.php");
?>


<?php
 $PAGE__NAME = "dashboard";
 $PAGE__SECURE = True;
 require_once("header.php");
?>
<center>
 <button class = "dashboard-button" onclick = "goto_page('cart.php')">View Cart</button> <br />
 <button class = "dashboard-button" onclick = "goto_page('order.php')">Start New Order</button> <br />
 <button class = "dashboard-button" onclick = "goto_page('history.php')">View Order History</button> <br />
</center>
<?php
 require_once("footer.php");
?>

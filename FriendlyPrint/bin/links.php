<table id = "links-table">
 <tr>
  <th <?php if($PAGE__NAME == "home"){print "class = 'selected-page'";}?> onclick = "goto_page('./')">Home</th>
  <th <?php if($PAGE__NAME == "about"){print "class = 'selected-page'";}?> onclick = "goto_page('./aboutus.php')">About Us</th>
  <th <?php if($PAGE__NAME == "products"){print "class = 'selected-page'";}?> onclick = "goto_page('./products')">Products</th>
  <th <?php if($PAGE__NAME == "services"){print "class = 'selected-page'";}?> onclick = "goto_page('./services.php')">Services</th>
  <th <?php if($PAGE__NAME == "pricing"){print "class = 'selected-page'";}?> onclick = "goto_page('./pricing.php')">Pricing</th>
 </tr>
</table>

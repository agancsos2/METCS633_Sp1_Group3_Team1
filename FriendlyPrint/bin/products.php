<?php
 $PAGE__NAME = "products";
 require_once("header.php");
 require_once("functions_db.php");
?>
<!-- <h2>Products</h2> -->
<?php
    $products = get_products();
    foreach($products as $data)
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

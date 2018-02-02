<?php
    require_once("user.php");
    //require_once("order.php");
	require_once("receipt.php");

    class Receipt_Order
    {
        public $receipt;
        public $orders = array();

        function __construct()
        {
        }

        function init($r,$o)
        {
            $this->receipt = $r;
            $this->orders = $o;
        }
    }

?>

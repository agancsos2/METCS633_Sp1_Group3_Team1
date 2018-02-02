<?php
	require_once("user.php");
	//require_once("order.php");

    class Cart
    {
        public $user2;
        public $order;
        public $finalized;
        public $last_updated_date;

        function __construct()
        {
        }

        function init($u,$o,$f,$l)
        {
            $this->user2 = $u;
            $this->order = $o;
            $this->finalized = $f;
            $this->last_updated_date = $l;
        }
    }
?>

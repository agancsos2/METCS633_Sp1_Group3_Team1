<?php
	require_once("user.php");
	//require_once("order.php");

    class Receipt
    {
        public $id;
        public $user2;
        public $total;
		public $paid;
		public $payment_type;
		public $payment_detail;
		public $payment_date;
        public $last_updated_date;
		public $orders;

        function __construct()
        {
        }

        function init($id,$u,$t1,$p,$t2,$d1,$d2,$l)
        {
			$this->id = $id;
            $this->user2 = $u;
            $this->total = $t1;
			$this->paid = $p;
			$this->payment_type = $t2;
			$this->payment_detail = $d1;
			$this->payment_date = $d2;
            $this->last_updated_date = $l;
        }
    }

?>

<?php
	require_once("user.php");
    
	class Order
    {
        public $id2;
        public $user2;
        public $filename;
        public $sheets;
		public $size;
		public $finish;
		public $type2;
		public $quantity;
		public $status;
		public $last_updated_date;

        function __construct()
        {
        }

        function init($id,$u,$f1,$s1,$s2,$f2,$q,$l,$s3,$t)
        {
            $this->user2 = $u;
            $this->id2 = $id;
			$this->type2 = $t;
            $this->filename = $f1;
			$this->finish = $f2;
			$this->status = $s3;
			$this->sheets = $s1;
			$this->size = $s2;
			$this->quantity = $q;
            $this->last_updated_date = $l;
        }
    }
?>

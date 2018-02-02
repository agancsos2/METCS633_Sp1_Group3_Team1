<?php
	class Pricing
	{
		public $category;
		public $selection;
		public $type2;
		public $option;
		public $value2;
        
		function __construct()
        {
        }

        function init($c,$s,$t,$o,$v)
        {
            $this->category = $c;
            $this->selection = $s;
            $this->type2 = $t;
            $this->option = $o;
            $this->value2 = $v;
        }
	}
?>

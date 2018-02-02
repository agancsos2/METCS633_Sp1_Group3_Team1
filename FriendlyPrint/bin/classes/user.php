<?php
	class User
	{
		public $id;
		public $first_name;
        public $last_name;
        public $username;
        public $password;
		public $address;
        public $city;
        public $state;
        public $country;
        public $active;
        public $zip_code;

		function __construct()
		{
		}

		function init($fn,$ln,$u,$p,$ad,$c1,$s,$c2,$a,$z)
		{
			$this->first_name = $fn;
            $this->last_name = $ln;
            $this->username = $u;
            $this->password = $p;
			$this->address = $ad;
            $this->city = $c1;
            $this->state = $s;
            $this->country = $c2;
            $this->active = $a;
            $this->zip_code = $zc;
		}
	}

?>

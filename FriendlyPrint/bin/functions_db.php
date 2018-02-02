<?php
	//
	// This file includes functions used for database manipulation.
	// This is a restricted file and should only be updated by Abel Gancsos
	//

	require_once("connect.php");

	// 
	// Import objects
	//
	require_once("classes/user.php");
	require_once("classes/pricing.php");
	require_once("classes/detail.php");
	require_once("classes/order.php");
	require_once("classes/cart.php");
	require_once("classes/receipt.php");
	require_once("classes/receipt_order.php");

	//
    // This function validates the credentials that were passed in the login form
    //
    function valid_user($user,$pass)
    {
		if(mysql_num_rows(mysql_query("select * from user where username = '$user' and password = '$pass' and status = '1'")) == 1)
        {
            return True;
        }
        return False;
    
	}

	//
	// This function is used to check if the user account already exists
	//
	function user_exists($user)
	{
		if(mysql_num_rows(mysql_query("select * from user where username = '$user'",$DB__CONNECT)) == 0)
		{
			return False;
		}
		return True;
	}

	//
	// This function checks if the provided username is available.
	//
	function available_user($user)
	{
		return False;
	}

	//
	// This function create an account with the specified information
	//
	function create_user($user)
	{
		$sql = "insert into user (first_name,last_name,username,password,address,city_id,state_id,country_id,status,last_updated_date) values ";
		$sql .= "('$user->first_name','$user->last_name','$user->username','$user->password',";
		$sql .= "'$user->address','$user->city','$user->state','$user->country','1',current_timestamp)";
		$result = mysql_query($sql);
		if($result)
		{
			return True;
		}
		return False;
	
	}

	//
	// This function retrieves the price value for a particular key
	//
	function get_price($type2,$option,$value)
	{
		$getter = mysql_query("select * from price where price_selection = '$type2' and price_type = '$option' and price_option = '$value'");
		$data = mysql_fetch_assoc($getter);
		return str_replace("$","",str_replace("/sheet","",$data['price_value']));
	}

	//
	// This function clears the customer's shoppint cart
	//
	function clear_cart($account_id)
	{
        mysql_query("delete from cart where user_id = '$account_id'");
		mysql_query("delete from orders where user_id = '$account_id' and order_status = 'Cart'");
	}

	//
	// This function retrieves the customer's shopping cart
	//
	function get_cart($account_id)
	{
		$m_result = array();
		$getter = mysql_query("select * from orders where user_id = '$account_id' and order_status = 'Cart'");
		while($data = mysql_fetch_assoc($getter))
		{
			$temp_order = new Order();
			$temp_order->user2 = $account_id;
            $temp_order->id2 = $data['order_id'];
            $temp_order->filename = $data['order_filename'];
            $temp_order->finish = $data['order_finish'];
            $temp_order->status = $data['order_status'];
            $temp_order->sheets = $data['order_sheets'];
            $temp_order->size = $data['order_size'];
			$temp_order->type2 = $data['order_type'];
            $temp_order->quantity = $data['order_quantity'];
            $temp_order->last_updated_date = $data['last_updated_date'];
			array_push($m_result,$temp_order);
		}
		return $m_result;
	}

	//
	// This function retrieves the order history for the specified account
	//
	function get_orders($account_id)
	{
	}

	//
	// This function submits a new order
	//
	function add_order($order)
	{
		$sql = "insert into orders (user_id,order_filename,order_sheets,order_size";
		$sql .= ",order_finish,order_quantity,order_status,order_type) values (";
		$sql .= ("'" . $order->user2 . "','".$order->filename."','".$order->sheets."',");
		$sql .= ("'".mysql_real_escape_string($order->size)."','".$order->finish."','".$order->quantity."','");
		$sql .= ($order->status."','".$order->type2."'");
		$sql .= ")";

		if(mysql_query($sql))
		{
			$getter2 = mysql_query("select * from orders order by last_updated_date desc limit 1");
			$d = mysql_fetch_assoc($getter2);
			mysql_query("insert into cart (user_id,order_id,cart_finalized) values ('".$order->user2."','".$d['order_id']."','0')");
		}
	}

	//
	// This function cancels the specified order
	//
	function cancel_order($order_id)
	{
	}

	//
	// This function updates the users password
	//
	function update_password($account_id,$password_hash)
	{
	}

	//
	// This function returns the account object for the specified user
	//
	function get_account($user)
	{
		$m_result = new User();
		$getter = mysql_query("select * from user where username = '$user'");
		$data = mysql_fetch_assoc($getter);
		$m_result->id2 = $data['user_id'];
        $m_result->first_name = $data['first_name'];
        $m_result->last_name = $data['last_name'];
		return $m_result;
	}

	//
	// This function returns the pricing information
	//
	function get_pricing()
	{
		$m_result = array();
    	$getter = mysql_query("select * from price");
    	while($data = mysql_fetch_assoc($getter))
    	{
			$temp_price = new Pricing();
			$temp_price->init($data['price_category'],$data['price_selection'],$data['price_type'],$data['price_option'],$data['price_value']);
			array_push($m_result,$temp_price);
    	}
		return $m_result;
	}

	//
	// This function returns the list of product details
	//
	function get_products()
	{
		$m_result = array();
    	$getter = mysql_query("select * from product");
    	while($data = mysql_fetch_assoc($getter))
    	{
			$temp_product = new Detail();
			$temp_product->init($data['product_name'],$data['product_description']);
			array_push($m_result,$temp_product);
    	}
		return $m_result;
	}

    //
    // This function returns the list of production options
    //
    function get_options($select)
    {
        $m_result = array();
        $getter = mysql_query("select distinct price_type from price where price_selection = '" . $select . "'");
        while($data = mysql_fetch_assoc($getter))
        {
            $temp_option = new Detail();
            $temp_option->init($data['price_selection'],$data['price_type']);
            array_push($m_result,$temp_option);
        }
        return $m_result;
    }

    //
    // This function returns the list of production option values
    //
    function get_option_values($select,$opt2)
    {
        $m_result = array();
        $getter = mysql_query("select distinct price_option from price where price_selection = '" . $select . "' and price_type = '" . $opt2 . "'");
        while($data = mysql_fetch_assoc($getter))
        {
            $temp_option = new Detail();
            $temp_option->init($data['price_selection'],$data['price_option']);
            array_push($m_result,$temp_option);
        }
        return $m_result;
    }


	//
	// This function returns the list of service details
	//
	function get_services()
	{
		$m_result = array();
		$getter = mysql_query("select * from service");
    	while($data = mysql_fetch_assoc($getter))
    	{
			$temp_service = new Detail();
			$temp_service->init($data['service_name'],$data['service_description']);
			array_push($m_result,$temp_service);
    	}
		return $m_result;
	} 
?>

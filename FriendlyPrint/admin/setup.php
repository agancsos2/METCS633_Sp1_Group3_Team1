<?php
	// 
	// This file contains all the commands needed to create the database schema
	//

	require_once("../bin/functions_db.php");

	$queries = array();


	$sql = "create table if not exists city(city_id int(255) not null primary key auto_increment,short_description char(50) not null)";
	array_push($queries,$sql);

 	$cities = array("Boston","Hawthorne");
	foreach($cities as $city)
	{
		if(mysql_num_rows(mysql_query("select * from city where short_description='$city'",$__DB__CONNECT)) == 0)
		{
    		array_push($queries,"insert into city (short_description) values ('$city')");
		}
	}


	$sql = "create table if not exists state(state_id int(255) not null primary key auto_increment,short_description char(2) not null)";
    array_push($queries,$sql);

	$states = array();
    array_push($states,"AL");
    array_push($states,"AK");
    array_push($states,"AZ");
    array_push($states,"AR");
    array_push($states,"CA");
    array_push($states,"CO");
    array_push($states,"CT");
    array_push($states,"DE");
    array_push($states,"FL");
    array_push($states,"GA");
    array_push($states,"HI");
    array_push($states,"ID");
    array_push($states,"IL");
    array_push($states,"IN");
    array_push($states,"IA");
    array_push($states,"KS");
    array_push($states,"KY");
    array_push($states,"LA");
    array_push($states,"ME");
    array_push($states,"MD");
    array_push($states,"MA");
    array_push($states,"MI");
    array_push($states,"MN");
    array_push($states,"MS");
    array_push($states,"MO");
    array_push($states,"MT");
    array_push($states,"NE");
    array_push($states,"NV");
    array_push($states,"NH");
    array_push($states,"NJ");
    array_push($states,"NM");
    array_push($states,"NY");
    array_push($states,"NC");
    array_push($states,"ND");
    array_push($states,"OH");
    array_push($states,"OK");
    array_push($states,"OR");
    array_push($states,"PA");
    array_push($states,"RI");
    array_push($states,"SC");
    array_push($states,"SD");
    array_push($states,"TN");
    array_push($states,"TX");
    array_push($states,"UT");
    array_push($states,"VT");
    array_push($states,"VA");
    array_push($states,"WA");
    array_push($states,"WV");
    array_push($states,"WI");
    array_push($states,"WY");

	foreach($states as $state2)
	{
		if(mysql_num_rows(mysql_query("select * from state where short_description='$state2'",$__DB__CONNECT)) == 0)
		{
			array_push($queries,"insert into state (short_description) values ('$state2')");
		}
	}

    $sql = "create table if not exists country(country_id int(255) not null primary key auto_increment,short_description char(3) not null)";
    array_push($queries,$sql);
    $countries = array("USA");
	foreach($countries as $country)
	{
		if(mysql_num_rows(mysql_query("select * from country where short_description='$country'",$__DB__CONNECT)) == 0)
		{
    		array_push($queries,"insert into country (short_description) values ('$country')");
		}
	}



	$sql = "create table if not exists user(user_id int(255) not null primary key auto_increment,";
    $sql .= "first_name char(120) default '',last_name char(255) default '',username char(120) not null,";
    $sql .= "password varchar(512) not null,city_id int(255),state_id int(255),country_id int(255),address varchar(512),";
    $sql .= "status int(1) not null default '1',last_updated_date timestamp default current_timestamp,";
    $sql .= "foreign key (city_id) references city (city_id),foreign key (state_id) references state(state_id),";
    $sql .= "foreign key (country_id) references country(country_id)";
	$sql .= ")";
    array_push($queries,$sql);

	$users = array();
	array_push($users,"test1");
	array_push($users,"test2");

	foreach($users as $user)
	{
		if(mysql_num_rows(mysql_query("select * from user where first_name='$user'",$__DB__CONNECT)) == 0)
		{
			$sql = "insert into user (first_name,last_name,username,password,city_id,state_id,country_id,address) values ";
			$sql .= "('$user','user','$user@example.com','test123','1','1','1','123 Main Street')";
			array_push($queries,$sql);
		}
	
	}

	$sql = "create table if not exists service(service_id int(255) not null primary key auto_increment,";
	$sql .= "service_name char(120) not null,service_description varchar(3000))";
	array_push($queries,$sql);

    $sql = "create table if not exists product(product_id int(255) not null primary key auto_increment,";
    $sql .= "product_name char(120) not null,product_description varchar(3000))";
    array_push($queries,$sql);

    $sql = "create table if not exists price(price_id int(255) not null primary key auto_increment,";
    $sql .= "price_category char(120) not null,price_selection varchar(120),";
    $sql .= "price_type char(120) not null,price_option varchar(120),";
    $sql .= "price_value float(10,2) not null)";
    array_push($queries,$sql);

	$sql = "create table if not exists orders(order_id int(255) not null primary key auto_increment,";
	$sql .= "user_id int(255) not null, order_filename varchar(512),order_sheets int(10) default '0',";
	$sql .= "order_size varchar(120), order_finish varchar(120), order_quanitity int(10) default '0',";
	$sql .= "order_type varchar(120),";
	$sql .= "order_status varchar(120),last_updated_date timestamp default current_timestamp,";
	$sql .= "foreign key (user_id) references user (user_id))";
	array_push($queries,$sql);

	$sql = "create table if not exists cart(";
    $sql .= "user_id int(255) not null primary key, order_id int(255) not null,cart_finalized int(1) default '0',";
    $sql .= "last_updated_date timestamp default current_timestamp,";
    $sql .= "foreign key (user_id) references user (user_id), foreign key (order_id) references orders (order_id))";
    array_push($queries,$sql);


	$sql = "create table if not exists receipt(receipt_id int(255) not null primary key auto_increment,";
    $sql .= "user_id int(255) not null, receipt_total float(10,2) default '0.00',";
    $sql .= "receipt_paid int(1) default '0', payment_type varchar(120), payment_detail varchar(120),";
    $sql .= "last_updated_date timestamp default current_timestamp,payment_date timestamp,";
    $sql .= "foreign key (user_id) references user (user_id))";
    array_push($queries,$sql);

	$sql = "create table if not exists receipt_order(receipt_id int(255) not null,";
    $sql .= "order_id int(255) not null,";
    $sql .= "foreign key (receipt_id) references receipt (receipt_id),foreign key (order_id) references orders (order_id))";
    array_push($queries,$sql);


	foreach($queries as $query)
	{
		print("## $query\n");
		mysql_query($query) or die(mysql_error());
	}

	

	print("\n");
?>

<html>
 <head>
  <title>Friendly Print</title>
  <meta name = "keywords" content = "" />
  <meta name = "author" content = "MET CS633 Spring 1 2018 Group 3 Team 1" />
  <meta name = "description" content = "" />
  <meta name = "source" content = "https://github.com/agancsos2/METCS633_Sp1_Group3_Team1/tree/master/FriendlyPrint" />
  <link href = "main.css" rel = "stylesheet" type = "text/css" />
  <?php
    error_reporting(0);
    ini_set('display_errors', '0');
  ?>
  <script language = "javascript">
   function unhide_payment(payment_type)
   {
   		if(payment_type == "Credit Card")
		{
			var obj1 = document.getElementById('credit-card-label');
			var obj2 = document.getElementById('credit-card-detail');
			obj1.style.visibility = "visible";
			obj2.style.visibility = "visible";
		}
   }
   function goto_page(page)
   {
   		window.location = page;
   }
   function unhide_login()
   {
		var login_form = document.getElementById('login-form');
		login_form.style.visibility = "visible";
		document.getElementById('register-button').style.visibility = "hidden";
        document.getElementById('login-link').style.visibility = "hidden";
   }
   function display_hidden(id)
   {
   		var hidden_object = document.getElementById(id);
   		if(hidden_object.style.visibility == "hidden")
		{
			hidden_object.style.visibility = "visible";
		}
		else
		{
			hidden_object.style.visibility = "hidden";
		}
   }
  </script>
 </head>
 <body>
  <div id = "banner">
   <div id="banner-inner">
	<?php require_once("functions.php");?>
    <div class = "left" style = "margin-top: 50px; margin-left: 50px;width: 50%;">
     <h1><a href = "./"><?php print(read_config("./config","PRINT_SHOP_NAME")); ?></a></h1>
	 <h3>powered by Friendly Print</h3>
    </div>
    <div class = "right" style = "margin-top: 0px; width: 40%;">
	 <?php
      require("gather.php");
      if($SESSION_USER2 == "" && $SESSION_PASS2 == "")
	  {
     ?>
     <button id = "register-button" onclick="goto_page('register.php')">Sign up</button>
     <span id = "login-link" onclick="unhide_login()">Login</span>
	 <form method = "POST" style = "visibility:hidden;" action = "setter.php" id = "login-form">
	  <input type = "text"     name = "session_user" placehoder = "bsmith" />
	  <input type = "password" name = "session_pass" placeholder = "********" />
	  <input type = "submit"   name = "login"  value = "Login" />
	 </form>
 	 <?php
      }
	  else
      {
      ?>
		<span id = "welcome-span">Welcome back, <?php print($SESSION_ACCOUNT->first_name . " " . $SESSION_ACCOUNT->last_name);?></span>
		<span id = "dashboard-link" onclick="goto_page('dashboard.php')">Dashboard</span>
        <button id = "logout-button" onclick="goto_page('signout.php')">Logout</button>
	  <?php
      }
     ?>
    </div>
    <br />
    <br />
    <br />
    <div id = "moto-span">
     PRINTING MADE YOUR WAY, THE FRIENDLY WAY
    </div>
   </div>
  </div>

  <div id = "links">
   <div id="links-inner">
    <?php require("links.php"); ?>
   </div>
  </div>

  <div id = "main">
   <div id="main-inner">



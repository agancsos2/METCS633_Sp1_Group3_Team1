<?php
 $__PAGE__NAME = "register";
 require_once("header.php");
 require_once("functions_db.php");
 require_once("./classes/all_classes.php");
?>

<div id = "reg-form-div">
 <form method = "POST" id = "reg-form">
  <label class = "label">First Name</label><input type = "text" placeholder = "Bob" name = "first_name"/> <br />
  <label class = "label">Last Name</label><input type = "text" placeholder = "Smith" name = "last_name"/> <br />
  <label class = "label">Username</label><input type = "text" placeholder = "bsmith" name = "temp_username"/> <br />
  <label class = "label">Password</label><input type = "password" placeholder = "**********" name = "temp_password"/> <br />
  <label class = "label">Address</label><input type = "text" name = "address" /><br />
  <label class = "label">City</label>
  <select name = "city1">
   <?php
    $getter = mysql_query("select * from city",$__DB__CONNECT);
	while($row = mysql_fetch_assoc($getter))
	{
		print("<option value = '" . $row['city_id'] . "'>" . $row['short_description'] . "</option>");
	}
   ?>
  </select><br />

  <label class = "label">State</label>
  <select name = "state1">
   <?php
    $getter = mysql_query("select * from state",$__DB__CONNECT);
    while($row = mysql_fetch_assoc($getter))
    {
        print("<option value = '" . $row['state_id'] . "'>" . $row['short_description'] . "</option>");
    }
   ?>
  </select><br />

  <label class = "label">Country</label>
  <select name = "country1">
   <?php
    $getter = mysql_query("select * from country",$__DB__CONNECT);
    while($row = mysql_fetch_assoc($getter))
    {
        print("<option value = '" . $row['country_id'] . "'>" . $row['short_description'] . "</option>");
    }
   ?>
  </select><br />

  <label class = "label">Zip Code</label><input type = "text" placeholder = "1234567" name = "zip_code"/> <br />
  <input type = "submit" name = "register" value = "Register"/>
  <input type = "reset" name = "cancel" value = "Cancel" />
 </form>
</div>

<?php
	if(isset($_POST['register']))
	{
		$fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $t_username = $_POST['temp_username'];
        $t_password = $_POST['temp_password'];
        $ad = $_POST['address'];
        $c1 = $_POST['city1'];
        $s = $_POST['state1'];
        $c2 = $_POST['country1'];
        $zc = $_POST['zip_code'];

		if($fn != "" && $ln != "" && $t_username != "" && $t_password != "" && $ad != "" && $c1 != "" && $s != "" && $c2 != "" && $zc != "")
		{
			if(!user_exists($t_username))
			{
				$temp_user = new User();
				$temp_user->init($fn,$ln,$t_username,$t_password,$ad,$c1,$s,$c2,$zc);
				if(create_user($temp_user))
				{
					?><script>alert("Welcome to Friendly Print....")</script><?php
				}
				else
				{
                    ?><script>alert("Error creating user...")</script><?php
				}
			}
		}
	}
?>

<?php
 require_once("footer.php");
?>

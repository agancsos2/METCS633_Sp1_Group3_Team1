   </div> <!-- Main inner -->
  </div>  <!-- Main -->

  <div id = "footer">
   <div id = "footer-inner">
    <div id = "copyright-div">
     copyright &copy; 
     <script>
      var today = new Date();
      document.write(today.getFullYear());
     </script>
	 <?php print(read_config("./config","PRINT_SHOP_NAME")); ?>
	 </div>
     <br /><div id = "powered-by-div"> powered by 
	 <a target = "self" href = "https://github.com/agancsos2/METCS633_Sp1_Group3_Team1">Friendly Print, Inc</a></div>
     <br />
     <br />
     One Silber Way · Acron, OH 12345 <br />
     metcs633s12018g3t1@gmail.com <br />
     <br />
	 <br />
     <img class = "social-icon" src = "./media/facebook.svg" atl = ""/>
     <img class = "social-icon" src = "./media/twitter.svg" atl = "" />
     <img class = "social-icon" src = "./media/instagram.svg" atl = "" />
     <br />
     <br />

     <div id = "subs" style = "font-size:10pt;">
      <a href = "./">Home</a> &nbsp; | &nbsp;
      <a href = "./aboutus.php">About Us</a> &nbsp; | &nbsp;
      <a href = "./products.php">Products</a> &nbsp; | &nbsp;
      <a href = "./services.php">Services</a> &nbsp; | &nbsp;
      <a href = "./pricing.php">Pricing</a>
	  <?php
		if($SESSION__USER != "")
		{
			print("&nbsp; | &nbsp;<a href = \"./dashboard.php\">Dashboard</a>");
		}
	  ?>
     </div>
   </div>
  </div>

 </body>
</html>

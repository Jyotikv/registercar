 <?php
 $server="us-cdbr-iron-east-03.cleardb.net";
 $username="bb8ff899f74f6a";
 $password="ff6ca091";
   if(ISSET($_GET["btn"]))
   {
   	 $con=mysql_connect('Server Name','UserName','Passwd')  or die ("Con Error".mysql_error());
    mysql_select_db('ad_254e48c6f6af81f',$con);
    $txtrfid=$_GET["txtrfid"]; 	   
      
    $sql="Delete from regg where rfid ='$txtrfid'";	
  
    $ret_val=mysql_query($sql, $con) or die ("Error".mysql_error());
    if($ret_val)
	echo ("Record Deleted");
    else
	echo (mysql_error()."Error");
  }
  ?>
  
  <html>
  <head><title>SIMS</title></head>
	<body>

    <fieldset>
  <legend>Delete</legend>
  <form action="delete.php" method="get">
   Enter USN to Delete<input type="text" name="rfid">
   <input type="Submit" Value="Delete" name="btn"> 
  </form>
  </fieldset>
  <a href="/index.php">Home Page</a></br>
	</body>
  </html>
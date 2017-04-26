<?php
$name=$_REQUEST['txtFullname'];
$email=$_REQUEST['txtemail'];
$phone=$_REQUEST['txtphone'];
$rfid=$_REQUEST['txtrfid'];
$password1=$_REQUEST['txtpassword'];


//connect to mysql
$server="us-cdbr-iron-east-03.cleardb.net";
$username="bb8ff899f74f6a";
$password="ff6ca091";

$connection=mysql_connect($server,$username,$password);

if(!$connection)
{
    echo "connection failed";
}
else
{
    mysql_select_db("ad_254e48c6f6af81f");
   	$query="insert into regg values('$name','$email','$phone','$rfid','$password1')";
   	$result=mysql_query($query,$connection);
	
	if(!$result)
    {
        echo "insertion failed";
    }
    else
    {
    	 mysql_select_db("ad_254e48c6f6af81f");
     $sql2="Select Username from regg where Username='jyoti'";	
   	$ret_val=mysql_query($sql2, $connection) or die ("Error".mysql_error());
    if($ret_val)
    {
    	if(mysql_num_rows($ret_val)>0)
    	{
    		echo "<html><center>";
    	while($row=mysql_fetch_array($ret_val, MYSQL_NUM))	
		echo ($row[0]."</br>");
		echo ("already exits");	
		echo "</center></html>";
    	
    	}
	else
	{
		echo "no field"
	} 
}

    else
	{
	echo (mysql_error()."Error");	
  }

      echo "inserted successfully";
    }
    mysql_close($connection);

	}

?>
<html>
  <head><title>Student Info</title></head>
  <body>
  <fieldset>
  <a href="/fetch.php">fetch</a></br>

  </body>
  </html>

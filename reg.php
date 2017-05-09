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
    $query2 = "SELECT * FROM regg WHERE Username='$name' and Email-id='$email'";
    $rs= mysql_query($query2,$connection);
	if($rs)
	{
	 $cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
  			while ($row=mysql_fetch_array($rs))
    		{
    				echo "your already registered".$row["0"] ;
			}
	}
		else
		{
   			$query="insert into regg values('$name','$email','$phone','$rfid','$password1')";
   			$result=mysql_query($query,$connection);
	
			if(!$result)
    		{
        		echo "insertion failed";
    		}
    		else
 			{
    			echo "Registered successfully";
			}

		}

    mysql_close($connection);

}
?>
<?php
//$carnum2=$_REQUEST['txtcar4'];
$date6=$_REQUEST['txtdate5'];
$entry6=$_REQUEST['txtentry5'];
$exit6=$_REQUEST['txtexit5'];
$slot6=$_REQUEST['txtslot5'];
$new6=$_REQUEST['txtnewexit5'];





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
    $strsql="SELECT * FROM demo WHERE crtDate='$date6' and Entrytime='$entry6' and Exittime='$exit6' and slotNo='$slot6'";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
		$query="update demo set Exittime='$new'";
    	$result=mysql_query($query,$connection);
    	if($rs)
		{
			$cnt=mysql_affected_rows($connection);
 		}
 		if($cnt)
		{
			while ($row=mysql_fetch_array($rs))
    		{
    		echo "your timing is updated successfully" ;
			}
		}

		else
		{
			echo "No slot is reserved for this user .Check the given information1";
		}
	}
	else
	{
		echo "No slot is reserved for this user .Check the given information";
	}
}
mysql_close($connection);
?>
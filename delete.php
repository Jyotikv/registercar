<?php
$carnum2=$_REQUEST['txtcar3'];
$date2=$_REQUEST['txtdate3'];
$entry2=$_REQUEST['txttime3'];
$exit2=$_REQUEST['txttime4'];



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
    $strsql="DELETE FROM demo WHERE carNo='$carnum2' and crtDate='$date2' and Entrytime='$entry2' and Exittime='$exit2'";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
	$cnt=mysql_affected_rows($connection);
 	
 	if($cnt)
	{
		while ($row=mysql_fetch_array($rs))
    {
    	echo "your reserved slot has been cancelled successfully" ;
	}
	}

	else
	{
		echo "No slot is reserved for this user .Check the given information";
	}
}
mysql_close($connection);
?>

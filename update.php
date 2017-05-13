<?php

$date6=$_REQUEST['txtdate5'];
$entrytime6=$_REQUEST['txtentry5'];
$exittime6=$_REQUEST['txtexit5'];
$slot6=$_REQUEST['txtslot5'];
$newexit6=$_REQUEST['txtnewexit5'];


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
    $strsql="SELECT * from demo WHERE crtDate='$date6' and Entrytime='$entrytime6' and Exittime='$exittime6' and slotNo='$slot6' ";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
		
    	$strsql2=mysql_query("UPDATE demo SET Exittime='$newexit6'",$connection);
    	echo "you are successfully updated your timing ";
	}


	else
		{
    		echo "Check the information once again";
		}
	
}

	
mysql_close($connection);
?>
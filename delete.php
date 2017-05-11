<?php
   $host='us-cdbr-iron-east-03.cleardb.net';
	$uname='bb8ff899f74f6a';
	$pwd='ff6ca091';
	$db="ad_254e48c6f6af81f";
$con = mysql_connect($host,$uname,$pwd) or 	die("connection failed");   
mysql_select_db($db,$con) or die("db selection failed"); 
   	session_start();

	$carnum = $_REQUEST['txtcar3'];
	$date2=$_REQUEST['txtdate3'];
	$entry2=$_REQUEST['txttime3'];
	$exit2=$_REQUEST['txttime4'];
	
	
 if($result=mysql_query("delete from demo where carNo='$carnum' and crtdate='$date2' and Entrytime='$entry2' and Exittime='$exit2'",$con))
$cnt=mysql_affected_rows($con);
if(!$cnt)
{
echo "No slot is reserved for this user .Check the given information";
 }
else
{
	echo "Reserved slot has been cancelled successfully";
}
?>
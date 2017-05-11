
<?php
   $host='us-cdbr-iron-east-03.cleardb.net';
	$uname='bb8ff899f74f6a';
	$pwd='ff6ca091';
	$db="ad_254e48c6f6af81f";
$con = mysql_connect($host,$uname,$pwd) or 	die("connection failed");   
mysql_select_db($db,$con) or die("db selection failed"); 
   	session_start();

	$rfid = $_REQUEST['txtcar4'];
	
 if($result=mysql_query("delete from demo where carNo='$rfid'",$con))
$cnt=mysql_affected_rows($con);
if(!$cnt)
{
echo "Enter Correct Car Number";
 }
else
{
	echo "Reserved slot has been cancelled successfully";
}
?>

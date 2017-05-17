<?php
$carnum2=$_REQUEST['txtcar4'];
$date2=$_REQUEST['txtdate4'];
$entry2=$_REQUEST['txtentry4'];
$exit2=$_REQUEST['txtexit4'];



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
   if($strsql=mysql_query("SELECT * FROM demo WHERE carNo='$carnum2' and crtDate='$date2' and Entrytime='$entry2' and Exittime='$exit2'",$connection));
 	$cnt=mysql_affected_rows($connection);
 	
 	if($cnt)
	{
		if($query=mysql_query("delete from demo where carNo='$carnum2'",$connection));
    	$cnt2=mysql_affected_rows($connection);
    	//$result=($query,$connection);
    	//if($rs)
		//{
			
 		//}
 		if($cnt2)
		{
			echo "your reserved slot has been cancelled successfully" ;
		$ch = curl_init();
		$user="demoparking2018@gmail.com:Jyoti123.";
		$receipientno="8867935507";
		$senderId="TEST SMS";
		$msgtxt="Authentication successfull...allow";
		curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

		curl_setopt($ch,CURLOPT_POST,1);

		curl_setopt($ch,CURLOPT_POSTFIELDS , "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
		$buffer = curl_exec($ch);
		if(empty($buffer))
		{
			echo "buffer is empty ";
		}
		else
		{
			echo $buffer;
			echo "message sent";
		}
		curl_close($ch);
			//while ($row=mysql_fetch_array($rs))
    		//{
    			//echo "your reserved slot has been cancelled successfully" ;
			//}
		}

		else
		{
			echo "No slot is reserved for this user .Check the given information";
		}
	}
	else
	{
		echo "No slot is reserved for this user .Check the given information";
	}
}
mysql_close($connection);
?>
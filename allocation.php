<?php

$date1=$_REQUEST['txtdate2'];
$time1=$_REQUEST['txtfrom'];
$time2=$_REQUEST['txtto'];
$slot2=$_REQUEST['txtslot1'];


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
    $strsql="SELECT * FROM demo WHERE crtDate='$date1' and Entrytime='$time1' and Exittime='$time2' and slotNo='$slot2' ";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
 	$cnt=mysql_affected_rows($connection);
 	if($cnt)
	{
		while ($row=mysql_fetch_array($rs))
    {
    	echo $row["4"]."already allocated";
	}
	}

	else
	{
    	if($slot2==1)
    	{
    		echo "It is available "; 		
    	}
      	else if($slot2==2)
    	{
    		echo "It is available "; 		
    	}
    	 else 	if($slot2==3)
    	{
    		echo "It is available "; 		
    	}
    	  else	if($slot2==4)
    	{
    		echo "It is available "; 		
    	}
    	else 
    	{
    		echo "Not avalibale";
    	}
	}
}

mysql_close($connection);
?>
<?php

$date1=$_REQUEST['txtdate2'];
$time1=$_REQUEST['txtfrom'];
$time2=$_REQUEST['txtto'];


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
    $strsql="SELECT * FROM demo WHERE crtDate='$date1' and Entrytime='$time1' and Exittime='$time2' ";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
 	$cnt=mysql_affected_rows($connection);
 	if($cnt)
	{
		
 	while ($row=mysql_fetch_array($rs))
    {
    echo "Reserved slots :".$row["4"] ;

	   if($row["4"]==1)
    {
    	echo " remaining slots are 2,3,4";
    }
    else if($row["4"]==1 && $row["4"]==2)
    {
    	echo  "  remaining slots are 3,4";
    }
     else if($row["4"]==1 && $row["2"]==2 && $row["3"]==3)
    {
    	echo "  remaining slots is 4";
    }
      else if($row["4"]==1 && $row["4"]==2 && $row["4"]==3 && $row["4"]==4)
    {
    	echo "  remaining slots zero";
    }
    else
    {
    	echo " 1,2,3,4 slots are available";
    }
    
	}
      }
     
 	else
 	{
 		echo "all slots are reserved  ";
 	}
 }

mysql_close($con);
?>
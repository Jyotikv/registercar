<?php

$carno=$_REQUEST['txtcar'];
$date=$_REQUEST['txtdate'];
$fm=$_REQUEST['txtfrom'];
$t=$_REQUEST['txtto'];
$slot=$_REQUEST['txtslotnum'];


/7/connect to mysql
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
    $query2="select * from demo where crtDate='$date' and Entrytime='$fm' and Exittime='$t' and slotNo='$slot'";
    $rs=mysql_query($query2,$connection);
	if($rs)
	$cnt=mysql_affected_rows($connection);
 	if($cnt)
	{
  			while ($row=mysql_fetch_array($rs))
    	{
   			 echo $row["4"]."is already reserved";
   		}
	}
	else
	{
		
 	   $query="insert into demo values('$carno','$date','$fm','$t','$slot')";
 	      $result=mysql_query($query,$connection);
	 	 if(!$result)
    {
       echo "Reservation failed";
  	}
    else
    {
        echo "Reserved succefully";
    }
    }	}
mysql_close($connection);


?>
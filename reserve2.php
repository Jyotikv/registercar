<?php

$carno=$_REQUEST['txtcar'];
$date1=$_REQUEST['txtdate'];
$entry1=$_REQUEST['txtfrom'];
$exit1=$_REQUEST['txtto'];
$slot3=$_REQUEST['txtslotnum'];


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
    $strsql="SELECT * FROM demo WHERE crtDate='$date1' and Entrytime='$entry1' and Exittime='$exit1' and slotNo='$slot3' ";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
		while ($row=mysql_fetch_array($rs))
    {
    	echo $row["4"]."already allocated";
	}
	}

	else
	{
    	 $query="insert into demo values('$carno','$date1','$entry1','$exit1','$slot3')";
       $result=mysql_query($query,$connection);
	 	 if(!$result)
    {
       echo "Reservation failed";
  	}
    else
    {
        echo "Reserved succefully";
    }
	}
}

mysql_close($connection);
?>
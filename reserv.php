<?php

$carno=$_REQUEST['txtcar'];
$date=$_REQUEST['txtdate'];
$fm=$_REQUEST['txtfrom'];
$t=$_REQUEST['txtto'];
$duration=$_REQUEST['txtduration'];
$slot=$_REQUEST['txtslotnum'];


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
    $query2="select * from demo where crtDate='$date' and Fromtime='$fm' and Totime='$t' and slotNo='$slot'";
    $rs=mysql_query($query2,$connection);
	if($rs)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
  			while ($row=mysql_fetch_array($rs))
    	{
   			 echo $row["0"]."is already reserved";
   		}
	}
	else
	{
    if($duration<4)
 	{   
    $query="insert into demo values('$carno','$date','$fm','$t','$duration','$slot')";
    
    $result=mysql_query($query,$connection);
    
    if(!$result)
    {
       echo "Insertion failed";
  }
    else
    {
        echo "Reserved successfully";
    }
    if($duration==1)
{
	$res1=$duration*20;
	echo "your bill is".$res1;
}
else if($duration==2)
{
	$res2=$duration*20;
	echo "your bill is".$res2;
}
else if($duration==3)
{
	$res3=$duration*20;
	echo "your bill is".$res3;
}

	}
	
else
{
	echo "Duartion must be below 4 hours";
}
}


    mysql_close($connection);
}


?>
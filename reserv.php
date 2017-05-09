<?php

$carno=$_REQUEST['txtcar'];
$date=$_REQUEST['txtdate'];
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
    
    
    if($duration<4)
 {   
    $query="insert into demo values('$carno','$date','$duration','$slot')";
    
    $result=mysql_query($query,$connection);
    
    if(!$result)
    {
       echo "Insertion failed";
  }
    else
    {
        echo "Reserved successfully";
    }
}
else
{
	echo "Duartion must be below 4 hours";
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
else 
{
	echo "Duration is exceeding";
}

    mysql_close($connection);
}


?>
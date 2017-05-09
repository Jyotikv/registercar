<?php

$carno=$_REQUEST['txtcar'];
$date=$_REQUEST['txtdate'];
$duration=$_REQUEST['txtduration'];

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
    $query="insert into demo values('$carno','$date','$duration')";
    
    $result=mysql_query($query,$connection);
    
    if(!$result)
    {
        echo "insertion failed";
    }
    else
    {
        echo "Reserved successfully";
    }
}
else
{
	echo "duartion timing must be below 4 hours";
}

    mysql_close($connection);
}


?>
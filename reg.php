<?php

$name=$_REQUEST['txtFullname'];
$email=$_REQUEST['txtemail'];
$phone=$_REQUEST['txtphone'];
$rfid=$_REQUEST['txtrfid'];
$password1=$_REQUEST['txtpassword'];

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
    
    $query="insert into reg values('$name','$email','$phone','$rfid','$password1')";
    
    $result=mysql_query($query,$connection);
    
    if(!$result)
    {
        echo "insertion failed";
    }
    else
    {
        echo "inserted successfully";
    }
    mysql_close($connection);
}


?>
<?php
 $name==$_GET['txtFullname'];
$email=$_GET['txtemail'];
$phone=$_GET['txtphone'];
$rfid=$_GET['txtrfid'];
$password1=$_GET['txtpassword'];


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
    session_start();

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
<html>
  <head><title>Student Info</title></head>
     	<a href="/fetch.php">fetch Page</a></br>
  </html>
<html>
  <head><title>Student Info</title></head>
     	<a href="/fetch2.php">fetch </a></br>
  </html>

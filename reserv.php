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
    $query2="select * from demo where crtDate='$date' and Entrytime='$fm' and Exittime='$t' and slotNo='$slot'";
    $rs=mysql_query($query2,$connection);
	if($rs)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
  			while ($row=mysql_fetch_array($rs))
    	{
   			 echo $row["5"]."is already reserved";
   		}
	}
	else
	{
		
    if($fm<$t && $duration<=4)
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
	$res1=$duration*50;
	echo "your bill is".$res1;
}
else if($duration==2)
{
	$res2=$duration*50;
	echo "your bill is".$res2;
}
else if($duration==3)
{
	$res3=$duration*50;
	echo "your bill is".$res3;
}
else if($duration==4)
{
	$res4=$duration*50;
	echo "your bill is".$res4;
}

	}
	
else
{
	echo "entry time must be less than exit time and Duartion must be below 4 hours";
}
}
$num=6-4;
echo "$num";
    mysql_close($connection);
}


?>
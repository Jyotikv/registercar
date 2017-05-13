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
 	$rs1=mysql_query($strsql,$connection);
	if($rs1)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt)
	{
		while ($row=mysql_fetch_array($rs1))
    {
    	echo $row["4"]."    slot is already allocated . Select other slot. ";
	}
	}

	else
	{
		
		mysql_select_db("ad_254e48c6f6af81f");
		$strsql2="SELECT * FROM demo WHERE carNo='$carno' and slotNo='$slot3' and  crtDate='$date1'";
		$rs2=mysql_query($strsql2,$connection);
		if($rs2)
		$cnt1=mysql_affected_rows($connection);
 			
 		if($cnt1)
		{
		while ($row=mysql_fetch_array($rs2))
    	{
    		$strsql3="SELECT *from demo where Entrytime='$entry1' or Exittime='$exit1'";
    		$rs3=mysql_query($strsql3,$connection);
			if($rs3)
			{
 				$cnt2=mysql_affected_rows($connection);
 			}
 			if($cnt2 && $entry1<$exit1)
		{
		while ($row=mysql_fetch_array($rs3))
    	{
    	echo "From entry time  :".$row["2"]." to exit time :".$row["3"]." selcted ".$row["4"]." slot is already reserved" ;
		}
		}
		else
		{
		$duration=$exit1-$entry1;
		if($entry1<$exit1 && $duration<=4)
		{
    	$query="insert into demo values('$carno','$date1','$entry1','$exit1','$slot3')";
       $result=mysql_query($query,$connection);
	 	 if(!$result)
    {
       echo "Reservation failed";
  	}
    else
    {
        echo "Reserved succefully .";
    }
     if($duration==1)
{
	$res1=$duration*50;
	echo "Your amount  is ".$res1;
}
else if($duration==2)
{
	$res2=$duration*50;
	echo "Your amount is ".$res2;
}
else if($duration==3)
{
	$res3=$duration*50;
	echo "Your amount is ".$res3;
}
else if($duration==4)
{
	$res4=$duration*50;
	echo "Your amount is ".$res4;
}
else
{
	echo "Duration must be below 4 hours";
}
	}
	else
	{
		echo "Entry time must be less than exit time and duration must be below 4 hours";
	}
	}
	}
}

	else
	{
		$strsql4="SELECT *from demo where Entrytime='$entry1' or Exittime='$exit1'";
    		$rs4=mysql_query($strsql4,$connection);
			if($rs4)
			{
 				$cnt3=mysql_affected_rows($connection);
 			}
 			if($cnt3 && $entry1<$exit1)
		{
		while ($row=mysql_fetch_array($rs4))
    	{
    		echo "This car number is already reserved at this time";
    	//echo "From entry time  :".$row["2"]." to exit time :".$row["3"]." selcted ".$row["4"]." slot is already reserved" ;
		}
		}
		else
		{
		$duration=$exit1-$entry1;
		if($entry1<$exit1 && $duration<=4)
		{
    	$query="insert into demo values('$carno','$date1','$entry1','$exit1','$slot3')";
       $result=mysql_query($query,$connection);
	 	 if(!$result)
    {
       echo "Reservation failed";
  	}
    else
    {
        echo "Reserved succefully .";
    }
     if($duration==1)
{
	$res1=$duration*50;
	echo "Your amount  is ".$res1;
}
else if($duration==2)
{
	$res2=$duration*50;
	echo "Your amount is ".$res2;
}
else if($duration==3)
{
	$res3=$duration*50;
	echo "Your amount is ".$res3;
}
else if($duration==4)
{
	$res4=$duration*50;
	echo "Your amount is ".$res4;
}
else
{
	echo "Duration must be below 4 hours";
}
	}
	else
	{
		echo "Entry time must be less than exit time and duration must be below 4 hours";
	}
}

	}
}
}
mysql_close($connection);
?>
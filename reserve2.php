<?php

$carno=$_REQUEST['txtcar'];
$resdate=$_REQUEST['txtdate'];
$resentry=$_REQUEST['txtfrom'];
$resexit=$_REQUEST['txtto'];
$resslot=$_REQUEST['txtslotnum'];


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
    $strsql="SELECT * FROM demo WHERE crtDate='$resdate' and Entrytime='$resentry' and Exittime='$resexit' and slotNo='$resslot' ";
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
		$strsql2="SELECT * FROM demo WHERE carNo='$carno' and slotNo='$resslot' and crtDate='$resdate'";
		$rs2=mysql_query($strsql2,$connection);
		if($rs2)
		$cnt1=mysql_affected_rows($connection);
 			
 		if($cnt1)
		{
			while ($row=mysql_fetch_array($rs2))
    		{
    		$strsql3="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    		$rs3=mysql_query($strsql3,$connection);
			if($rs3)
			{
 				$cnt2=mysql_affected_rows($connection);
 			}
 			if($cnt2 && $resentry<$resexit)
		{
		while ($row=mysql_fetch_array($rs3))
    	{
    	echo "From entry time  :".$row["2"]." to exit time :".$row["3"]." selcted ".$row["4"]." slot is already reserved" ;
		}
		}
		else
		{
		$duration=$resexit-$resentry;
		if($resentry<$resexit && $duration<=4)
		{
    	$query="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
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
		mysql_select_db("ad_254e48c6f6af81f");
		$strsql5="SELECT * FROM demo WHERE carNo='$carno' and  crtDate='$resdate'";
		$rs5=mysql_query($strsql5,$connection);
		if($rs5)
		$cnt5=mysql_affected_rows($connection);
 			
 		if($cnt5)
		{
			while ($row=mysql_fetch_array($rs5))
    		{
			$strsql4="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    		$rs4=mysql_query($strsql4,$connection);
			if($rs4)
			{
 				$cnt3=mysql_affected_rows($connection);
 			}
 			if($cnt3 && $resentry<$resexit)
		{
		while ($row=mysql_fetch_array($rs4))
    	{
    		echo "This car number is already reserved at this time3";
    	//echo "From entry time  :".$row["2"]." to exit time :".$row["3"]." selcted ".$row["4"]." slot is already reserved" ;
		}
		}
		else
		{
		$duration=$resexit-$resentry;
		if($resentry<$resexit && $duration<=4)
		{
    	$query="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
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
		mysql_select_db("ad_254e48c6f6af81f");
		$strsql6="SELECT * FROM demo WHERE  crtDate='$resdate' and slotNo='$resslot'";
		$rs6=mysql_query($strsql6,$connection);
		if($rs6)
		$nnt6=mysql_affected_rows($connection);
 			
 		if($cnt6)
		{
			while ($row=mysql_fetch_array($rs6))
    		{
			$strsql4="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    		$rs4=mysql_query($strsql4,$connection);
			if($rs4)
			{
 				$cnt3=mysql_affected_rows($connection);
 			}
 			if($cnt3 && $resentry<$resexit)
		{
		while ($row=mysql_fetch_array($rs4))
    	{
    		echo "This car number is already reserved at this time3";
    	//echo "From entry time  :".$row["2"]." to exit time :".$row["3"]." selcted ".$row["4"]." slot is already reserved" ;
		}
		}
		else
		{
			$duration=$resexit-$resentry;
		if($resentry<$resexit && $duration<=4)
		{
    	$query="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
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
}}
}
}
mysql_close($connection);
?>
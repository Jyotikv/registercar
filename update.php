<?php
//$carnum2=$_REQUEST['txtcar4'];
$newdate=$_REQUEST['txtdate5'];
$oldentry=$_REQUEST['txtentry5'];
$oldexit=$_REQUEST['txtexit5'];
$newslot=$_REQUEST['txtslot5'];
$newexit=$_REQUEST['txtnewexit5'];





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
    $strsql="SELECT * FROM demo WHERE crtDate='$newdate' and Entrytime='$oldentry' and Exittime='$oldexit' and slotNo='$newslot'";
 	$rs=mysql_query($strsql,$connection);
	if($rs)
	{
 	$cnt=mysql_affected_rows($connection);
 	}
 	if($cnt && $newexit<$oldexit && $newexit>$oldentry)
	{
		while($row=mysql_fetch_array($rs))
		{
		$query="update demo set Exittime='$newexit' where crtDate='$newdate' and Entrytime='$oldentry' and Exittime='$oldexit' and slotNo='$newslot'";
    	$result=mysql_query($query,$connection);
    	if($result)
		{
			$cnt2=mysql_affected_rows($connection);
 		}
 		if($cnt2)
		{
			
			echo "your timing is updated successfully" ;
			$duration=$oldentry-$newexit;
							if($duration==1)
							{
								$res1=$duration*50;
								echo " Now Your total amount  is ".$res1;
							}
							else if($duration==2)
							{
								$res2=$duration*50;
								echo "Now your total amount is ".$res2;
							}	
							else if($duration==3)
							{
								$res3=$duration*50;
								echo "Now your total  amount is ".$res3;
							}
							else if($duration==4)
							{
								$res4=$duration*50;
								echo " NOw your amount total is ".$res4;
							}
							else
							{
								echo "Duration must be below 4 hours";
							}
		
		}
		else
		{
			echo "Check new exit time.";
		}
		}
	}

	else
	{
		echo "No slot is reserved for this user . Check the given information";
	}
}
mysql_close($connection);
?>
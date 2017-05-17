<?php

$carno=$_REQUEST['txtcar'];
$date=$_REQUEST['txtdate'];
$entry=$_REQUEST['txtfrom'];
$exit=$_REQUEST['txtto'];
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

	//for($slot=1;$slot<=4;$slot++)
	//{
		mysql_select_db("ad_254e48c6f6af81f");
		$dateres=mysql_query("SELECT * FROM demo10 WHERE crtDate='$date' ", $connection);
		if($dateres)
		{
 			$cnt1=mysql_affected_rows($connection);
 			if($cnt1)
 			{
 				mysql_select_db("ad_254e48c6f6af81f");
				$entryres=mysql_query("SELECT * FROM demo10 WHERE crtDate='$date' and carNo='$carno'  ", $connection);
				if($entryres)
				{
					$cnt2=mysql_affected_rows($connection);
					if($cnt2)
					{
						mysql_select_db("ad_254e48c6f6af81f");
						$slotres=mysql_query("SELECT * FROM demo10 WHERE crtDate='$date' and '$entry' BETWEEN Entrytime and Exittime or '$exit' BETWEEN 
							Entrytime and Exittime  and carNo='$carno'" , $connection);
						if($slotres)
						{
							$cnt3=mysql_affected_rows($connection);
							if($cnt3)
							{
								echo "Already car is reserved  at this timing";
							}
							else
							{
							mysql_select_db("ad_254e48c6f6af81f");
							$carres=mysql_query("SELECT * FROM demo10 WHERE crtDate='$date' and '$entry' BETWEEN Entrytime and Exittime or '$exit' BETWEEN 
							Entrytime and Exittime and slotNo='$slot' and carNo='$carno'",$connection);
							if($carres)
							{
								$cnt4=mysql_affected_rows($connection);
								if($cnt4)
								{
									echo "Try another slot...";
								}
								else
								{	
									$duration=$exit-$entry;
				if($duration<=4 && $entry<$exit)
				{
					mysql_select_db("ad_254e48c6f6af81f");
					$query8="insert into demo10 values('$carno','$date','$entry','$exit','$slot')";
       				$result8=mysql_query($query8,$connection);
	 	 			if(!$result8)
    				{
       					echo "Reservation failed";
  					}
    				else
    				{
        				echo "Reserved succefully ...";
						//echo "your amount is 100";
						if($duration==1)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==2)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==3)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if ($duration==4) 
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else
						{
							echo "Your duration is exceeding ..";
						}
					}
				}
				else 						
				{	
						echo "Sorry ... You can reserv only for one hour";
				}
					}

						}
							else
							{
								echo "////////////";
							}
						}
					}
					else
					{
						echo "you have sAlready reserved";
					}
				}
				else
				{
					mysql_select_db("ad_254e48c6f6af81f");
						$slotres=mysql_query("SELECT * FROM demo10 WHERE crtDate='$date' and '$entry' BETWEEN Entrytime and Exittime or '$exit' BETWEEN 
							Entrytime and Exittime " , $connection);
						if($slotres)
						{
							$cnt3=mysql_affected_rows($connection);
							if($cnt3)
							{
								echo "Already car is reserved  at this timing ...2";
							}
							else
							{
							mysql_select_db("ad_254e48c6f6af81f");
							$carres=mysql_query("SELECT * FROM demo10 WHERE crtDate='$date' and slotNo='$slot' and '$entry' BETWEEN Entrytime and Exittime or
								'$exit' BETWEEN Entrytime and Exittime ",$connection);
							if($carres)
							{
								$cnt4=mysql_affected_rows($connection);
								if($cnt4)
								{
									echo "This  car number is already reserved ...2";
								}
								else
								{	
									$duration=$exit-$entry;
				if($duration<=4 && $entry<$exit)
				{
					mysql_select_db("test");
					$query8="insert into demo10 values('$carno','$date','$entry','$exit','$slot')";
       				$result8=mysql_query($query8,$connection);
	 	 			if(!$result8)
    				{
       					echo "Reservation failed...2";
  					}
    				else
    				{
        				echo "Reserved succefully ...2";
						//echo "your amount is 100";
						if($duration==1)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==2)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==3)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if ($duration==4) 
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else
						{
							echo "Your duration is exceeding ..";
						}
					}
				}
				else 						
				{	
						echo "Sorry ... You can reserv only for one hour";
				}
								}

							}
							else
							{
								echo "?????????";
							}
						}
					}
					else
					{
						echo "This slot is already reserved at this timing... select other";
					}
					
					
				}
			}
	else
	{
		

		echo "same as above ...3";
	}
}
else
{
	$duration=$exit-$entry;
				if($duration<=4 && $entry<$exit)
				{
					mysql_select_db("ad_254e48c6f6af81f");
					$query8="insert into demo10 values('$carno','$date','$entry','$exit','$slot')";
       				$result8=mysql_query($query8,$connection);
	 	 			if(!$result8)
    				{
       					echo "Reservation failed";
  					}
    				else
    				{
        				echo "Reserved succefully ...";
						//echo "your amount is 100";
						if($duration==1)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==2)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==3)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if ($duration==4) 
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else
						{
							echo "Your duration is exceeding ..";
						}
					}
				}
				else 						
				{	
						echo "Sorry ... You can reserv only for one hour";
				}
}
}
else
{
	//echo "Yes you can resver///////";
				$duration=$exit-$entry;
				if($duration<=4 && $entry<$exit)
				{
					mysql_select_db("ad_254e48c6f6af81f");
					$query9="insert into demo10 values('$carno','$date','$entry','$exit','$slot')";
       				$result9=mysql_query($query9,$connection);
	 	 			if(!$result9)
    				{
       					echo "Reservation failed";
  					}
    				else
    				{
        				echo "Reserved succefully ...";
						//echo "your amount is 100";
						if($duration==1)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==2)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if($duration==3)
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else if ($duration==4) 
						{
							$res1=$duration*50;
							echo "Your amount is ".$res1;
						}
						else
						{
							echo "Your duration is exceeding ..";
						}

					}
				}
				else 						
				{	
						echo "Sorry ... You can reserv maximum of 4 hour";
				}
}
}
mysql_close($connection);
?>

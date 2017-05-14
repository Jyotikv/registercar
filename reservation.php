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
    $strsql1="SELECT * FROM demo WHERE crtDate='$resdate' and Entrytime='$resentry' and Exittime='$resexit' and slotNo='$resslot' ";
 	$rs1=mysql_query($strsql1,$connection);
		if($rs1)
		{
 			$cnt1=mysql_affected_rows($connection);
 		
 		if($cnt1)
		{
			while ($row=mysql_fetch_array($rs1))
  		 	{
    			echo $row["4"]."    slot is already allocated . Select other slot. ";
    			exit(0);
			}
		}
	}

		else
		{
		
			mysql_select_db("ad_254e48c6f6af81f");
			$strsql2="SELECT * FROM demo WHERE carNo='$carno' and slotNo='$resslot'";
			$rs2=mysql_query($strsql2,$connection);
			if($rs2)
			{
			$cnt2=mysql_affected_rows($connection);
 			
 			if($cnt2)
			{
				while ($row=mysql_fetch_array($rs2))
    			{
    				$strsql2="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    				$rs2=mysql_query($strsql2,$connection);
					if($rs2)
					{
 						$cnt2=mysql_affected_rows($connection);
 					
 					if($cnt2 && $resentry<$resexit &&$resslot<=4)
					{
							while ($row=mysql_fetch_array($rs2))
							{
    						echo "From entry time  :".$row["2"]." to exit time :".$row["3"]." selcted ".$row["4"]." slot is already reserved" ;
							}

					}
					else
					{
						$duration=$resexit-$resentry;
						if($resentry<$resexit && $duration<=4 && $resslot<=4)
						{
    						$query1="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
      						$result1=mysql_query($query1,$connection);
	 	 					if(!$result1)
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
			else
							{
									echo "Entry time must be less than exit time and duration must be below 4 hours";
							}
			
		}
	}
	else
	{
	echo "Not avilable";
	}
}
else 
{
		mysql_select_db("ad_254e48c6f6af81f");
		$strsql3="SELECT * FROM demo WHERE carNo='$carno' and  crtDate='$resdate'";
		$rs3=mysql_query($strsql3,$connection);
		if($rs3)
		{
		$cnt3=mysql_affected_rows($connection);
 			
 		if($cnt3)
		{
			while ($row=mysql_fetch_array($rs3))
    		{
				$strsql4="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    			$rs4=mysql_query($strsql4,$connection);
				if($rs4)
				{
 					$cnt4=mysql_affected_rows($connection);
 				
 				if($cnt4 && $resentry<$resexit && $resslot<=4)
				{
					while ($row=mysql_fetch_array($rs4))
					{
    					echo "This car number is already reserved on this date at this timing ";
					}	    	

				}
				else
				{
					$duration=$resexit-$resentry;
					if($resentry<$resexit && $duration<=4 && $resslot<=4)
					{
    					$query2="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
      					$result2=mysql_query($query2,$connection);
	 					 if(!$result2)
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
		else
		{
			echo "Not available entry time and exit time are matching";
		}
	}
}

	else
	{
		echo "this car is Not avaiable on this date";
	}
}

	else 
	{
		mysql_select_db("ad_254e48c6f6af81f");
		$strsql5="SELECT * FROM demo WHERE  crtDate='$resdate' and slotNo='$resslot'";
		$rs5=mysql_query($strsql5,$connection);
		if($rs5)
		{
		$cnt5=mysql_affected_rows($connection);
 			
 		if($cnt5)
		{
			while ($row=mysql_fetch_array($rs5))
    		{
				$strsql6="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    			$rs6=mysql_query($strsql6,$connection);
				if($rs6)
			{
 				$cnt6=mysql_affected_rows($connection);
 				if($cnt6 && $resentry<$resexit && $resslot<=4)
				{
					while ($row=mysql_fetch_array($rs6))
					{
    					echo "This slot is already reserved at this timing .Check other slot";
					}	    		
				}
				else
				{
				$duration=$resexit-$resentry;
				if($resentry<$resexit && $duration<=4 && $resslot<4)
				{
    				$query3="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
      				$result3=mysql_query($query3,$connection); 
      					if(!$result3)
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
			else
			{
				echo "entry time exit time ";
			}
		}
	}

		else
		{
			echo "Not available car on this slot";
		}
	}

		else
		{
		mysql_select_db("ad_254e48c6f6af81f");
		$strsql7="SELECT * FROM demo WHERE  carNo='$carno' and crtDate='$resdate' and slotNo='$resslot'";
		$rs7=mysql_query($strsql7,$connection);
		if($rs7)
		{
		$cnt7=mysql_affected_rows($connection);
 			
 		if($cnt7)
		{
			while ($row=mysql_fetch_array($rs7))
    		{
				$strsql8="SELECT *from demo where Entrytime='$resentry' or Exittime='$resexit'";
    			$rs8=mysql_query($strsql8,$connection);
				if($rs8)
			{
 				$cnt8=mysql_affected_rows($connection);
 				if($cnt8 && $resentry<$resexit && $resslot<=4)
				{
				while ($row=mysql_fetch_array($rs8))
				{
    				echo "This slot is already reserved at this timing .Check other slot";
				}	    		
				}
				
			else
			{
			$duration=$resexit-$resentry;
			if($resentry<$resexit && $duration<=4 && $resslot<=4)
			{
    		$query3="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
       		$result3=mysql_query($query3,$connection);
	 	 	if(!$result3)
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
		else
		{
			echo "entry time and exit time 3";
		}
		}
	}

		else
		{
			echo " no car  available";
		}
		}

		else
		{
			$duration=$resexit-$resentry;
			if($resentry<$resexit && $duration<=4 && $resslot<=4)
			{
    		$query3="insert into demo values('$carno','$resdate','$resentry','$resexit','$resslot')";
       		$result3=mysql_query($query3,$connection);
	 	 	if(!$result3)
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
}
}
mysql_close($connection);
?>
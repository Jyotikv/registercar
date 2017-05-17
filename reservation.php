<?php

$carno=$_REQUEST['txtcar'];
$date=$_REQUEST['txtdate'];
$entry=$_REQUEST['txtfrom'];
$exittime=$_REQUEST['txtto'];
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
		$dateres=mysql_query("SELECT * FROM demo WHERE crtDate='$date' ", $connection);
		if($dateres)
		{
 			$cnt1=mysql_affected_rows($connection);
 			if($cnt1)
 			{
 				mysql_select_db("ad_254e48c6f6af81f");
				$entryres=mysql_query("SELECT * FROM demo WHERE crtDate='$date' and Entrytime='$entry'" , $connection);
				if($entryres)
				{
					$cnt2=mysql_affected_rows($connection);
					if($cnt2)
					{
						mysql_select_db("ad_254e48c6f6af81f");
						$slotres=mysql_query("SELECT * FROM demo WHERE crtDate='$date' and Entrytime='$entry' and slotNo='$slot'" , $connection);
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
							$carres=mysql_query("SELECT * FROM demo WHERE crtDate='$date' and Entrytime='$entry' and carNo='$carno'",$connection);
							if($carres)
							{
								$cnt4=mysql_affected_rows($connection);
								if($cnt4)
								{
									echo "This  car number is already reserved";
								}
								else
								{	
									$duration=$exittime-$entry;
				if($duration==1 && $entry<$exittime)
				{
					mysql_select_db("ad_254e48c6f6af81f");
					$query8="insert into demo values('$carno','$date','$entry','$exittime','$slot')";
       				$result8=mysql_query($query8,$connection);
	 	 			if(!$result8)
    				{
       					echo "Reservation failed";
  					}
    				else
    				{
        				echo "Reserved succefully ...";
						echo "your amount is 100";
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
								echo "your car is already reserved???";
							}
						}
					}
					else
					{
						echo "your car is already resevred......";
					}
				}
				else
				{
					$duration=$exittime-$entry;
					if($duration==1 && $entry<$exittime)
					{
					mysql_select_db("ad_254e48c6f6af81f");
					$query8="insert into demo values('$carno','$date','$entry','$exittime','$slot')";
       				$result8=mysql_query($query8,$connection);
	 	 			if(!$result8)
    				{
       					echo "Reservation failed";
  					}
    				else
    				{
        				echo "Reserved succefully ...";
						echo "your amount is 100";
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
				echo "You can't reserv at same timing...";
			}
		}
		
			else
			{
				$duration=$exittime-$entry;
				if($duration==1 && $entry<$exittime)
				{
					mysql_select_db("test");
					$query8="insert into demo values('$carno','$date','$entry','$exittime','$slot')";
       				$result8=mysql_query($query8,$connection);
	 	 			if(!$result8)
    				{
       					echo "Reservation failed";
  					}
    				else
    				{
        				echo "Reserved succefully ...";
						echo "your amount is 100";
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
			echo "........";
		}
	}

mysql_close($connection);
?>


 <?php
	$con=mysql_connect('us-cdbr-iron-east-03.cleardb.net','b931d9fc7061c4','1f5e0021')  or die ("Con Error".mysql_error());
    mysql_select_db('ad_db72847309cd7f4',$con);
          
    $sql="Select * from reg";	
   
    $ret_val=mysql_query($sql, $con) or die ("Error".mysql_error());
    if($ret_val)
    {
    	if(mysql_num_rows($ret_val)>0)
    	{
    	echo "<html><center>";
    	while($row=mysql_fetch_array($ret_val, MYSQL_NUM))	
		echo ($row[0] . " and " . $row[1]."</br>");
		
		echo "</center></html>";
    	}
	else
		echo ("No Record Found");	
    } 
    else
	echo (mysql_error()."Error");	
  ?>

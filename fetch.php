
 <?php
 	$con=mysql_connect('us-cdbr-iron-east-03.cleardb.net','bb8ff899f74f6a','ff6ca091')  or die ("Con Error".mysql_error());
    mysql_select_db('ad_254e48c6f6af81f',$con);
          
    $sql="Select  *from regg where Username='jyoti'";	
   
    $ret_val=mysql_query($sql, $con) or die ("Error".mysql_error());
    if($ret_val)
    {
    	if(mysql_num_rows($ret_val)>0)
    	{
    		echo "<html><center>";
    	while($row=mysql_fetch_array($ret_val, MYSQL_NUM))	
		echo ($row[0]."</br>");
		
		echo "</center></html>";
       	}
	else
	{
		echo "no field"
	} 
}


    else
	echo (mysql_error()."Error");	
  ?>

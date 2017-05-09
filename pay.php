<?php
$dura= $_REQUEST['txtduration'];
$con=mysql_connect("us-cdbr-iron-east-03.cleardb.net","bb8ff899f74f6a","ff6ca091") or die (mysql_error());
// Check connection
mysql_select_db("ad_254e48c6f6af81f") or die (mysql_connect_errno());

$strsql="SELECT * FROM demo ";
$rs=mysql_query($strsql,$con);
if($rs)
 $cnt=mysql_affected_rows($con);
 if($cnt)
{
  while ($row=mysql_fetch_array($rs))
    {
    echo "Duration".$row[3];
    if($row[3]==1)
    {
    	$res1=$row[3]*20;
    	echo "your bill is ".$res1;
    }
    
    }

}
else
{
	echo "sorry";
}
mysql_close($con);
?>

<?php
$car= $_REQUEST['txtcar2'];
$con=mysql_connect("us-cdbr-iron-east-03.cleardb.net","bb8ff899f74f6a","ff6ca091") or die (mysql_error());
// Check connection
mysql_select_db("ad_254e48c6f6af81f") or die (mysql_connect_errno());

$strsql="SELECT * FROM demo WHERE carNo='$car'";
$rs=mysql_query($strsql,$con);
if($rs)
 $cnt=mysql_affected_rows($con);
 if($cnt)
{
  while ($row=mysql_fetch_array($rs))
    {
    echo "<dt>Car Number:</dt><dd>".$row["0"]."</br>" ;
    echo "<dt>Date:</dt><dd>".$row["1"]."</br>";
    echo "<dt>Duration:</dt><dd>".$row["2"]."</br>";
    }

}
else
{
	echo "not found";
}
mysql_close($con);
?>

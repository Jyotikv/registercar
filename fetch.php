<?php
$car= $_REQUEST['txtcar2'];
$con=mysql_connect("us-cdbr-iron-east-03.cleardb.net","bb8ff899f74f6a","ff6ca091") or die (mysql_error());
// Check connection
mysql_select_db("ad_254e48c6f6af81f") or die (mysql_connect_errno());

$strsql="SELECT * FROM demo WHERE carNo='$car'";
$rs=mysql_query($strsql);
  while ($row=mysql_fetch_array($rs))
    {
    echo "<dt>Num:</dt><dd>".$car["0"]."</br>" ;
  //  $car=$car.$row[0].":";
}
echo "$car";

mysql_close($con);
?>

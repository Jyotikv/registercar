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
    echo "Car Number:".$row["0"] ;
    echo "Date:".$row["1"];
    echo "Entry timing:".$row["2"];
     echo "Exit timing:".$row["3"];
     echo "slot number:".$row["4"];
    }

}
else
{
	echo "The entered car number is not registered . Check again with valid car number";
}
mysql_close($con);
?>

<?php
$Uname= $_REQUEST['txtname1'];
$pass1=$_REQUEST['txtpass1'];
$con=mysql_connect("us-cdbr-iron-east-03.cleardb.net","bb8ff899f74f6a","ff6ca091") or die (mysql_error());
// Check connection
mysql_select_db("ad_254e48c6f6af81f") or die (mysql_connect_errno());

$strsql="SELECT * FROM regg WHERE Username='$Uname' and password='$pass1'";
$rs=mysql_query($strsql,$con);
if($rs)
 $cnt=mysql_affected_rows($con);
 if($cnt)
{
  while ($row=mysql_fetch_array($rs))
    {
    echo "<dt>You are succefully loged in:</dt><dd>".$row["0"]."</br>" ;
    //echo "<dt>Date:</dt><dd>".$row["1"]."</br>";
    //echo "<dt>Duration:</dt><dd>".$row["2"]."</br>";
   //echo "you are succefully loged in"
    }

}
else
{
	echo "please register";
}
mysql_close($con);
?>

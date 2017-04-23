<?php
//database parameters
$server="us-cdbr-iron-east-03.cleardb.net";
$username="bb8ff899f74f6a";
$password="ff6ca091";
$regno="";
//connect to mysql
$connection=mysql_connect($server,$username,$password) or die(mysql_error());
if (!$connection)
 {
	echo "Error in connection";
}
else
{
	mysql_select_db("ad_254e48c6f6af81f") or die(mysql_error());

//fetch all regno from table
	$query="select *from from reg";

	//all rows are stored in $result
	$result=mysql_query($query,$connection) or die(mysql_errno());
	if(!$result)
	{
		echo mysql_error();
	}
	else
	{
		//fetch each row from $result into row
	while ($row=mysql_fetch_array($result,MYSQL_NUM))
	 {
	//row[0] is regnumber	# code...
	echo ($row[0] . " and " . $row[1]."</br>");

	}
	//returns to android app as string
	echo "success";

	}
}
?>
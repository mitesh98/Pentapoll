<?php
//session_start();
$con =mysqli_connect('localhost','root');
if($con)
	echo "sucess ";
else 
	echo "error";

mysqli_select_db($con,'polltest2');
$country=$_GET["country"];

if($country!="")
{
	$res=mysqli_query($con,"SELECT * FROM states where country_id=$country");
	echo"<select name='state'>";
	while($row=mysqli_fetch_array($res))
	{
		echo "<option>"; echo $row["name"]; echo "</option>";
	}
	echo "</select>";
}
?>

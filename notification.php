<?php
session_start();
include 'database.php';
$q="SELECT * FROM `notification` WHERE emobile='{$_SESSION['emobile']}'";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_assoc($res))
{
	echo $row['totalcount'];
	if($row['totalcount']==1)
		//echo $row['question'];
	{
		echo 'hello';
		$update1="UPDATE `notification` SET `50`='1' WHERE emobile='{$_SESSION['emobile']}' AND `poll_id` ='{$row['poll_id']}'";
		mysqli_query($con,$update1) or die(mysqli_error($con));
	}
	else
		echo "no";
}

?>
<?php
include "database.php";
session_start();
if(isset($_GET['user_id']))
{
	$rec['user_id']=$_GET['user_id'];
}
else
{
$q1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res=mysqli_query($con,$q1);
$rec=mysqli_fetch_assoc($res);
}
$que1="SELECT * FROM `pollmates` WHERE `first_user_id`='{$rec['user_id']}' OR `second_user_id`='{$rec['user_id']}' ";
$res1=mysqli_query($con,$que1);
while($rec1=mysqli_fetch_assoc($res1))
{
	if($rec1['first_user_id']!=$rec['user_id'])
	{
		$que2="SELECT * FROM `signup` WHERE `user_id`='{$rec1['first_user_id']}'";
		$res2=mysqli_query($con,$que2);
		$rec2=mysqli_fetch_assoc($res2);
		echo '<a href="profile.php?user_id='. $rec2['user_id'].'"><h2>'.$rec2['username'].'</h2><br>';
	}
	if($rec1['second_user_id']!=$rec['user_id'])
	{
		$que2="SELECT * FROM `signup` WHERE `user_id`='{$rec1['second_user_id']}'";
		$res2=mysqli_query($con,$que2);
		$rec2=mysqli_fetch_assoc($res2);
		echo '<a href="profile.php?user_id='. $rec2['user_id'].'"><h2>'.$rec2['username'].'</h2><br>';
	}
}


?>
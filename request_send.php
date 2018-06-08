<?php
include "database.php";
session_start();

$q1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$q1);
$rec1=mysqli_fetch_assoc($res1);
$q2="INSERT INTO `friend_request`(to_user_id,from_user_id) values ('{$_POST['user_id']}','{$rec1["user_id"]}')";
mysqli_query($con,$q2)  or die(mysqli_error($con));	

	
	echo "Request Send <br>";
?>

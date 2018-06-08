<?php
include "database.php";
session_start();

$q1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$q1);
$rec1=mysqli_fetch_assoc($res1);

$q2="INSERT INTO `pollmates` (first_user_id,second_user_id) VALUES ({$rec1['user_id']},{$_POST['from_user_id']})";
$res2=mysqli_query($con,$q2);

$q3="UPDATE `friend_request` SET `accept`='1' WHERE to_user_id='{$rec1['user_id']}' AND from_user_id='{$_POST['from_user_id']}'" ;
$res3=mysqli_query($con,$q3) OR die (mysqli_error($con));

if($res3 && $res2)
{

echo "Now both of you are pollmates";
}
?>
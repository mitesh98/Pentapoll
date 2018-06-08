<?php
include "database.php";
session_start();

$q1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$q1);
$rec1=mysqli_fetch_assoc($res1);

$q2="DELETE  FROM `friend_request` WHERE `to_user_id`='{$rec1['user_id']}' AND from_user_id='{$_POST['from_user_id']}'";
$res2=mysqli_query($con,$q2);
if($res2)
{
echo "rejected";
}
?>
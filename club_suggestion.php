<?php
include "database.php";
session_start();

$que1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$que1);
$rec1=mysqli_fetch_assoc($res1);

<<?php

session_start();
include 'database.php';

$q="INSERT INTO `spotlist` (emobile,poll_id) values('{$_SESSION['emobile']}','{$_POST['poll_id']}')";
mysqli_query($con,$q)  or die(mysqli_error($con));
echo "hello";
/*$que="SELECT `quetion` FROM `polldetail`  WHERE poll_id='{$_POST['poll_id']}'";
$res = mysqli_query($con,$que);
$rec=mysqli_fetch_array($res);
echo $rec['question'];*/
?>
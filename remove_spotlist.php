<?php
session_start();
include 'database.php';
if(isset($_POST['poll_id']))
{
	$q="DELETE * FROM `spotlist` WHERE emobile ='{$_SESSION['emobile']}' AND poll_id='{$_POST['poll_id']}'";
	mysqli_query($con,$q) or die(mysqli_error($con));
}
?>
<?php
error_reporting(0);
session_start();
include 'database.php';
if($_FILES["edit_profile_image"]["name"] != '')
{
	//echo "hello";
 $test = explode('.', $_FILES["edit_profile_image"]["name"]);
 $ext = end($test);
 //$name = rand(100, 999) . '.' . $ext;
 $location = 'Userdetail/'.$_SESSION["user_id"]; 
	mkdir($location);
	$dir=$location.'/image.jpg';
 move_uploaded_file($_FILES["edit_profile_image"]["tmp_name"],$dir);
	$q="UPDATE `signup` SET pic ='$dir' WHERE emobile='{$_SESSION['emobile']}'";
	mysqli_query($con,$q) or die(mysqli_error($con));
	//echo $dir;
	$q="SELECT `pic` FROM `signup` WHERE emobile='{$_SESSION["emobile"]}'";
$a=mysqli_query($con,$q) OR die(mysqli_error($con));
$row=mysqli_fetch_assoc($a);
	$pic=$row['pic'];
 
}
?>

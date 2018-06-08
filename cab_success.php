<?php
include "database.php";
session_start();

$que1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$que1);
$rec1=mysqli_fetch_assoc($res1);


if(isset($_POST['new_cab_btn']))
{
	$cab_id=$rec['user_id'];
	$cab_id_unique=0;
	$cab_id=rand(10000000,99999999);
	while($cab_id_unique==0)
	{
		$query="SELECT `cab_id` FROM `cab_create` WHERE cab_id='{$cab_id}'";
		$result = mysqli_query($con,$query);
		$rowcount=mysqli_num_rows($result);
		$record=mysqli_fetch_array($result);
		if($rowcount>=1)
		{
		$cab_id=rand(10000000,99999999);
		$cab_id_unique=0;
		}
		else
			$cab_id_unique=1;
	}
	
	
	$cab_pic = $_FILES['cab_pic']['name'];
	$temp = $_FILES['cab_pic']['tmp_name'];
	$folder=$cab_id;
	$dirPath='Cabdetail/'.$folder;
	$result = mkdir($dirPath);
	
	
	$file_to_saved = $dirPath."/cabimage.jpg" or die("unable to open"); 
	
	move_uploaded_file($temp,$file_to_saved);
//---------------------------------------------------------
	
	
	
	
	echo $cab_id.'<br>';
	$que2="INSERT INTO `cab_create` (cab_id,user_id,cab_name,cab_pic) values ('{$cab_id}','{$rec1['user_id']}','{$_POST['cab_name']}','{$file_to_saved}')";
	$res2=mysqli_query($con,$que2);
	
	$que2="INSERT INTO `cab_list` (cab_id,user_id) values ('{$cab_id}','{$rec1['user_id']}')";
	$res2=mysqli_query($con,$que2);
	
	if($res2)
	{
	
	echo 'You successfully created a new cab name '.$_POST['cab_name'].' members are :<br>';
	}
	if(!empty($_POST['cab_list'])) 
	{
    foreach($_POST['cab_list'] as $user_id)
	{
		$que3="INSERT INTO `cab_list` (cab_id,user_id) values ('{$cab_id}','{$user_id}')";
	$res3=mysqli_query($con,$que3);
		
		$que="SELECT * FROM `signup` WHERE `user_id`='{$user_id}'";
		$res=mysqli_query($con,$que);
		$rec=mysqli_fetch_assoc($res);
		echo '
		
		<a href="profile.php?user_id='. $rec['user_id'].'"><h2>'.$rec['username'].'</h2><br>';
    }
	}
	header('Location: cab.php?cab_id='.$cab_id);
}
?>
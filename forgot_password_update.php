<?php
include 'database.php';
?>
<?php
if($_POST['newpassword']==$_POST['confirm_password'])
{
	$query="SELECT * FROM signup WHERE emobile='{$_POST['email']}' "; 
	$result = mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$_POST['newpassword']=sha1($_POST['newpassword']);
	$query="UPDATE `signup` SET `password` ='{$_POST['newpassword']}' WHERE emobile='{$_POST['email']}' "; 
	$result = mysqli_query($con,$query);
	
	if($result){
		header("refresh:0.1;url=login.php");
	echo 'Ur passwor have been created successfully.<a href="login.php">Go to login page</a>';
	
	}
	else
	echo "SOme Error have been occur plz try again"	;

}
else
	echo "NEw password and confirm password is not same";

?>
<?php
//error_reporting(0);
session_start();
include 'database.php';

//echo $_POST['email'];
?>

	<?php
$query="SELECT * FROM signup WHERE emobile='{$_POST['email']}' "; 
$result = mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
//$record=mysqli_fetch_array($result);
if($rowcount<1)
{
echo "You have not been registered";
}
	?>
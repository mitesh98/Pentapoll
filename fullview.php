<?php
include 'database.php';
//echo $_POST['poll_id'];


$q2="SELECT * FROM `polldetail` WHERE poll_id='{$_POST['poll_id']}' ";
		$b=mysqli_query($con,$q2) OR die(mysqli_error($con));
		$rowb=mysqli_fetch_assoc($b);
echo '<img src="'.$rowb['poll_pic'].'">';
echo $rowb['option1'];
echo $rowb['option2'];
echo $rowb['option3'];
echo $rowb['option4'];
echo $rowb['option5'];
?>

<?php
session_start();
include "database.php";
echo $_POST['comment'].'<br>';
//echo $_SESSION['emobile'];
$q="INSERT INTO `comment` (poll_id,emobile,comment) values({$_POST['poll_id']},'{$_SESSION['emobile']}','{$_POST['comment']}')";
mysqli_query($con,$q) or die (mysqli_error ($con));
?>

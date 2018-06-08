<?php
session_start();
include 'database.php';


echo $_POST['new_username'];
$q="UPDATE `signup` SET `username`='{$_POST['new_username']}' WHERE `emobile`='{$_SESSION['emobile']}'";
mysqli_query($con,$q) or die(mysqli_error($con));

?>
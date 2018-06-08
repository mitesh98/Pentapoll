<?php
session_start();
include 'database.php';
$que="DELETE FROM `spotlist` where emobile='{$_SESSION['emobile']}' AND poll_id='{$_POST['poll_id']}'";
mysqli_query($con,$que)  or die(mysqli_error($con));

?>
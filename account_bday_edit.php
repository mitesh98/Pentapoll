<?php
session_start();
include 'database.php';
if($_POST['new_bday'])
{
echo $_POST['new_bday'];
$q="UPDATE `signup` SET `bday`='{$_POST['new_bday']}'";
mysqli_query($con,$q) or die(mysqli_error($con));
}
?>

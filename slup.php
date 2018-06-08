<?php
session_start();
$_SESSION['emobile']=$_COOKIE['emobile'];
if(!isset($_COOKIE['emobile']))
{
	header('Location: signup.php');
}
else 
{
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pentapoll</title>
    <link rel="icon" href="images/pp.png" type="image/x-icon">
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Are you confused about anything?.Sign up for Pentapoll now and make your first poll.Let the world answer for you and go for the right one.">

  <meta name="keywords" content="poll,confused,question,answer,quest,query,inquiry,decision,vote,signin,login,SignUp,Pentapoll">
  <meta name="author" content="Nizam Nmk">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="slup.css">
<body>
  <div class="custom-landing"> <img class="custom-logo-img" src="images/a.png"></div>
    <div class="footer custom-landing-content">
    <p>Have a question in mind?</p>
    <p>  poll it and let the world find the perfect answer</P>
    <p>for you  </p>
    <div class="col-md-12 custom-button-4 text-center" style="border:none;padding-top:2px;">
      <a href="pollpanel.php"><button class="custom-button-1 custom-landing-button">let's poll</button></a>
      <a href="index.php"><button class="custom-button-1 custom-landing-button">not now</button></a>
    </div>

  </div>
</body>
</html>
<?php

if(isset($_POST['next']))
{
 	$_SESSION['country']=$_POST['country'];
	$country=$_POST['country'];
 	$_SESSION['state']=$_POST['state'];
	$state=$_POST['state'];
 	$_SESSION['country']=$_POST['country'];
 	$_SESSION['bday']=$_POST['bday'];
	$bday=$_POST['bday'];
	$folder = $_SESSION["user_id"];
		$dirPath='Userdetail/'.$folder;
		$result = mkdir($dirPath);
		
		//storing question and options in the folder of Pollname
		$myfile = fopen($dirPath."/poll.txt","w")or die("unable to open");
		fwrite($myfile,"username-".$_SESSION["username"]."      ");
		fwrite($myfile,"emobile-".$_SESSION["emobile"]."      ");
		fwrite($myfile,"password-".$_SESSION["password"]."      ");
        fwrite($myfile,"State-".$_SESSION["state"]."      ");
		fwrite($myfile,"Country-".$_POST['country']."      ");
 		fwrite($myfile,"Birthday-".$_SESSION["bday"]."      ");
		fwrite($myfile,"Gender-".$_POST['gender']."      ");



//<-----------------------image saving--------------------------------->

$p_pic = $_FILES['p_pic']['name'];
$temp = $_FILES['p_pic']['tmp_name'];
$file_to_saved = $dirPath."/image.jpg"; 

	
$_SESSION['p_pic']=$file_to_saved;

move_uploaded_file($temp,$file_to_saved);
	


//------------------------Updating database--------------------------


$update="UPDATE `signup` SET bday='{$_SESSION['bday']}',state='{$_SESSION['state']}',country={$_SESSION['country']},pic='$file_to_saved',Gender='{$_POST['gender']}'
WHERE emobile='{$_SESSION['emobile']}'";
mysqli_query($con,$update) or die(mysqli_error($con));
	
	//----------------------------------------------------------UPDATING COUNT TABLE---------------
	

	
//----------------------------------------------------------------------------
}



}	
	
?>
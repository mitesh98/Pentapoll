<?php
session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="account.css">
</head>
<body>
<!--navbar-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid row">

        <div class="navbar-header col-lg-2 col-md-2 col-md-push-5 col-xs-12 text-center">
            <button type="button" id="sidebarCollapse1" class="btn btn-info navbar-btn col-xs-2">
                <i class="glyphicon glyphicon-align-left"></i>
            </button>
            <a class="navbar-brand col-xs-8" href="#"><img id="logo" src="images/a.png"/> </a>

            <button type="button" id="notification" class="btn btn-info navbar-btn col-xs-1 dropdown-toggle" data-toggle="dropdown" >
                <i class="glyphicon glyphicon-th-list"></i>
            </button>
            <ul class="dropdown-menu notifications-list-m">
                <li><a href="#">20 reactions on your poll.</a></li>
                <li><a href="#">You have succesfully created your first poll!</a></li>
                <li><a href="#">Welcome to Pentapoll!</a></li>
            </ul>

            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn col-xs-1">
                <i class="glyphicon glyphicon-align-left"></i>
            </button>
        </div>
        <div class="custom-nav-wrapper col-md-10 col-xs-12" id="custom-navbar">
            <div class="col-lg-6 col-md-6 col-md-pull-2 col-xs-12 ">
                <ul class="nav navbar-nav custom-mobile">
                    <li class="custom-mobile"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li class="custom-mobile"><a href="pollpanel.php"><span class="glyphicon glyphicon-globe"></span> Pollpanel</a></li>
                    <li class=" active custom-mobile"><a href="#"><span class="glyphicon glyphicon-user"></span> Accounts</a></li>
                </ul>
                <ul class="nav navbar-nav custom-mobile custom-display-hide-1">
                    <li class="active custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 1</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 2</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 3</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 3</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 3</a></li>
                </ul>
            </div>
            <div class="col-md-3 text-center col-xs-12" id="search-main">
                <form class="navbar-form custom-mobile">
                    <div class="form-group custom-mobile">
                        <div class="icon-addon addon-xs">
                            <input type="text" class="form-control" placeholder="Search" id="search">
                            <label for="search" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-xs-12 text-center custom-display-hide-2">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown custom-mobile">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-paperclip"></span> Notification</a>
                        <ul class="dropdown-menu notifications-list">
                            <li><a href="#">20 reactions on your poll.</a></li>
                            <li><a href="#">You have succesfully created your first poll!</a></li>
                            <li><a href="#">Welcome to Pentapoll!</a></li>
                        </ul>
                    </li>
                    <li class="dropdown custom-mobile">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Give Feedback to us</a></li>
                            <li><a href="#">message2</a></li>
                            <li><a href="#">message3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</nav>
<!----------------------=================================-->
	<form action="feedback.php" method="post">

 <div class="w3-container custom-message-body">
	
   <textarea class="custom-messagebox" name="message" placeholder="Send us Ur feedback" ></textarea>
 </div>
 <div class="w3-container w3-center custom-sendmessage-button">
    
	 <input type="submit" name="send" value="Send" class="button w3-xlarge custom-button-1">
		</div>
	 </form>
	

	<!------------------------------------------------------------------------>
	
	<?php
	if(isset($_POST['send']))
	{
		
	//-----------------------------------OTP EMAILING-------------------------------------
	//----------otp sending---------to email id------------------------------
	
	error_reporting(E_ALL);
	require("PHPMailer_5.2.4/class.phpmailer.php");

	$mail=new PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPDebug=1;
	$mail->From="support@pentapoll.com";
	$mail->FromName=$_SESSION["username"];
	$mail->Host="smtp.zoho.com";
	$mail->SMTPSecure="ssl";
	$mail->Port=465;
	$mail->SMTPAuth=true;
	$mail->Username="support@pentapoll.com";
	$mail->Password="nmk2nizam1996";
	$mail->AddAddress("support@pentapoll.com","Support Pentapoll");
	$mail->AddReplyTo($_SESSION["emobile"],$_SESSION["username"]);
	$mail->WordWrap=50;
	//$mail->AddAttachment(""
	//$mail->
	$mail->IsHTML(true);
	$mail->Subject='Pentapoll';
	$mail->Body='From:'.$_SESSION["emobile"].'<br>'.$_POST['message'];
	if($mail->Send()){echo "Sent successfully";}else {echo " sending Error!!";}
//----------------------------------------------------------------	
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>
	
	
	
	
	
	
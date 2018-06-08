	<?php
session_start();
$isTouch = isset($_SESSION['emobile']);
if(!$isTouch)
{
	header('Location: signup.php');
}
else 
{
		//--------------------------EMAIL RANDOM TEXT--------------------------
	
	error_reporting(E_ALL);
	require("PHPMailer_5.2.4/class.phpmailer.php");

	$mail=new PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPDebug=0;
	$mail->From="support@pentapoll.com";
	$mail->FromName="Pentapoll";
	$mail->Host="smtp.zoho.com";
	$mail->SMTPSecure="ssl";
	$mail->Port=465;
	$mail->SMTPAuth=true;
	$mail->Username="support@pentapoll.com";
	$mail->Password="nmk2nizam1996";
	$mail->AddAddress($_SESSION["emobile"],$_SESSION["emobile"]);
	$mail->AddReplyTo("support@pentapoll.com","Pentapoll");
	$mail->WordWrap=50;
	//$mail->AddAttachment(""
	//$mail->
	$mail->IsHTML(true);
	$mail->Subject='Pentapoll';
	$mail->Body="Your One Time Password(OTP) is  <br>".$_SESSION['otp'];
	$mail->Send();
//----------------------------------------------------------------
}
?>
<?php
session_start();
include 'database.php';
//$_SESSION['otp']=rand(100000,999999);
 echo $_SESSION['otp']; 
$_SESSION['insert1']=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>SignUp for Pentapoll</title>
    <link rel="icon" href="images/pp.png" type="image/x-icon">
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Are you confused about anything?.Sign up for Pentapoll now and make your first poll.Let the world answer for you and go for the right one.">

  <meta name="keywords" content="poll,confused,question,answer,quest,query,inquiry,decision,vote,signin,login,SignUp,Pentapoll">
  <meta name="author" content="Nizam Nmk">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="signup.css" />
	<script type="text/javascript" src="jquery.js"></script>
</head>
<style>

        @media(min-width: 993px){ 
	body{
        padding-top: 150px;
	background-image: url("images/2.jpg");
    	background-size: cover;
	}
        .heading-hidden{
                        display:none;
        }
.main-nav{
display: block;
}
.mobile-nav{
display: none !important;
}    
        }
        @media(max-width: 992px){
                body{
                padding-top: 0px;
              	background-image: url("images/m2.jpg");
    	        background-size: cover;
                }
.main-nav{
display: none;
}
.mobile-nav{
display: block;
}    
        }
</style>
	
<!----------------------------------->
<body>
    <nav class="navbar navbar-fixed-top main-nav">
        <div style="width: 19rem;margin: 0 auto;">
            <a class="" href="#"><img id="logo" src="images/a.png"/> </a>
        </div>
    </nav>
    <nav class="navbar mobile-nav">
        <div style="width: 19rem;margin: 0 auto;">
            <a class="" href="#"><img id="logo" src="images/a.png"/> </a>
        </div>
    </nav>

    <div class="heading-hidden text-center " style="margin-top:-25px;"><p style="font-size:large;color:white;">The world may know the answer.</p></div>
<div class="container">
    <div class="signUpform col-md-4 col-md-offset-4">
        <h2 class="custom-head" style="font-size:2rem; border-bottom:none;">Enter your verification code:</h2>
		<p style="">Enter your six digit code<br>that we send to<span style="color:#337ab7"><?='  '.$_SESSION['emobile']?></span></p>
       
            <div class="otp-box" >
                <input style="width:35%;text-align:center;" type="text" name="otp" required="required"  size="35" id="otp" >
                
            </div>
       
		<p>Did'nt recieve yet? <div id="resend_otp">Resend OTP</div></p>
	<div id="mesaage"></div>
		<p><a href="signup.php">Go back</a>
    </div>
</div>
</body>
</html>


	<script>
		$(document).ready(function(){
	//alert("hii");
			
	$("#otp").keyup(function(){
		alert("hii");
		 validate();
	});
	});
	</script>
	
	<script>
		function validate(){
		var otp_length=$("#otp").val().length;
		var user_otp=$("#otp").val();
		var otp ="<?php echo $_SESSION['otp']?>";
		alert(user_otp);
		//if(otp_length==6)
		{
			if(user_otp==otp)
			{
				//alert("Matches");
				window.location.href = "luky.php";
				
				
			}
			else
				alert("Wrong OTP");
		}
		else if(otp_length>6)
		{
			alert("ENTER ONLY SIX DIGIT");
		}
	}
	
//-------BACKSPACE FUNCTION--------	
 
	//------------------EMAIL RESEND---------------------
	$("#resend_otp").click(function(){
		var otp=<?=$_SESSION['otp'] ?>;
		$.post("resend_otp.php",{otp:otp},function(data){
		 $("#message").html(data);
			 });
		});
	
</script>








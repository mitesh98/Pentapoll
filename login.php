<?php
//--------------------
if(isset($_GET['poll_id'])){
	session_start();
$_SESSION['share_poll_id']=$_GET['poll_id'];
	echo $poll_id;
}

if(isset($_POST['logout_btn']))
{
	$cookie_name = "emobile";
	$cookie_value = '';
	setcookie($cookie_name,null, time() -3600, "/");
	unset($_COOKIE['emobile']);
	session_start();
	session_destroy();
	session_unset();  
	unset($_SESSION['emobile']);
	$_SESSION = NULL;
	
	//echo $_COOKIE['emobile'];
//echo "<br>YOU HAVE BEEN SUCCESSFULLY LOGGEDOUT";

}

//===========================

		
//========================


include 'database.php';

?>


<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title>Log into Pentapoll</title>
    <link rel="icon" href="images/pp.png" type="image/x-icon">
    <style>
        body{
            background: url("images/m3.jpg");
            background-size: cover;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Are you confused about anything?.Sign up for Pentapoll now and make your first poll.Let the world answer for you and go for the right one.">

  <meta name="keywords" content="poll,confused,question,answer,quest,query,inquiry,decision,vote,signin,login,SignUp,Pentapoll">
  <meta name="author" content="Nizam Nmk">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="signup.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery.js"></script>

</head>
<style>

        @media(min-width: 993px){ 
	body{
        padding-top: 150px;
	background-image: url("images/3.jpg");
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
              	background-image: url("images/m3.jpg");
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

    <div class="heading-hidden text-center" style="margin-top:-25px;"><p style="font-size:large;color:white;">We will connect you with the world.</p></div>
<div class="container">
	<div class="signUpform col-md-4 col-md-offset-4"><br/>
<!--------------------------------------------------------->
	<?php
	if(isset($_POST['login_btn']))
{
	$q="SELECT * FROM `signup`  WHERE emobile='{$_POST['emobile']}' ";
	//ORDER BY `totalcount` DESC limit $page1,3
	$a=mysqli_query($con,$q);
	$num_rows=mysqli_num_rows($a);
	if($num_rows<1)
	{
		echo 'You have not signup.<a href="signup.php">Signup Now</a>';
	}
	else
	{
		$row=mysqli_fetch_assoc($a);
		$password=sha1($_POST['password']);
		if($password==$row['password'])
		{
			$cookie_name = "emobile";
			$cookie_value = $_POST['emobile'];
			setcookie($cookie_name, $cookie_value, time() + (86400*30*12), "/");
			session_start();
			$_SESSION['emobile']=$_POST['emobile'];
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['state']=$row['state'];
			$_SESSION['country']=$row['country'];
			//$_SESSION['user_id']=$row['user_id'];
			// echo $_SESSION['share_poll_id']; 
			if($_SESSION['share_poll_id'] !=''){
               // echo $_SESSION['share_poll_id'];        
              header('Location: index.php');
            }
            else{
				 
			header('Location: index.php');
            }
			
		}
		else if ($password!=$row['password'])
			echo "Wrong Password";
	}
}

	
	?>		
<!----------------------------------------------------------------><!---------------------------------------------------------------->	
<br/><h2 class="custom-head">Login</h2>

<form action="login.php" method="post">
<p class="custom-p"><input class="custom-input" placeholder="Email Id" type="text" name="emobile" required id="email_login"/></p>
<div id="emobile_error"></div>
<p class="custom-p" style="margin-bottom: 1rem;"><input class="custom-input" type="password" placeholder="Password" name="password"required="required" id="signup_password" minlength="5" maxlength="20"/ style="margin-left: -.3rem;"><img src="images/eye.png" height="20" width="20" id="eye" onclick="if(password.type=='text')password.type='password'; else password.type='text';" style="margin-left:-2.3rem"><br><span class="signup_error errors" id="password_error" style="display:block;" ><a href="forgot_password.php">Forgot your password?</a></span></p>

<p><input class="custom-button-1" type="submit" value="Login" name="login_btn"/></p>
</form>
	<p>Haven't signup.<a href='signup.php'>Signup Here</a></p>
</div>
</div>
<div class="footer-main text-center" style="width:100%;">
	<div class="container" style="padding-top:2rem;">
		<div class="col-xs-2 col-lg-2 text-center"><a href="#" style="color: white">About</a></div>
		<div class="col-xs-2 col-lg-2 text-center"><a href="#" style="color: white">Blog</a></div>
		<div class="col-xs-2 col-lg-2 text-center"><a href="#" style="color: white">Terms</a></div>
		<div class="col-xs-2 col-lg-2 text-center"><a href="#" style="color: white">Support</a></div>
		<div class="col-xs-2 col-lg-2 text-center"><a href="#" style="color: white">Privacy</a></div>
		<div class="col-xs-2 col-lg-2 text-center"><a href="#" style="color: white">F&#38;Q</a></div>
	</div>
	<div class="footer text-center" style="font-size: smaller;padding-top: 1.5rem;">
		<p><span style="color: #aaaaaa;">&copy; 2018 Pentapoll</span></p>
	</div>
</div>
	</body>
</body>
</html>

		<!--=================================================SCRIPT========================--->
<script>
	
	$("#email_login").focusout(function(){
		//alert("hello");
		check_emobile();		
	});
		</script>
		<script>
	function check_emobile(){
		//alert("hello");
	var user_email=$("#email_login").val();
$.post("email_check_for_login.php",{email:user_email},function(data){
		
		 $("#emobile_error").html(data);
});
}
</script>	
	
	


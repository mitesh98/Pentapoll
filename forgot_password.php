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
		<script type="text/javascript" src="jquery.js"></script>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="account.css">
</head>
<body>

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
                    <li class=" active custom-mobile"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Accounts</a></li>
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
                            <li><a href="feedback.php">Give us feedback</a></li>
                            <li><a href="#">message2</a></li>
                            <li><a href="#">message3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</nav>
	
		<p>Enter ur Email</p>
	<input type="text" name="emobile" id="enter_emobile" placeholder="Enter ur emobile" required>
		<input type="submit" id="forget_email_btn" name="forget_btn" value="submit">
	<div id="emobile_error"></div>
	
	
	</body>
</html>
	
<script>
	
	var varify_text=1;
$("#forget_email_btn").click(function(){
	var email=$("#enter_emobile").val();
	$.post("forgot_email_check.php",{email:email},function(data){
		 $("#emobile_error").html(data);
		 });
	});


</script>

















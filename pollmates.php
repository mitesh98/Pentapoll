<?php
session_start();
if(!isset($_COOKIE['emobile'])) {
	header('Location: signup.php');
}
else 
{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pentapoll</title>
    <link rel="icon" href="images/pp.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<body>
<style>
div ::-webkit-scrollbar {
    width: 0px;
}

div ::-webkit-scrollbar-track {
    display: none;
}
</style>

<!--navbar-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid row">

        <div class="navbar-header col-lg-2 col-md-2 col-md-push-5 col-xs-12 text-center" style="padding:0">
            <button type="button" id="sidebarCollapse1" class="btn btn-info navbar-btn col-xs-2 text-left" style="padding:0;background-color:transparent;border: none;font-size:x-large;">
                <i class="glyphicon glyphicon-user"></i>
            </button>
            <a class="navbar-brand col-xs-8" href="#"><img id="logo" src="images/a.png"/> </a>
            <button type="button" id="notification-m" class="btn btn-info navbar-btn col-xs-1 dropdown-toggle" data-toggle="dropdown" style="padding:0;background-color:transparent;border: none;font-size:x-large;padding-top:.3rem;" >
                <i class="glyphicon glyphicon-bell"></i>
            </button>
            <ul class="dropdown-menu notifications-list-m">           
                <li><a href="#">Welcome to Pentapoll!</a></li>
				<li><a href="pollpanel.php">Create a poll</a></li>
            </ul>
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn col-xs-1 text-right"style="padding:0;background-color:transparent;border: none;font-size:x-large;">
                <i class="glyphicon glyphicon-option-vertical"></i>
            </button>
        </div>
        <div class="custom-nav-wrapper col-md-10 col-xs-12" id="custom-navbar">
                <div class="col-lg-6 col-md-6 col-md-pull-2 col-xs-12 ">
                <ul class="nav navbar-nav custom-mobile">
                    <li class="active custom-mobile"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li class="custom-mobile"><a href="pollpanel.php"><span class="glyphicon glyphicon-globe"></span> Pollpanel</a></li>
                    <li class="custom-mobile"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Accounts</a></li>
                </ul>
                <ul class="nav navbar-nav custom-mobile custom-display-hide-1">
                    <li class="active custom-mobile"><a href="feedback.php">Feedback</a></li>
                    <li class="custom-mobile"><a href="help.php">Help Centre</a></li>
                    <li class="custom-mobile"><a href="About.html">About</a></li>
                    <li class="custom-mobile"><a href="privacy.html">Privacy</a></li>
                    <li class="custom-mobile"><a href="#">terms.html</a></li>
                </ul>
            </div>
			
<!----------------------------MAIN CONTENT AREA------------------------------>
			
            <div class="col-md-3 text-center col-xs-12" id="search-main">
                <form action="index.php" method="post" class="navbar-form custom-mobile">
                    <div class="form-group custom-mobile">
                    <div class="icon-addon addon-xs">
                        <input type="text" class="form-control" placeholder="Search" id="search_box" name="search_box" list="search-list">
                        <label for="search_box" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
						<datalist id="search-list">
							<div id="search_suggestion"></div>
							<!--<option value="Cusat">
							<option value="dfdsd">
							<option value="llll">
							<option value="soe">-->
						</datalist>
						<!--<input type="submit" class="search" style="width:19%; border: none; background-color: #fefff3f;" value="search" id="search" name="search"/>-->
                    </div>
                    </div>
					
                </form>
				
				
				
				<!----------------------------------SEARCHING OPTION------------------------------------->
	<script>	
	$(document).ready(function(){	
		$("#search_box").keyup(function(){
		var entered_char=$("#search_box").val();
	if(entered_char !='')
	{
		$.post("search.php",{entered_char:entered_char},function(data){
		   $("#search_suggestion").html(data);
		});
	}
});
});		
	</script>

			<!--------------SEARCH SUGGESTION ENDED------------------->
	
				</div>
            <div class="col-md-3 col-xs-12 text-center custom-display-hide-2">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown custom-mobile">
						
                        <a id="notification-button" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bell"></span> Notification</a>
                        <ul class="dropdown-menu" id="notification1">
                             <li><a href="#">Welcome to Pentapoll!</a></li>
                        </ul>

                    </li>
                    <li class="dropdown custom-mobile">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-option-vertical"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="feedback.php">Feedback</a></li>
                            <li><a href="help.php">Help Centre</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>	
    </div>
        <div class="col-md-3 text-center col-xs-12" id="search-mobile">
        <form class="navbar-form custom-mobile" action="index.php" method="post">
            <div class="form-group custom-mobile">
<div class="col-xs-8">
                <div class="icon-addon addon-xs">
                    <input type="text" class="form-control" placeholder="Search by tag" id="search2" name="search_input">
                    <label for="search2" class="glyphicon glyphicon-search" rel="tooltip" title="search"></label>
                </div>
</div>				<div class="col-xs-2" id="lens">
				 <input class="custom-button-1" type="submit" value="search" id="search2_btn" name="search2" >
				</div>
            </div>
        </form>
    </div>
</nav>

<div class="container" id="custom-width-adjustment">
    <div style="padding-top:1rem;" class="custom-sidebar-wrapper" id="custom-sidebar">
     <!--right bar-->
	<div id="write"></div>	
        <div class="col-lg-2 col-md-2 custom-padding-1 custom-right-sidebar">
     <!-- SUGGESTED POLLS -->
<style>
.chip {
    display: inline-block;
    padding: 0px 20px 0 40px;
    height: 50px;
    font-size: 16px;
    line-height: 50px;
    border-radius: 25px;
    background-color: #f1f1f1;
    min-width: 90%;
    margin-top: 0.5rem;
}

.chip img {
    margin-top: 5px !important;
    float: left;
    margin: 0 10px 0 -35px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
}
</style>
<div class="panel panel-default text-center" id="result" style="overflow: hidden;">
                <div class="panel-heading">Suggested Pollmates</div>
                <div class="panel-body custom-font-size-1" style="padding:0;" >
					
					
					
					
                        <div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div>
					


	
	
                        </div> 
<div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div> 

                     <div><a href="#">See All</a>  </div> 
             </div>
            </div>

            

            <div class="terms_conditions" style="padding: 1rem;font-size: smaller">
                            <p><span style="color: #aaaaaa;">&copy; 2018 Pentapoll</span>&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;<a href="#">Contact</a><br><a href="#">Terms</a>&nbsp;&nbsp;<a href="#">Support</a>&nbsp;&nbsp;<a href="#">Privacy Policy</a>&nbsp;&nbsp;<a href="#">Help</a></p>
                        </div>
        </div>

    </div>
    <!--main content section-->
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
<div class="panel panel-default text-center" id="result" style="overflow: scroll;height:40vh;">
                <div class="panel-heading">Requests</div>
                <div class="panel-body custom-font-size-1" style="padding:0; overflow:scroll;" >
					
<!--------------------->				
		
<!-----------============================------------------>
<?php
include "database.php";
session_start();
$q1="SELECT * FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$q1);
$rec1=mysqli_fetch_assoc($res1);
$q2="SELECT * FROM `friend_request` WHERE `to_user_id`='{$rec1['user_id']}'";
$res2=mysqli_query($con,$q2);
$x=mysqli_num_rows($res2);
while($rec2=mysqli_fetch_assoc($res2))
{
if( $x>0 && $rec2['accept']==0)
{
$q3="SELECT * FROM `signup` WHERE `user_id`='{$rec2['from_user_id']}'";
$res3=mysqli_query($con,$q3);
$rec3=mysqli_fetch_assoc($res3);
	?>
<div class="chip">
<img src="<?= $rec3['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
<div><span><a href="profile.php?user_id=<?= $rec3['user_id']?>"><?= $rec3['username']?></a>
<button id="accept<?=$rec2['from_user_id'] ?>">Accept</button>
<button id="reject<?=$rec2['from_user_id'] ?>">Not Now</button>
</span></div>
</div> 
					
<script>
$("#accept<?= $rec2['from_user_id']?>").click(function(){

	var from_user_id='<?= $rec2['from_user_id']?>';
	
	$.post("friend_accept.php",{from_user_id:from_user_id},function(data){
		$("#accept<?= $rec2['from_user_id'] ?>").hide();
		$("#reject<?= $rec2['from_user_id'] ?>").hide();
		 $("#accepted<?= $rec2['from_user_id'] ?>").html(data);
		 });
	});
	
	
$("#reject<?= $rec2['from_user_id']?>").click(function(){
var from_user_id='<?= $rec2['from_user_id']?>';
	$.post("friend_reject.php",{from_user_id:from_user_id},function(data){
		$("#accept<?= $rec2['from_user_id'] ?>").hide();
		$("#reject<?= $rec2['from_user_id'] ?>").hide();
		 $("#accepted<?= $rec2['from_user_id'] ?>").html(data);
		 });
});

</script>
<?php
}
	
}

?>
<!-------------------------------->					
				 </div>
            </div>


<div class="panel panel-default text-center" id="result" style="overflow: scroll;height:40vh;">
                <div class="panel-heading">Suggested Pollmates</div>
                <div class="panel-body custom-font-size-1" style="padding:0; overflow:scroll;" >
                        <div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div>

<div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div> 
<div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div>  

                 <div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div>

<div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div> 
<div class="chip">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                                 <div><span>John Doe<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus"></span></span></div>


                        </div>  

             </div>
            </div>	
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#sidebarCollapse').on('click', function () {
            $('#custom-navbar').toggleClass('active-nav');
            $('#custom-sidebar').removeClass('active-side');
            $('#main-content').removeClass('main-content');
            $('#custom-width-adjustment').removeClass('custom-width-adjustment');
        });
        $('#sidebarCollapse1').on('click', function () {
            $('#custom-sidebar').toggleClass('active-side');
            $('#main-content').toggleClass('main-content');
            $('#custom-width-adjustment').toggleClass('custom-width-adjustment');
            $('#custom-navbar').removeClass('active-nav');
        });
        $('#notification').on('click', function () {
            $('#custom-navbar').removeClass('active-nav');
            $('#custom-sidebar').removeClass('active-side');
            $('#main-content').removeClass('main-content');
            $('#custom-width-adjustment').removeClass('custom-width-adjustment');
        });

    });
</script>

<!------------------------------------------------------>	
</body>
</html>
<?php
}
	?>
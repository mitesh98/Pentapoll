<?php
session_start();
if(!isset($_COOKIE['emobile'])) {
	header('Location: signup.php');
}
else 
{
include 'database.php';
//include 'search2.php';
$_SESSION['emobile']=$_COOKIE['emobile'];
$query="SELECT * FROM signup WHERE 
emobile='{$_SESSION['emobile']}'";
$result = mysqli_query($con,$query);
$record=mysqli_fetch_array($result);
$_SESSION["profile_pic"]=$record['pic'];



$que="SELECT `poll_id` FROM `polldetail` WHERE 
emobile='{$_SESSION['emobile']}'";
$res = mysqli_query($con,$que);
$polls=mysqli_num_rows($res);

$que="SELECT `poll_id` FROM `poller` WHERE 
emobile='{$_SESSION['emobile']}'";
$res = mysqli_query($con,$que);
$polled=mysqli_num_rows($res);

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
        <!--left account bar-->
        <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 custom-padding-1 custom-left-sidebar">
            <div class="custom-profile-pic text-center"><img class="img-circle custom-border-2" src="<?php echo $record['pic'];?>" onerror="this.src='images/head.png'" style="width: 8rem;height: 8rem; margin-bottom: -4rem;"/></div>
            <div class="panel panel-default text-center" style="padding-top: 4rem; padding-bottom: .1rem;">
                <div class="panel-heading"><?php echo $record['username']; ?></div>
                <p style="font-size: small;font-weight: lighter;"><?php echo $record["emobile"]; ?></p>
                <div class="panel-footer" style="font-weight: bold;height:6rem;" >
                <div class="col-xs-6 col-lg-6">Polls<br><?=$polls?></div>
                <div class="col-xs-6 col-lg-6">Polled<br><?=$polled ?></div>
                </div>
            </div>
        </div>

        <!--right bar-->
	<div id="write"></div>	
        <div class="col-lg-2 col-md-2 custom-padding-1 custom-right-sidebar">
            <div class="panel panel-default text-center" id="result">
                <div class="panel-heading">Spotlist&nbsp;<span class="glyphicon glyphicon-bookmark"></span></span></div>
				
                <div class="panel-body custom-font-size-1" style="min-height: 30rem;" >
					<!-------NEW SPotting echo-------->
					
					<!------------------FETCH SPOTLIST----------------------------->
				<?php
				$q="SELECT * FROM `spotlist` WHERE emobile ='{$_SESSION['emobile']}'";
				$res_spotlist=mysqli_query($con,$q) or die(mysqli_error($con));
					while($row_spotlist=mysqli_fetch_assoc($res_spotlist))
					{
						$que_spot="SELECT `question` FROM `polldetail` WHERE 
						poll_id='{$row_spotlist['poll_id'] }'";
						$res_que = mysqli_query($con,$que_spot);
						$rsqtn=mysqli_fetch_assoc($res_que);
						
				?>
				<div id="spot<?=$row_spotlist['poll_id']?>">
				 <p style="border-bottom: solid teal .1rem;text-align: left;"><div id="<?= 'remove'.$row_spotlist['poll_id']?>">
				
				  <span class="glyphicon glyphicon-remove"></span>	</div>			
	
				 
				 &nbsp;&nbsp;<?= $rsqtn['question']?></p></div>
				<!----Removing Spotlist-------->
			<script>
			$("<?='#remove'.$row_spotlist['poll_id'] ?>").click(function(){
		var poll_id="<?=$row_spotlist['poll_id'] ?>";
		$.post("spot_remove.php",{poll_id:poll_id},function(data){
			$("<?='#spot'.$row_spotlist['poll_id'] ?>").hide();
	 });
	});
			</script>
			<!------------------------------>
				<?php
				}
				?>
				
			<!------------------------------->	
				
                   
                </div>
            </div>
            <div class="terms_conditions" style="padding: 1rem;font-size: smaller">
                            <p><span style="color: #aaaaaa;">&copy; 2018 Pentapoll</span>&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;<a href="#">Contact</a><br><a href="#">Terms</a>&nbsp;&nbsp;<a href="#">Support</a>&nbsp;&nbsp;<a href="#">Privacy Policy</a>&nbsp;&nbsp;<a href="#">Help</a></p>
                        </div>
        </div>

    </div>
    <!--main content section-->
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
		<div class="panel-body">
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

<!--------------------------------------------------->	
	
<!--------------------------PAGE CONTENT-------------------------------------------------------------->
	

	
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="images/head.png" class="media-object img-circle custom-border-1" style="width: 4rem">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">John Doe</h4>
                    <p style="font-size: smaller;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span>2 hours 42 minutes</p>
                </div>
                <div class="media-right">
                    <a href="#"><span class="pentapoll-icon icon-penta-loc" style="font-size: x-large"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <p class="question">Which is the best iPhone?</p>
                <div class="question-image">
                    <img class="img-responsive" src="images/og.jpg"/>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
                        <input type="radio" id="q1op1" name="option"><label for="q1op1">&nbsp;iPhone7</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op2" name="option"><label for="q1op2">&nbsp;iPhone8</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op3" name="option"><label for="q1op3">&nbsp;iPhone8 Plus</label>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op4" name="option"><label for="q1op4">&nbsp;iPhone6</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op5" name="option"><label for="q1op5">&nbsp;iPhone5</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">

                    </div>
                </div>
            </div>
            <div class="panel-footer text-center" style="border:none;"><button class="custom-button-1">Poll it !</button></div>
        </div>
     </div>

 
	
	
	
	
	
	
	
<!------------------------------------------------------>	
</body>
</html>
<?php
}
	?>
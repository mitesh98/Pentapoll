<?php
include "database.php";
include 'time.php';
session_start();
$q1="SELECT * FROM `signup` WHERE `user_id` = '{$_GET['user_id']}' ";
$res1=mysqli_query($con,$q1)OR die(mysqli_error($con));
$record=mysqli_fetch_assoc($res1);

$que="SELECT `poll_id` FROM `polldetail` WHERE 
`user_id` = '{$_GET['user_id']}'";
$res = mysqli_query($con,$que);
$polls=mysqli_num_rows($res);

$que="SELECT * FROM `pollmates` WHERE 
`first_user_id` = '{$_GET['user_id']}'";
$res = mysqli_query($con,$que);
$pollmate1=mysqli_num_rows($res);

$que="SELECT * FROM `pollmates` WHERE 
`second_user_id` = '{$_GET['user_id']}'";
$res = mysqli_query($con,$que);
$pollmate2=mysqli_num_rows($res);
$pollmates=$pollmate1+$pollmate2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pentapoll</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
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
                    <li class="custom-mobile"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li class="custom-mobile"><a href="pollpanel.php"><span class="glyphicon glyphicon-globe"></span> Pollpanel</a></li>
                    <li class="active custom-mobile"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Accounts</a></li>
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
    <div class="custom-sidebar-wrapper" id="custom-sidebar">
        <!--left account bar main-->
        

        <!--right bar-->
        <div class="col-lg-2 col-md-2 custom-padding-1 custom-right-sidebar">
            <div class="panel panel-default text-center">
                <div class="panel-heading">&nbsp;<span class="pentapoll-icon icon-penta-loc"></span></div>
                <div class="panel-body custom-font-size-1">
					
					
                  <!---------------------PollMates---------------------------------->
					
                    <?php
					$query1="SELECT * FROM `pollmates` WHERE `first_user_id` = '{$_GET['user_id']}' ";
					$result1=mysqli_query($con,$query1);
					while($record1=mysqli_fetch_assoc($result1)){
						
						$query2="SELECT * FROM `signup` WHERE `user_id` = '{$record1['second_user_id']}' ";
						$result2=mysqli_query($con,$query2);
						$record2=mysqli_fetch_assoc($result2);
					?>
					
                    <p style="border-bottom: solid teal .1rem;text-align: left;"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<?='<a href="profile.php?user_id='.$record2['user_id'].'">'.$record2['username'].'</a>'?></p>
					<?php
					}
					//------------------------------------
					$query1="SELECT * FROM `pollmates` WHERE `second_user_id`= '{$_GET['user_id']}' ";
					$result1=mysqli_query($con,$query1);
					while($record1=mysqli_fetch_assoc($result1)){
						
					$query2="SELECT * FROM `signup` WHERE `user_id` = '{$record1['first_user_id']}' ";
					$result2=mysqli_query($con,$query2);
					$record2=mysqli_fetch_assoc($result2);
					?>
					
                    <p style="border-bottom: solid teal .1rem;text-align: left;"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<?='<a href="profile.php?user_id='.$record2['user_id'].'">'.$record2['username'].'</a>'?></p>
					<?php
					}
					
					
					
					
					
					?>
                   <!-------------------------------------> 
                </div>
            </div>
            <div class="terms_conditions" style="padding: 1rem;font-size: smaller">
                <p><span style="color: #aaaaaa;">&copy; 2018 Pentapoll</span>&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;<a href="#">Contact</a><br><a href="#">Terms</a>&nbsp;&nbsp;<a href="#">Support</a>&nbsp;&nbsp;<a href="#">Privacy Policy</a>&nbsp;&nbsp;<a href="#">Help</a></p>
            </div>
        </div>
    </div>

    <!--left account bar secondary-->
    <style>
        .custom-panel-css .panel-body .col-sm-4{
            padding-left:0;
            padding-right:0;
        }
    </style>
    <div id="secondary-left" class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 custom-padding-1 custom-left-sidebar">
        <div class="custom-profile-pic text-center"><img class="img-circle custom-border-2" src="<?php echo $record['pic'];?>" onerror="this.src='images/head.png'" style="width: 8rem; margin-bottom: -4rem;"/></div>
        <div class="panel panel-default text-center custom-panel-css" style="padding-top: 4rem; padding-bottom: .1rem;">
            <div class="panel-heading"><?php echo $record['username']; ?></div>
            <div class="panel-body" style="font-weight: bold;">
				
				<a href="pollmates_list.php?user_id=<?= $record['user_id']?>">
                <div class="col-xs-4 text-center">
                    <span class="glyphicon glyphicon-user"></span>
                    <p style="font-size: 1rem;">Pollmates</p>
					<p style="font-weight: bolder;"><?=$pollmates ?></p>
                </div>
					</a>
                <div class="col-xs-4">
                    <span class="glyphicon glyphicon-user"></span>
                    <p style="font-size: 1rem;">Polls</p>
                    <p style="font-weight: bolder;"><?= $polls?></p>
                </div>
                <div class="col-xs-4">
                    <span class="glyphicon glyphicon-user"></span>
                    <p style="font-size: 1rem;">Followers</p>
                    <p style="font-weight: bolder;">56</p>
                </div>
            </div>
        </div>
    </div>
    <!--============main content section====================-->
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
		
		<?php
	
	$que2="SELECT * FROM `signup` WHERE `user_id`={$_GET['user_id'] }";
	$res2=mysqli_query($con,$que2) OR die(mysqli_error($con));
	$rec2=mysqli_fetch_assoc($res2);

	$que1="SELECT * FROM `polldetail`  WHERE user_id='{$_GET['user_id']}' AND `cab_id`=0";
	$res1 = mysqli_query($con,$que1) OR die(mysqli_error($con));
	while($rec1=mysqli_fetch_array($res1)){
			
	?>
	 <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?= $rec2['pic']?>" onerror="this.src='images/head.png'" class="media-object img-circle custom-border-1" style="width: 4rem">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $rec2['username']?></h4>
                    <p style="font-size: smaller;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($rec1['time']);?></p>
                </div>
                <div class="media-right">
                    <a href="#"><span class="pentapoll-icon icon-penta-loc" style="font-size: x-large"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <p class="question"><?= $rec1['question']?></p>
					<?php
		if($rec1['option3']!='')
		{
		?>
                <div class="question-image">
                    <img class="img-responsive" src="<?= $rec1['poll_pic']?>"/>
                </div>
				
				<?php } ?>
				
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
                        <input type="radio" id="q1op1" name="option"><label for="q1op1">&nbsp;<?= $rec1['option1']?></label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op2" name="option"><label for="q1op2">&nbsp;<?= $rec1['option2']?></label>
                    </div>
					<?php
		if($rec1['option3']!='')
		{
		?>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op3" name="option"><label for="q1op3">&nbsp;<?= $rec1['option3']?></label>
                    </div>
					<?php } ?>
                </div>
                <div class="row text-center">
					<?php
		if($rec1['option4']!='')
		{
		?>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op4" name="option"><label for="q1op4">&nbsp;<?= $rec1['option4']?></label>
                    </div>
					<?php
		}
		if($rec1['option5']!='')
		{
		?>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op5" name="option"><label for="q1op5">&nbsp;<?= $rec1['option5']?></label>
                    </div>
					<?php } ?>
                    <div class="col-lg-4 col-md-4 col-xs-4">

                    </div>
                </div>
            </div>
    
        </div>
<?php
						 }
	?>
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

</body>
</html>
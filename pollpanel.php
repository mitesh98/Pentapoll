<?php
session_start();
$isTouch = isset($_SESSION['emobile']);
if(!$isTouch)
{
	header('Location: login.php');
}
else
{
include 'database.php';
$_SESSION['POLL_POST']=0;
	
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
   <title>Pentapoll | Pollpanel</title>
    <link rel="icon" href="images/pp.png" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Are you confused about anything?.Sign up for Pentapoll now and make your first poll.Let the world answer for you and go for the right one.">

  <meta name="keywords" content="poll,confused,question,answer,quest,query,inquiry,decision,vote,signin,login,SignUp,Pentapoll">
  <meta name="author" content="Nizam Nmk">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" href="pollpanel.css">
<body>
<!-------------navbar---------------------------->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid row">

        <div class="navbar-header col-lg-2 col-md-2 col-md-push-5 col-xs-12 text-center" style="padding:0">
            <button type="button" id="sidebarCollapse1" class="btn btn-info navbar-btn col-xs-2 text-left" style="padding:0;background-color:transparent;border: none;font-size:x-large;">
                <i class="glyphicon glyphicon-user"></i>
            </button>
            <a class="navbar-brand col-xs-8" href="index.php"><img id="logo" src="images/a.png"/> </a>
            <button type="button" id="notification-m" class="btn btn-info navbar-btn col-xs-1 dropdown-toggle" data-toggle="dropdown" style="padding:0;background-color:transparent;border: none;font-size:x-large;padding-top:.3rem;" >
                <i class="glyphicon glyphicon-bell"></i>
            </button>
            <ul class="dropdown-menu notifications-list-m">
                <li><a href="#">20 reactions on your poll.</a></li>
                <li><a href="#">You have succesfully created your first poll!</a></li>
                <li><a href="#">Welcome to Pentapoll!</a></li>
            </ul>
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn col-xs-1 text-right"style="padding:0;background-color:transparent;border: none;font-size:x-large;">
                <i class="glyphicon glyphicon-option-vertical"></i>
            </button>
        </div>
        <div class="custom-nav-wrapper col-md-10 col-xs-12" id="custom-navbar">
                <div class="col-lg-6 col-md-6 col-md-pull-2 col-xs-12 ">
                <ul class="nav navbar-nav custom-mobile">
                    <li class="custom-mobile"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li class="active custom-mobile"><a href="pollpanel.php"><span class="glyphicon glyphicon-globe"></span> Pollpanel</a></li>
                    <li class="custom-mobile"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Accounts</a></li>
                </ul>
                <ul class="nav navbar-nav custom-mobile custom-display-hide-1">
                    <li class="active custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 1</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 2</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 3</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 3</a></li>
                    <li class="custom-mobile"><a href="#"><span class="glyphicon glyphicon-pencil"></span> TOPIC 3</a></li>
                </ul>
            </div>

<!----------------------------MAIN CONTENT AREA------------------------------>

            <div class="col-md-3 text-center col-xs-12" id="search-main">
                <form action="home.php" method="post" class="navbar-form custom-mobile">
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
                            <li><a href="#">message1</a></li>
                            <li><a href="#">message2</a></li>
                            <li><a href="#">message3</a></li>
                        </ul>

                    </li>
                    <li class="dropdown custom-mobile">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-option-vertical"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">message1</a></li>
                            <li><a href="#">message2</a></li>
                            <li><a href="#">message3</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>
        <div class="col-md-3 text-center col-xs-12" id="search-mobile">
        <form class="navbar-form custom-mobile">
            <div class="form-group custom-mobile">
                <div class="icon-addon addon-xs">
                    <input type="text" class="form-control" placeholder="Search" id="search2">
                    <label for="search2" class="glyphicon glyphicon-search" rel="tooltip" title="search"></label>
                </div>
            </div>
        </form>
    </div>
</nav>
<style>
     @media(min-width:923px){
         .custom-sidebar-wrapper{
                         display: none;
}

}

</style>

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
                <div class="panel-heading">Spotlist&nbsp;<span class="glyphicon glyphicon-tag"></span></div>
                <div class="panel-body custom-font-size-1" style="min-height: 30rem;">
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
				 <p style="border-bottom: solid teal .1rem;text-align: left;"><div id="<?= 'remove'.$row_spotlist['poll_id']?>"></div>&nbsp;&nbsp;<?= $rsqtn['question']?></p></div>
				
				<?php
				}
				?>
				
			<!------------------------------->	
				
                   
                </div>
            </div>
    </div>
</div>

<!----------------------POLL IMAGE------------------------->
<div class="container" style="background-color:white;" id="main-content">
  <div class="col-md-3"></div>
  <div class="col-md-6" style="padding:45px;">
<form action="pollpreview.php" method="post"enctype="multipart/form-data" id="poll_form">
<input type='file' id="poll_image" accept="images" name="poll_pic" style="display:none">
   <div id="poll_pic_upload" class="custom-image col-md-12 text-center"> <p style="margin-top:10.5rem;">click here to upload image</p>
		 <img  class="img-responsive custom-poll-image"  id="blah"></div>

	  <!---------------------->

  <!-- <div class="custom-button-4 text-center" style="border:none;"><button class="custom-button-1">choose file</button></div>-->
     <input  class="custom-text-field" placeholder="Enter Tag" list="tags" name="tag" required="required" minlength="2" maxlength="30"/>
     <datalist id="tags">
       <option value="Election">
       <option value="Isl">
       <option value="Epl">
       <option value="News">
       <option value="Social">
       <option value="Style">
     </datalist>
     <input type="text" class="custom-text-field" placeholder="Enter Question" name="question" required="required">
     <input type="text" class="col-md-6 custom-text-field-2" placeholder="option 1" name="option1" required="required" minlength="1" maxlength="30">
     <input type="text" class="col-md-6 custom-text-field-2"  placeholder="option 2" name="option2" required="required" minlength="1" maxlength="30">
     <input type="text" class="col-md-6 custom-text-field-2" placeholder="option 3" name="option3" minlength="1" maxlength="30">
     <input type="text" class="col-md-6 custom-text-field-2"  placeholder="option 4" name="option4" minlength="1" maxlength="30" >
     <input type="text" class="col-md-6 custom-text-field-2"  placeholder="option 5" name="option5" minlength="1" maxlength="30">
    <div class="col-md-12 custom-button-4 text-center" style="border:none;padding-top:2px;"><!--<button class="custom-button-1" >submit</button>-->
	<input type="submit" name="submit"  class="custom-button-1" value="create poll">
	</div>

  </div>

</div>

</form>
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




<script>

//---------------------CHOOSING PROFILE  PIC-------->
$("#poll_pic_upload").click(function(){
$("#poll_image").click();
});

	//--------------------------------IMAGE PREVIEW----------

	function readURL(input){
	if(input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
   }
   }

   $("#poll_image").change(function() {
   readURL(this);
   });

	</script>

</html>
<?php
}
	?>

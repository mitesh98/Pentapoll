<script type="text/javascript" src="jquery.js"></script>
<?php
session_start();
$isTouch = isset($_SESSION['emobile']);
if(!$isTouch)
{
	header('Location: signup.php');
}
else 
{
include 'database.php';

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
		<script type="text/javascript" src="jquery.js"></script>

    <link rel="stylesheet" href="home.css">
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
			//alert("hello");
		//$("#search").click(function(){ 
		$("#search_box").keyup(function(){
		var entered_char=$("#search_box").val();
		//alert(entered_char);
	if(entered_char !='')
	{
		$.post("search.php",{entered_char:entered_char},function(data){
		//alert("hello");
			//$("#search_suggestion").fadeIn();
		   $("#search_suggestion").html(data);
		   //});
		});
	}
});
	/*$(document).on('click','li',function(){
		alert("hello");
	$("#search_box").val($(this).text());
	$("#search_suggestion").fadeOut();
	});	*/
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

	<!---------------------->
</body>
	</head>
</html>

<!-------------------------PHP CODE HERE---------------------------->

<?php

//------------------storing image in folder---------------->

if (isset($_POST['cab_poll_create_btn'])) 
{
	//------------------------CREATING UNIQUE POLLID--------------------------------------//
	$user_id_unique=0;	
	$poll_id=rand(100000,999999);
	while($user_id_unique==0)
	{
		$query="SELECT `poll_id` FROM `polldetail` WHERE poll_id=$poll_id";
	
		$result = mysqli_query($con,$query);
		$rowcount=mysqli_num_rows($result);
		$record=mysqli_fetch_array($result);
		if($rowcount>=1)
		{
		$poll_id=rand(100000,999999);
		$user_id_unique=0;
		}
		else
			$user_id_unique=1;
	}
	
	
	
	
	//echo "YOUR POLL CREATED SUCCESSFULLY";
	
//------------------------------------------------
	$tag=$_POST['tag'];
	$question=$_POST['question'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$option5=$_POST['option5'];
	
	
	$poll_pic = $_FILES['poll_pic']['name'];
	$temp = $_FILES['poll_pic']['tmp_name'];
	$folder=$poll_id;
	$dirPath='Polldetail/'.$folder;
	$result = mkdir($dirPath);
	
	
	$file_to_saved = $dirPath."/pollimage.jpg";//or die("unable to open"); 
	
	move_uploaded_file($temp,$file_to_saved);
//---------------------------------------------------------


	$myfile = fopen($dirPath."/polldetail.txt","w")or die("unable to open");
		fwrite($myfile,"poll_id-".$poll_id."      ");
		fwrite($myfile,"user_id-".$_SESSION["user_id"]."      ");
		fwrite($myfile,"TAG-".$tag."      ");
		fwrite($myfile,"question-".$question."      ");
		fwrite($myfile,"option1-".$option1."      ");
		fwrite($myfile,"option2-".$option2."      ");
        fwrite($myfile,"option3-".$option3."      ");
		fwrite($myfile,"option4-".$option4."      ");
 		fwrite($myfile,"option5-".$option5."      ");

	
	
//-----------------Declaring all as SEESION VARIABLE------------------
	
	//------------------------------creating file------------------------
}

?>


 <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <p class="question"><?=$question ?></p>
				<?php
					if($_FILES['poll_pic']['name']!='')
					{
						?>
                <div class="question-image">
                    <img class="img-responsive" src="<?= $file_to_saved?>"/>
                </div>
				<?php
					}
							?>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
                        <input type="radio" id="q1op1" name="option"><label for="q1op1">&nbsp;<?=$option1?></label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op2" name="option"><label for="q1op2">&nbsp;<?=$option2 ?></label>
                    </div>
					<?php
					if($option3 !='')
					{
						?>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op3" name="option"><label for="q1op3">&nbsp;<?=$option3 ?></label>
                    </div>
					<?php
					}
							?>
                </div>
                <div class="row text-center">
					<?php
					if($option4 !='')
					{
						?>				

                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op4" name="option"><label for="q1op4">&nbsp;<?=$option4 ?></label>
                    </div>
					<?php
					}
							?>
					<?php
					if($option5 !='')
					{
						?>	
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="q1op5" name="option"><label for="q1op5">&nbsp;<?=$option5 ?></label>
                    </div>
					<?php
					}
							?>
                    <div class="col-lg-4 col-md-4 col-xs-4">

                    </div>
                </div>
            </div>
			<?php 
			if($_SESSION['CAB_POLL_POST']==0){
			?>
            <div class="panel-footer text-center" style="border:none;"><a href="pollpanel.php"><button class="custom-button-1" style="margin-right:10rem;" id="cancel_button">Cancel</button></a><button class="custom-button-1" id="post_button">Post it</button></div>
	 
	

			<?php
			}
				?>
			<div id="something"></div>
			 </div>
        </div>
	           
</div>

<!---------------------------------------------------------------------------------->

<script>
$("#post_button").click(function(){
	

	//var check= //$_SESSION['POLL_POST']?>;
	//if(check==0)
		//{
			var cab_id='<?= $_GET['cab_id']?>';
			var poll_id='<?=$poll_id ?>';
			var tag='<?=$tag ?>';
			var question="<?=$question ?>";
			var option1='<?=$option1 ?>';
			var option2='<?=$option2 ?>';
			var option3='<?=$option3 ?>';
			var option4='<?=$option4 ?>';
			var option5='<?=$option5 ?>';
			var file_to_saved='<?= $file_to_saved ?>';	
			$.post("cab_poll_post.php",{cab_id:cab_id,poll_id:poll_id,tag:tag,question:question,option1:option1,option2:option2,option3:option3,option4:option4,option5:option5,file_to_saved:file_to_saved},function(data){
			$("#cancel_button").hide();	
$("#post_button").hide();	
		 $("#something").html(data);
			});
			
});

</script>

<?php
}
?>


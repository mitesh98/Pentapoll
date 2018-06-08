<?php
session_start();
if(!isset($_COOKIE['emobile'])) {
	header('Location: signup.php');
}
else 
{
include 'database.php';
include 'time.php';		
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

	
$que="SELECT * FROM `pollmates` WHERE 
`first_user_id` = '{$record['user_id']}'";
$res = mysqli_query($con,$que);
$pollmate1=mysqli_num_rows($res);

$que="SELECT * FROM `pollmates` WHERE 
`second_user_id` = '{$record['user_id']}'";
$res = mysqli_query($con,$que);
$pollmate2=mysqli_num_rows($res);
$pollmates=$pollmate1+$pollmate2;
	
	
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
        <!--left account bar-->
        <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 custom-padding-1 custom-left-sidebar">
            <div class="custom-profile-pic text-center"><img class="img-circle custom-border-2" src="<?php echo $record['pic'];?>" onerror="this.src='images/head.png'" style="width: 8rem;height: 8rem; margin-bottom: -4rem;"/></div>
            <div class="panel panel-default text-center" style="padding-top: 4rem; padding-bottom: .1rem;">
                <div class="panel-heading"><?php echo $record['username']; ?></div>
                <p style="font-size: small;font-weight: lighter;"><?php echo $record["emobile"]; ?></p>
                <div class="panel-footer" style="font-weight: bold;height:6rem;" >
				<a href="pollmates_list.php"><div class="col-xs-6 col-lg-6" >Pollmates<br><?=$pollmates?></div></a>
					<a href="account.php"><div class="col-xs-6 col-lg-6">Polls<br><?=$polls?></div></a>
					<a href="account.php"><div class="col-xs-6 col-lg-6">Polled<br><?=$polled ?></div></a>
                </div>
            </div><br>
	<a href="new_cab.php">Create new cab</a><br>
	<a href="club_suggestion.php">Join a club</a><br>
			<?php
		$q1="SELECT * FROM `cab_list` WHERE `user_id`='{$record['user_id']}'";
		$res1=mysqli_query($con,$q1);
		while($rec1=mysqli_fetch_assoc($res1))
		{
			$q2="SELECT * FROM `cab_create` WHERE `cab_id`='{$rec1['cab_id']}'";
		$res2=mysqli_query($con,$q2);
	$rec2=mysqli_fetch_assoc($res2);
		
		?>
		<a href="cab.php?cab_id=<?=$rec2['cab_id'] ?>"><?= $rec2['cab_name'] ?></a><br>
			<?php
			}
		?>
			
        </div>

        <!--right bar-->
	<div id="write"></div>	
        <div class="col-lg-2 col-md-2 custom-padding-1 custom-right-sidebar">
            <div class="panel panel-default text-center" id="result" style="overflow:scroll;height: 35vh;">
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
				 <p style="border-bottom: solid teal .1rem;text-align: left;">
				
				  <span class="glyphicon glyphicon-remove" id="<?= 'remove'.$row_spotlist['poll_id']?>"></span>				
	
				
				 &nbsp;&nbsp;<span id="see_polldetail<?=$row_spotlist['poll_id']?>"><?= $rsqtn['question']?></span></p></div>
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
			<script>
			$("<?='#see_polldetail'.$row_spotlist['poll_id']?>").click(function(){
			var poll_id="<?=$row_spotlist['poll_id'] ?>";
			$.post("see_poll_detail.php",{poll_id:poll_id},function(data){	
			
			$("#main-content").hide();
			$("#see_poll_detail").html(data);
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
		<!--------Suggested Friend------------>
		
<div class="panel panel-default text-center" id="result" style="overflow: hidden;">
                <div class="panel-heading">Suggested Pollmates</div>
                <div class="panel-body custom-font-size-1" style="padding:0;" >
					
	<?php
$offset=rand(0,200);
$q2="SELECT * FROM `signup` WHERE emobile != '{$_SESSION['emobile']}' LIMIT 3 OFFSET $offset";
$res2=mysqli_query($con,$q2)OR die(mysqli_error($con));
while($rec2=mysqli_fetch_assoc($res2))
{
	$q3="SELECT * FROM `friend_request` WHERE `from_user_id`= '{$record['user_id']}' AND `to_user_id`= '{$rec2['user_id']} '";
	$res3=mysqli_query($con,$q3)OR die(mysqli_error($con));
	$x=mysqli_num_rows($res3);
	
	$q4= " SELECT * FROM `friend_request` WHERE `from_user_id`= '{$rec2['user_id']}' AND `to_user_id`= '{$record['user_id']}'";
	$res4=mysqli_query($con,$q4) OR die(mysqli_error($con));
	$y=mysqli_num_rows($res4);
	if($x+$y==0)
	{
	?>
	<div class="chip" id="add_pollmates<?=$rec2['user_id']?>">
     <img src="<?= $rec2['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
     <div><span><a href="profile.php?user_id=<?= $rec2['user_id'] ?>"><?= substr($rec2['username'],0,5) ?></a>
		<div id="add_pollmates_btn<?=$rec2['user_id'] ?>"> 
			<span style="float: right;top: 3;top: 17px;" class="glyphicon glyphicon-plus">
		 </span>
		 </div>
		 </span>
		</div>
  </div>
					
					
		<?php
	}
	?>
	<script>
$("<?= '#add_pollmates_btn'.$rec2['user_id']?>").click(function(){
	var user_id='<?= $rec2['user_id']?>';
	$.post("request_send.php",{user_id:user_id},function(data){
		$("#add_pollmates<?= $rec2['user_id'] ?>").hide();
		 $("#send_request_btn<?= $rec2['user_id'] ?>").html(data);
		 });
	
})
</script>				
					
					
	<?php
	
}
	?>
					
                     <div><a href="#">See All</a>  </div> 
             </div>
            </div>

            

            <div class="terms_conditions" style="padding: 1rem;font-size: smaller">
                            <p><span style="color: #aaaaaa;">&copy; 2018 Pentapoll</span>&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;<a href="#">Contact</a><br><a href="#">Terms</a>&nbsp;&nbsp;<a href="#">Support</a>&nbsp;&nbsp;<a href="#">Privacy Policy</a>&nbsp;&nbsp;<a href="#">Help</a></p>
                        </div>
        </div>

    </div>
    <!--main content section-->
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="see_poll_detail">
		<div class="panel-body">
		</div>
		</div>
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
	
<?php
if (isset($_POST['search'])) 
{
	$q="SELECT * FROM `count`  WHERE tag='{$_POST['search_box']}' ";
	$a=mysqli_query($con,$q);
	echo mysqli_num_rows($a);
	echo $_POST['search_box'];
}
else if(isset($_POST['search2']))
{
	include 'search2.php';
}
//=============Share View==============
else if(isset($_SESSION['share_poll_id']))
{
	$_GET['opt']=$_SESSION['share_poll_id'];
	$optionno= $_GET['opt']%10 ;
	//echo $optionno.'</br>';
	$other_poll_id=floor($_GET['opt']/10) ;
	//echo $other_poll_id;
		
	//---------------CHECKING POLLED OR NOT---------------------------------
		
	$que="SELECT * FROM `poller` WHERE emobile='{$_SESSION['emobile']}' AND `poll_id`=$other_poll_id";
		$res1=mysqli_query($con,$que) ;
		$polled=mysqli_num_rows($res1);
		if($polled==0)
		{
			$query="SELECT * FROM `count` WHERE `poll_id`='$other_poll_id'";
	$result = mysqli_query($con,$query);
	$record=mysqli_fetch_array($result);
//-----------------
	$q1="Insert into `poller` (poll_id,emobile,question)values($other_poll_id,'{$_SESSION["emobile"]}','{$rec['question']}')";
	$i=mysqli_query($con,$q1) ;
	
//---------------------------------UPDATING COUNT----------------------------------------

	$record['totalcount']=$record['totalcount']+1;
	$update="UPDATE `count` SET totalcount={$record['totalcount']} WHERE poll_id=$other_poll_id";
	mysqli_query($con,$update);
	
	$q2="UPDATE `notification` SET totalcount={$record['totalcount']} WHERE poll_id=$other_poll_id";
	mysqli_query($con,$q2)or die(mysqli_error($con));
	
	//------------------------------Updating option count--------------------------------------------------

if(($_GET['opt']%10)==1)
{
	//echo "ka ho";
	$record['opt1count']+=1;
	$update="UPDATE count SET opt1count={$record['opt1count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option1";
}
else if(($_GET['opt']%10)==2)
{
	$record['opt2count']+=1;
	$update="UPDATE count SET opt2count={$record['opt2count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option2";
}
else if(($_GET['opt']%10)==3)
{
	$record['opt3count']+=1;
	$update="UPDATE count SET opt3count={$record['opt3count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option3";
}
else if(($_GET['opt']%10)==4)
{
	$record['opt4count']+=1;
	$update="UPDATE count SET opt4count={$record['opt4count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option4";
}
else if(($_GET['opt']%10)==5)
{
	$record['opt5count']+=1;
	$update="UPDATE count SET opt5count={$record['opt5count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option5";
}

//echo $option1count;
?>
<?php
		}
	//-------------------
	$query="SELECT * FROM `count` WHERE poll_id=$other_poll_id";
	$result = mysqli_query($con,$query);
	$record=mysqli_fetch_array($result);
	$que="SELECT * FROM `polldetail`  WHERE poll_id=$other_poll_id";
	$res = mysqli_query($con,$que);
	$rec=mysqli_fetch_array($res);
	
	//echo $rec['question'];
	
	$q3="SELECT * FROM `signup` WHERE emobile='{$rec['emobile']}'";
			$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
			$rowc=mysqli_fetch_assoc($c);

//----------------------POLL DETAIL------------------------------------------->
?>
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?=$rowc['pic'] ?>" class="media-object img-circle custom-border-1" style="width: 4rem">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $rowc['username']?></h4>
                    <p style="font-size: smaller;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($rec['time']);?></p>
                </div>
                <div class="media-right">
                    <a href="#"><span class="pentapoll-icon icon-penta-loc" style="font-size: x-large"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <p class="question"><?=$rec['question'] ?></p>
                <div class="question-image">

					<!----------------------------------GRAPH----------------------------------------------->
					<div class="graph">
					<html>
  <head>
	  
    <!--Load the AJAX API-->
	 

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <div id="chart_div<?= $other_poll_id?>"></div>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['<?= $rec['option1'] ?>', <?= $record['opt1count'] ?>],
          ['<?= $rec['option2'] ?>', <?= $record['opt2count'] ?>],
          ['<?= $rec['option3'] ?>', <?= $record['opt3count'] ?>],
          ['<?= $rec['option4'] ?>', <?= $record['opt4count'] ?>],
          ['<?= $rec['option5'] ?>', <?= $record['opt5count'] ?>]
        ]);

 
	//var chartwidth = $('.question-image').width();
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $other_poll_id ?>'));
        chart.draw(data, options);
        var options = {
  width: 400,
  height: 400,
  title: 'Result',
  colors: ['#008083', '#006766', '#004B4E', '#86B6B6', '#66B1B4']
};

chart.draw(data, options);


      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    
  </body>
</html>
						</div>
                    <img class="img-responsive" src="<?=$rec['poll_pic'] ?>"/>
                </div>
               
               
            </div>
           <a id="share_see_more">see more..</a>
        </div>
        <div class="text-center">
		<a class="custom-button-1" href="index.php">See more polls...</a>
     	</div>
     </div>

	<script>
	graph =1;
	$(".img-responsive").hide();
	$("#share_see_more").click(function(){
	if(graph==1)
	{
	graph=0;
	$(".graph").hide();
	$(".img-responsive").show();
	}
	else if(graph==0)
	{
	graph=1;
	$(".img-responsive").hide();
	$(".graph").show();
	}
	});
	
	</script>
<?php
	unset($_SESSION['share_poll_id']);
}


//========================================Share View Ended======================================
else
{
	?>
		<script type="text/javascript">
	
	$(document).ready(function(){	
		var flag = 0;
		oldflag=0;
		$.get("getdata1.php",{offset:0,limit:10},function(data){
		  $("#main-content").append(data);
				flag +=10;
   	});
		
		
		$(window).scroll(function(){
			if($(window).scrollTop() >= ($(document).height()-$(window).height())/2)
			{
			if(flag==oldflag+10)	
			{
			$.get("getdata1.php",{offset:flag,limit:10},function(data){
		   $("#main-content").append(data);
			});
			 oldflag=flag;
				flag += 10;	
			}
			else {
				flag+=10;
			}
				}		
			});
		});

	</script>
	
	
	<?php
}
	

?>		

<!------------------------------------------------------>	
</body>
</html>
<?php
}
	?>
<?php
include "database.php";
//include 'time.php';
session_start();
$q1="SELECT * FROM `cab_create` WHERE `cab_id` = '{$_GET['cab_id']}' ";
$res1=mysqli_query($con,$q1)OR die(mysqli_error($con));
$record=mysqli_fetch_assoc($res1);
/*$que="SELECT `poll_id` FROM `polldetail` WHERE 
`user_id` = '{$_GET['user_id']}'";
$res = mysqli_query($con,$que);
$polls=mysqli_num_rows($res);*/

$que="SELECT * FROM `cab_list` WHERE 
`cab_id` = '{$_GET['cab_id']}'";
$res = mysqli_query($con,$que);
$members=mysqli_num_rows($res);


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
                
					<?php
					$query1="SELECT * FROM `cab_list` WHERE `cab_id` = '{$_GET['cab_id']}' ";
					$result1=mysqli_query($con,$query1);
					while($record1=mysqli_fetch_assoc($result1)){
						
					$query2="SELECT * FROM `signup` WHERE `user_id` = '{$record1['user_id']}' ";
					$result2=mysqli_query($con,$query2);
					$record2=mysqli_fetch_assoc($result2);
					?>
					
                    <p style="border-bottom: solid teal .1rem;text-align: left;"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<?='<a href="profile.php?user_id='.$record2['user_id'].'">'.$record2['username'].'</a>'?></p>
					<?php
					}
					?>
                    
                 
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
        <div class="custom-profile-pic text-center"><img class="img-circle custom-border-2" src="<?php echo $record['cab_pic']; ?>"  onerror="this.src='images/head.png'" style="width: 8rem; margin-bottom: -4rem;"/></div>
        <div class="panel panel-default text-center custom-panel-css" style="padding-top: 4rem; padding-bottom: .1rem;">
            <div class="panel-heading"><?php echo $record['cab_name']; ?></div>
            <div class="panel-body" style="font-weight: bold;">
				
				<!--<a href="pollmates_list.php?user_id=<?= $record['user_id']?>">
                <div class="col-xs-4 text-center">
                    <span class="glyphicon glyphicon-user"></span>
                    <p style="font-size: 1rem;">Pollmates</p>
					<p style="font-weight: bolder;"><?=$pollmates ?></p>
                </div>
					</a>-->
                <div class="col-xs-4">
                    <span class="glyphicon glyphicon-user"></span>
                    <p style="font-size: 1rem;">Mmbers</p>
                    <p style="font-weight: bolder;"><?= $members?></p>
                </div>
                <div class="col-xs-4">
                    <span class="glyphicon glyphicon-user"></span>
                    <p style="font-size: 1rem;">Followers</p>
                    <p style="font-weight: bolder;">56</p>
                </div>
            </div>
        </div>
		 <a href="cab_pollpanel.php?cab_id=<?= $_GET['cab_id']?>">Create a new poll</a>
    </div>
    
		<!-------------------------------Main Content-------------------------------->
	
	
	
			
			
			
<!------------------------------>
	
	
<?php
//error_reporting(0);
include 'time.php';

	$q="SELECT * FROM `polldetail` WHERE `cab_id`='{$_GET['cab_id']}'";
	$a=mysqli_query($con,$q) OR die(mysqli_error($con));
	while($row=mysqli_fetch_assoc($a)) 
	{
		$que="SELECT * FROM `poller` WHERE emobile='{$_SESSION['emobile']}'  AND poll_id='{$row['poll_id']}'";
		$res=mysqli_query($con,$que) OR die(mysqli_error($con));
		$polled=mysqli_num_rows($res);
		//-----SPOTLISTED OR NOT_____________
		$question="SELECT * FROM `spotlist` WHERE emobile='{$_SESSION['emobile']}'  AND poll_id='{$row['poll_id']}'";
		$result=mysqli_query($con,$question) OR die(mysqli_error($con));
		$spotted=mysqli_num_rows($result);
		//---------------------
		if($polled!=0)
		{
			
			$query="SELECT * FROM `count` WHERE poll_id='{$row['poll_id']}'";
			$result = mysqli_query($con,$query);
			$record=mysqli_fetch_array($result);
			
			$que="SELECT * FROM `polldetail`  WHERE poll_id='{$row['poll_id']}'";
			$res = mysqli_query($con,$que);
			$rec=mysqli_fetch_array($res);
			
			$q3="SELECT * FROM `signup` WHERE `user_id`={$row['user_id'] }";
			$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
			$rowc=mysqli_fetch_assoc($c);
		
			
			?>
			
        
        <div class="panel panel-default">
         <div class="panel-heading">
                <div class="media-left">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                   </div> 
                    <div class="media-body">
                        <h4 class="media-heading"><a href="profile.php?user_id=<?= $rowc['user_id']?>"><?= $rowc['username']?></a></h4>
                        <p style="font-size: small;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($rec['time']);?></p>
                    </div>
                <div class="media-right spot-n-active" id="<?='spotlist'.$row['poll_id'] ?>">
			<span id="spotlist1" class="glyphicon glyphicon-bookmark"></span>
			 </div>
            </div>
            <div class="panel-body">
                <p class="question"><?= $rec['question'] ?></p>
                <div class="question-image" style="max-height:430px;">
                   
					<!----------------------------------------------->
					<?php if($record['totalcount']==0)
					echo "No reaction on this poll.Share with your friends now";
					else
					{
					
					
					?>
					<!--------See more.....----------->
					<a id="see_more<?= $row['poll_id']?>">see more...</a>
					<div id="fullview<?= $row['poll_id']?>"></div>
                                         <a id="see_graph<?= $row['poll_id']?>">see graph...</a>
					<!---------------------------------->
					<html>
  <head>
	  
    <!--Load the AJAX API-->
	 

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <div id="chart_div<?= $row['poll_id']?>"></div>
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

        // Set chart options
	var chartwidth = $('.question-image').width();
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $row['poll_id'] ?>'));

        var options = {
  width: chartwidth,
  height: 400,
  title: 'Result',
  colors: ['#008083', '#006766', '#004B4E', '#86B6B6', '#66B1B4']
};

chart.draw(data, options);


      }
    </script>
  </head>

					
					
					
					
				<?php } ?>	
					
					<!----------------------------------------------------->
					
                </div>
			</div>
			
			
			<!--------comment and share buttons--->
			<div class="panel-footer text-center" style="width:100%;margin:auto;border:none;padding:0px">

			<button class="custom-button-1 col-xs-6 col-sm-3 col-sm-offset-3" onclick="var opt=<?= $row['poll_id']?>;$.post('comment.php',{opt:opt},function(data){
$('<?='#comment'.$row['poll_id']?>').html(data);
});">Comment</button>

			<div class="dropup" style="display:inline">
			<button class="custom-button-1 col-xs-6 col-sm-3" data-toggle="dropdown"  onclick="var opt=<?= $row['poll_id']?>;$.post('share.php',{opt:opt},function(data){
$('#share'+Math.floor(option/10)).html(data);
 });" >Share !t</button>
				<?php
				$poll_id=$row['poll_id'];
				?>
 <ul class="dropdown-menu" style="left:-17rem;">
	 
     <li><a target="_blank" href="http://m.facebook.com/sharer.php?u=pentapoll.com/share.php?poll_id=<?=$poll_id ?>""=" id="facebook">Facebook</a></li>
		
    <li><a target="_blank" href="http://twitter.com/share?url=https://www.pentapoll.com/share.php?poll_id=<?=$poll_id ?>" &text=""  added&via="http://dvdrockers.co&amp;related=http://dvdrockers.co&quot;">Twitter</a></li>
		
		
		
    <li><a href="whatsapp://send?text= Are you ready to poll now?cast your vote on *Pentapoll* and find your mind partners.
                                                                                            *Question:* *<?=$rec['question']?>*

                                                                                            *Options:*

                                                                                            *.*<?=$rec['option1']?>
                                                                                            *.*<?=$rec['option2']?>
                                                                                            *.*<?=$rec['option3']?>
                                                                                            *.*<?=$rec['option4']?>
                                                                                            *.*<?=$rec['option5']?>

                                                                                            *Click here to poll:*https://pentapoll.com/share.php?poll_id=<?=$poll_id ?>" "=" id="whatsapp">Whatsapp</a></li>
                                                                                                 
  </ul>
</div>
 

 
 </div>

<div id="<?= 'comment'.$row['poll_id'] ?>"></div>
<div id="<?= 'share'.$row['poll_id'] ?>"></div>

</div>
        </div>
    
<!---------------------------------------------->		
<script>

$("<?='#see_graph'.$row['poll_id'] ?>").hide();
$("<?='#see_more'.$row['poll_id'] ?>").click(function(){
		see_more=1;
	var poll_id='<?=$row['poll_id']?>';
	$.post("fullview.php",{poll_id:poll_id},function(data){
                   
                 $("<?='#chart_div'.$row['poll_id'] ?>").hide();
                  $("<?='#fullview'.$row['poll_id'] ?>").show();
		 $("<?='#fullview'.$row['poll_id'] ?>").html(data);
                 $("<?='#see_more'.$row['poll_id'] ?>").hide();
		$("<?='#see_graph'.$row['poll_id'] ?>").show();
		 });
	});
$("<?='#see_graph'.$row['poll_id'] ?>").click(function(){
        see_more=0;
        $("<?='#fullview'.$row['poll_id'] ?>").hide();
        $("<?='#see_graph'.$row['poll_id'] ?>").hide();
	$("<?='#chart_div'.$row['poll_id'] ?>").show();
        $("<?='#see_more'.$row['poll_id'] ?>").show();
	});
</script>
<!------------------------------------------------->		
		<?php
			
		}
		else{
		
		$poll_id=$row['poll_id'];
		$poll_creator_id=$row['user_id'];
		$question=$row['question'];
	//if($question!="")
	//{
		$q2="SELECT * FROM `polldetail` WHERE poll_id='{$row['poll_id']}' ";
		$b=mysqli_query($con,$q2) OR die(mysqli_error($con));
		$rowb=mysqli_fetch_assoc($b);
		//echo $rowb['poll_pic'];
	//echo $row['question'];
	
		$q3="SELECT * FROM `signup` WHERE `user_id`={$row['user_id'] }";//change $poll_id to $ user_id after new data feed
		$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
		$rowc=mysqli_fetch_assoc($c);
		?>
	<!--====================================================================================
    =========================================================================================================-->

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?= $rowc['pic'];?>" onerror="this.src='images/head.png'" class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem;">
                </div>
                <div class="media-body">
					<h4 class="media-heading"><a href="profile.php?user_id=<?= $rowc['user_id']?>"><?= $rowc['username'] ?></a></h4>
                    <p style="font-size: small;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($row['time']);?></p>
                </div>
                <!----------------SPOT NOT DISPLAY-------------------->
			
				
                
                <div class="media-right spot-n-active" id="<?='spotlist'.$row['poll_id'] ?>">
			<span id="spotlist1" class="glyphicon glyphicon-bookmark"></span>
                </div>
                <!-------------------------->
            </div>
			<!------------------------------>
			
            <div class="panel-body">
				<input type="hidden" id="poll_id" name="poll_id" value="<?php echo $row['poll_id']?>" /> 
                <p class="question"><?= $row['question']; ?></p>
				<!---------------------------->
				
				<div id="<?='image_option_hide'.$row['poll_id'] ?>">
                <div class="question-image text-center" >
                    <img style="max-height:430px;" class="img-responsive" src = "<?= $row['poll_pic']?>" onerror=""/>
                </div>
					
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
                        <input type="radio" id="poll_option1" name="option" value="1" onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;"><label for="q1op1">&nbsp;<?= $row["option1"]?></label>
                    </div>
					<div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option2" name="option" value="2" onclick="option=<?= $row['poll_id']?>;option=(option*10)+2;"><label for="q1op2">&nbsp;<?= $row['option2']?></label>
                    </div>
					<?php
					if($row['option3']!='')
					{
					?>
					<div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option3" name="option" value="3" onclick="option=<?= $row['poll_id']?>;option=(option*10)+3;"><label for="q1op3">&nbsp;<?= $row['option3']?></label>
                    </div>
					<?php
					}
					?>
		</div>
				
				<?php
					if($row['option4']!='')
					{
					?>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option4" name="option" value="4" onclick="option=<?= $row['poll_id']?>;option=(option*10)+4;"><label for="q1op4">&nbsp;<?= $row['option4']?></label>
                    </div>
					
					<?php
					}
					?>
					
					
					<?php
					if($row['option5']!='')
					{
					?>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option5" name="option" value="5" onclick="option=<?= $row['poll_id']?>;option=(option*10)+5;"><label for="q1op5">&nbsp;<?= $row['option5']?></label>
                    </div>
					
					<?php
					}
					?>
					<br>

                   <div class="panel-footer text-center" style="width:50%;margin:auto;border:none;padding:0px" >
						 <input type="submit" name="poll<?=$poll_id?>" class="custom-button-1" id="<?='poll'.$poll_id?>" class="poll" value="Poll it" onclick="$.get('count3.php',{opt:option},function(data){
							$('#result'+Math.floor(option/10)).html(data);
							 });"/>
                    
					</div>
				</div>
				</div>
									<div id="<?php echo 'result'.$row['poll_id'] ?>"></div>

					<div class="panel-footer text-center" style="width:100%;margin:auto;border:none;padding:0px" id="<?='comment_share'.$row['poll_id'] ?>">

				<button class="custom-button-1 col-xs-6 col-sm-3 col-sm-offset-3" >Comment</button>
<div class="dropup" style="display:inline">
				<button class="custom-button-1 col-xs-6 col-sm-3" data-toggle="dropdown" onclick="var opt=<?= $row['poll_id']?>;$.post('share.php',{opt:opt},function(data){
					$('#share'+Math.floor(option/10)).html(data);
					 });" >Share !t</button>
<ul class="dropdown-menu" style="left:-17rem;">
	 
     <li><a target="_blank" href="http://m.facebook.com/sharer.php?u=pentapoll.com/share.php?poll_id=<?=$poll_id ?>""=" id="facebook">Facebook</a></li>
		
    <li><a target="_blank" href="http://twitter.com/share?url=https://www.pentapoll.com/share.php?poll_id=<?=$poll_id ?>" &text=""  added&via="http://dvdrockers.co&amp;related=http://dvdrockers.co&quot;">Twitter</a></li>
		
		
		
    <li><a href="whatsapp://send?text= Are you ready to poll now?cast your vote on *Pentapoll* and find your mind partners.
                                                                                            *Question:* *<?=$rec['question']?>*

                                                                                            *Options:*

                                                                                            *.*<?=$rec['option1']?>
                                                                                            *.*<?=$rec['option2']?>
                                                                                            *.*<?=$rec['option3']?>
                                                                                            *.*<?=$rec['option4']?>
                                                                                            *.*<?=$rec['option5']?>

                                                                                            *Click here to poll:*https://pentapoll.com/share.php?poll_id=<?=$poll_id ?>" "=" id="whatsapp">Whatsapp</a></li>
                                                                                                 
  </ul>



</div>

							<div id="<?= 'comment'.$row['poll_id'] ?>"></div>
							<div id="<?= 'share'.$row['poll_id'] ?>"></div>
							</div>

							



			</div>
				
				<!---alert(Math.floor(option/10));--->
			
        </div>










<!-------------------HIDING IMAGES------------------------->

<script>
	$("<?='#comment_share'.$row['poll_id'] ?>").hide();
	$("<?='#poll'.$poll_id?>").click(function(){
		
			$("<?='#image_option_hide'.$row['poll_id'] ?>").hide();
				$("<?='#comment_share'.$row['poll_id'] ?>").show();
	}); 
	
</script>
<!--===================================================================================-->
	<?php
		}
		//---------------------SPOTLISTING-----------------	
		?>
		<script>
		var spotted=<?=	$spotted ?>;
		if(spotted!=0){
			$("<?='#spotlist'.$row['poll_id'] ?>").css("color", "#004C4C");
                    
			$("<?='#spotlist'.$row['poll_id'] ?>").click(function(){
		var poll_id="<?=$row['poll_id'] ?>";
		$.post("spot_.php",{poll_id:poll_id},function(data){
			$("<?='#spot'.$row['poll_id'] ?>").hide();
		$("<?='#spotlist'.$row['poll_id'] ?>").css("color", "#85B6B5");
                $("<?='#spotlist'.$row['poll_id'] ?>").removeClass("spot-n-active");
	 });
	});
		}
			else{
$("<?='#spotlist'.$row['poll_id'] ?>").click(function(){
		var poll_id="<?=$row['poll_id'] ?>";
		$.post("spot.php",{poll_id:poll_id},function(data){
			$("#spot_write").html(data);
			//$("#spot_write").show();
		$("<?='#spotlist'.$row['poll_id'] ?>").css("color", "#004C4C");
                $("<?='#spotlist'.$row['poll_id'] ?>").removeClass("spot-n-active");

	 });
		
		
	});
	
			}
	
</script>
<?php
	}
	

?>		


</div>

 </body>

 </html>


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
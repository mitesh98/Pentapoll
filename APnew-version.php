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
$query="SELECT * FROM signup WHERE 
emobile='{$_SESSION['emobile']}'";
$result = mysqli_query($con,$query);
$record=mysqli_fetch_array($result);
$_SESSION["profile_pic"]=$record['pic'];

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="APnew-version.css">
		<script type="text/javascript" src="jquery.js"></script>

</head>
<body>
<!--navbar-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid row">

        <div class="navbar-header col-lg-2 col-md-2 col-md-push-5 col-xs-12 text-center" style="padding:0">
            <button type="button" id="sidebarCollapse1" class="btn btn-info navbar-btn col-xs-2 text-left" style="padding:0;background-color:transparent;border: none;font-size:x-large;">
                <i class="glyphicon glyphicon-user"></i>
            </button>
            <a class="navbar-brand col-xs-8" href="index.php"><img id="logo" src="images/a.png"> </a>
            <button type="button" id="notification-m" class="btn btn-info navbar-btn col-xs-1 dropdown-toggle" data-toggle="dropdown" style="padding:0;background-color:transparent;border: none;font-size:x-large;padding-top:.3rem;" >
                <i class="glyphicon glyphicon-bell"></i>
            </button>
            <ul class="dropdown-menu notifications-list-m">               
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
                    <li class="custom-mobile"><a href="pollpanel.php"><span class="glyphicon glyphicon-globe"></span> Pollpanel</a></li>
                    <li class="active custom-mobile"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Accounts</a></li>
                </ul>
                <ul class="nav navbar-nav custom-mobile custom-display-hide-1">
                    <li class="active custom-mobile"><a href="feedback.php">Feedback</a></li>
                    <li class="custom-mobile"><a href="help.php">Help Centre</a></li>
                    <li class="custom-mobile"><a href="About.html">About</a></li>
                    <li class="custom-mobile"><a href="privacy.html">Privacy</a></li>
                    <li class="custom-mobile"><a href="terms.html">Terms</a></li>
                    <li class="custom-mobile"><a id="mobile_logout">Logout</a></li>
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
                             <li><a href="#">Welcome to Pentapoll!</a></li>
                        </ul>

                    </li>
                    <li class="dropdown custom-mobile">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-option-vertical"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="feedback.php">Feedback</a></li>
                            <li><a href="help.php">Help Centre</a></li>
                            <li><a id="desktop_logout">Logout</a></li>
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



<!--mobile version-->


<!--account section-->


<div class="whole-wrapper" id="main-content">


    <div class="account-edit item-fixed-2 " id="pollview-leftside" style="margin-top: 7em" >
        <div class="user-image custom-profile-pic text-center"><img class="img-circle custom-border-2" src="<?= $record['pic']?>" onerror="this.src='images/head.png'"style="width: 8rem;height: 8rem; margin-bottom: -4rem;margin-top: -8em"/></div>
        <div  style="padding-top: 4rem; padding-bottom: .1rem;">
            <div   style=" border-bottom: 1px solid lightgrey; padding-bottom: 0px;margin-top: 1em;"><?=$record['username'] ?><span class="glyphicon glyphicon-pencil" style="float: right;margin-right: 2em"></span> </div>
            <p  style="border-bottom: 1px solid lightgrey;padding-top: 1em"> <i class="fa fa-birthday-cake" style="font-size:21px;float: left;margin: -3px 3px"></i>
                <?= $record['bday']?> <span class="glyphicon glyphicon-pencil" style="float: right;margin-right: 2em "></span></p>

            <p style="font-size: small;font-weight: lighter; "><?=$record['emobile'] ?></p>


           
            <p style="margin-bottom: 4em;border-bottom: 1px solid lightgrey;margin-left: 1em"><a href="change_password.html"> change Password</a></p>
			
			
			
			<div style="display:none">
				<form method="post" action="login.php">
            <input type="submit" name="logout_btn" id="logout_btn">
					</form>
				</div>
        </div>
    </div>




<!--pollview section-->
<div class=" poll-view-section  active" id="pollview-middle">
<p>POLL VIEW</p>
<div class="grid-image" >
	
		<?php
$query="SELECT `user_id` FROM `signup` WHERE emobile='{$_SESSION["emobile"]}'";
		$result = mysqli_query($con,$query);
		$record=mysqli_fetch_array($result);
		$_SESSION['user_id'] =$record['user_id'];
		echo $record['user_id'];												 
//----------------------------------
$q="SELECT * FROM `count` WHERE emobile='{$_SESSION["emobile"]}'";
$a=mysqli_query($con,$q) OR die(mysqli_error($con));
while($row=mysqli_fetch_assoc($a)) 
	{
		//$poll_id=$row['poll_id'];
		//===============================
		$q="SELECT * FROM `polldetail` WHERE poll_id={$row['poll_id']}";
		$b=mysqli_query($con,$q) OR die(mysqli_error($con));
		$rowpolldetail=mysqli_fetch_assoc($b) OR die(mysqli_error($con)) ;
		//$question=$row['question'];
		
		//-====================================
		?>

    <div class="each-part">

        
        <!---=========================================-->
	
		
		<html>
  <head>
	  <div id="chart_div<?= $row['poll_id'] ?>"></div>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
          ['<?=$rowpolldetail['option1'] ?>', <?= $row['opt1count'] ?>],
          ['<?= $rowpolldetail['option2']  ?>', <?= $row['opt2count'] ?>],
          ['<?= $rowpolldetail['option3']  ?>', <?= $row['opt3count'] ?>],
          ['<?= $rowpolldetail['option4']  ?>', <?= $row['opt4count'] ?>],
          ['<?= $rowpolldetail['option5']  ?>', <?= $row['opt5count'] ?>]
        ]);

        // Set chart options
var chartwidth = $('.each-part').width();

        // Instantiate and draw our chart, passing in some options.
		  //var chart_width=$('.each-part').width();
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $row['poll_id'] ?>'));
        chart.draw(data, options);
        var options = {
  width: chartwidth,
  height: 200,
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
		

<?php	
			
}
?>
		<!-------------------------------------------------->
        <p> Poll Tag</p>
    </div>



</div>
</div>


<!--polling list part starts here-->


<div class="poll-list item-fixed-1  "  id="pollview-rightside" style="margin-top: 7em">
    <h4 >Polling List </h4>
    <ol>

        	<?php
	$q="SELECT * FROM `poller` WHERE emobile='{$_SESSION["emobile"]}'";
$a=mysqli_query($con,$q) OR die(mysqli_error($con));
while($row=mysqli_fetch_assoc($a)) 
	{
	/*$que="SELECT `question` FROM `polldetail` WHERE emobile='{$row['poll_id']}'";
	$b=mysqli_query($con,$q) OR die(mysqli_error($con));
	$row_qustion=mysqli_fetch_assoc($b);*/
	if($row['question']!='')
	{
	echo '<li>'.$row['question'].'</li>';
	}
}
	?>
			
        
    </ol>
</div>
</div>

<script>
    $(document).ready(function(){
        $('#sidebarCollapse1').on('click', function () {
            $("#pollview-middle").removeClass
        });
    });

</script>
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
<?php
}
?>
<script>
$("#mobile_logout").click(function(){
	$("#logout_btn").click();
});
$("#desktop_logout").click(function(){
	$("#logout_btn").click();
});
</script>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

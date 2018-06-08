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
<!---------------------navbar------------------------->

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
                <div class="col-xs-6 col-lg-6">Polled<br><?=$polled?></div>
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
		
		<!--------------------------PROFILE PIC------------------->
        <div class="user-image custom-profile-pic text-center" id="image_display"><img class="img-circle custom-border-2" src="<?= $record['pic']?>" onerror="this.src='images/head.png'"style="width: 8rem;height: 8rem; margin-bottom: -4rem;margin-top: -8em"/></div>
		<div id="echo_pic"> <img src="#" id="blah" style="width: 8rem;height: 8rem; margin-bottom: -4rem;"></div>
			<input type='file' id="edit_profile_image" accept="images" name="edit_profile_image" style="display:none">
		<!--------------------------------------->
        <div  style="padding-top: 4rem; padding-bottom: .1rem;">
			<!--------USER NAME--------->
            <div   style=" border-bottom: 1px solid lightgrey; padding-bottom: 0px;margin-top: 1em;" id="username"><?=$record['username'] ?><span class="glyphicon glyphicon-pencil" style="float: right;margin-right: 2em"></span> </div>
			<div id="new_username">
			<input type="text" value="<?=$record['username'] ?>" id="editted_username" name="new_username" >
			</div>
			
			<!--------------BDAY---------------->
            <p  style="border-bottom: 1px solid lightgrey;padding-top:0px ;margin-top:2em;"> <i class="fa fa-birthday-cake" style="font-size:21px;float: left;margin: -21px 0px"></i>
               <div id="bday"> <?= $record['bday']?></div> <span class="glyphicon glyphicon-pencil" style="float: right;margin-right: 2em ;margin-top:-3.3em"></span>
		<div id="new_bday">
		
		<input type="date" value="<?=$record['bday'] ?>" id="editted_bday" name="editted_bday" >
		</div></p>
			<!-------------------------------------->
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
<div class="grid-image">
<div id="polled_view"></div>
</div>	
<div class="grid-image parent" >
	
		<?php
$query="SELECT `user_id` FROM `signup` WHERE emobile='{$_SESSION["emobile"]}'";
		$result = mysqli_query($con,$query);
		$record=mysqli_fetch_array($result);
		$_SESSION['user_id'] =$record['user_id'];
														 
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

    <div class="each-part" >
 
		<div id="show_poll<?=$row['poll_id']?>">
          <div data-toggle="modal" data-target="#myModal" class="trash-icon" style="text-align:right;padding:2em"> <span class="glyphicon glyphicon-trash"></span></div>    
           <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" style="background-color:transparent;margin-top:40vh">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body">
                    <p>Are you sure that you want to delete this?</p>
					<div class="container"></div>
         <div class="modal-footer">
                    <a >  <button  id="delete<?=$row['poll_id'] ?>" class="custom-button-1" type="button"  data-dismiss="modal"> Yes</button></a>
			 <a href="#">  <button  class="custom-button-1" type="button" data-dismiss="modal">No</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<style>
.custom-button-1{
        background-color: #007f80;
        color: white;
        border: none;
        border-radius: 2rem;
        font-size: large;
        padding: 0 3rem;
        margin-bottom: 1rem;
    }
</style>
 <!---=========================================-->
	<html>
		<head>
	  <div id="chart_div<?= $row['poll_id'] ?>"></div>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
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
var chartwidth = $('.each-part').width();
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
   </body>
</html>
<p><?=$rowpolldetail['question'] ?></p>	
<div style="border-bottom:.6px solid teal;padding:2em 2em;width:20em;margin:0 auto"></div>
	</div>
	<!--------Delete POll-------------->
		<script>
$("<?='#delete'.$row['poll_id']?>").click(function(){
	
	var poll_id='<?= $row['poll_id']?>';
	$.post("delete_poll.php",{poll_id:poll_id},function(data){
		//alert(poll_id);
	$("<?='#show_poll'.$row['poll_id']?>").hide();	
	});
});

</script>
		
		<?php
}
?>
		<!-------------------------------------------------->
        
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
	echo '<div id="show_polled'.$row['poll_id'].'"><li>'.$row['question'].'</li></div>';
	}
	?>
		<script>
		$("#show_polled<?=$row['poll_id'] ?>").click(function(){
			$(".parent").hide();
			var poll_id='<?=$row['poll_id'] ?>';
			$.post("account_see_polled.php",{poll_id:poll_id},function(data){
				$("#polled_view").show();
		 $("#polled_view").html(data);
		 });
		});
		</script>
		<?php
	
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
		
		
<script>
	$("#echo_pic").hide();
	$("#new_username").hide();
	$("#new_bday").hide();
	
	//--------------BDAY EDIT-------------------------------
$("#bday").dblclick(function(){
	$("#bday").hide();
	$("#new_bday").show();
	$("#new_bday").focusout(function(){
		//alert("hii");	
			var new_bday=$("#editted_bday").val();
			$.post("account_bday_edit.php",{new_bday:new_bday},function(data){
			$("#new_bday").hide();	
			$("#bday").html(data);
			});
	  		//$("#bday_edit").hide();
			$("#bday").show();
		});	
	
});


//-------------------------------USERNAME EDIT-------------

$("#username").dblclick(function(){
	$("#username").hide();
	$("#new_username").show();
	
	
	$("#new_username").focusout(function(){
		//alert("hii");	
			var new_username=$("#editted_username").val();
			$.post("account_username_edit.php",{new_username:new_username},function(data){
				alert(new_username);
			$("#username").html(data);
			});
	  		$("#new_username").hide();
			$("#username").show();
	
	});
	
	
});
	
$("#image").click(function(){
	alert("bday");
});


</script>		
		
	<!----------------------EDIT PROFILE PIC-------------------------->
	
	<script>
$(document).ready(function(){
 $(document).on('change', '#edit_profile_image', function(){
  var name = document.getElementById("edit_profile_image").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("edit_profile_image").files[0]);
  var f = document.getElementById("edit_profile_image").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("edit_profile_image", document.getElementById('edit_profile_image').files[0]);
	
   $.ajax({
    url:"account_profile_pic_edit.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,  
    success:function(data)
    {
		$("#image_display").hide();
		 $("#image_display").load();
		
    }
   });
  }
 });
});
</script>
	
	
	<!--------------------------------IMAGE PREVIEW---------->
	<script>
	function readURL(input){
	if(input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
		$("#echo_pic").show();
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
   }
   }

   $("#edit_profile_image").change(function() {
   readURL(this);
   });
	
	</script>
	
	<script>
	$("#image_display").click(function(){
	$("#edit_profile_image").click();	
	});
	</script>

		
	
		
		
		
		
		
		
		
		
		
		
		

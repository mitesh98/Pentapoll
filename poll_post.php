<script type="text/javascript" src="jquery.js"></script>

<?php
session_start();
error_reporting(0);
$isTouch = isset($_SESSION['emobile']);
if(!$isTouch)
{
	header('Location: signup.php');
}
else 
{
include 'database.php';
$poll_id=$_POST['poll_id'];
//-------------------------------------------

	?>
	<div class="dropup" style="display:inline">
	<button class="custom-button-1 col-xs-6 col-sm-3" data-toggle="dropdown">Share !t</button>
 	<ul class="dropdown-menu" style="left:-17rem;">
    <li><a target="_blank" href="http://m.facebook.com/sharer.php?u=pentapoll.com/share.php?poll_id=<?=$poll_id ?>""=" id="facebook">Facebook</a></li>
		
    <li><a target="_blank" href="http://twitter.com/share?url=https://www.pentapoll.com/share.php?poll_id=<?=$poll_id ?>" &text=""  added&via="http://dvdrockers.co&amp;related=http://dvdrockers.co&quot;">Twitter</a></li>
		
		
		
    <li><a href="whatsapp://send?text=<?=$_POST['question']?><?=$_POST['option1']?><?=$_POST['option2']?><?=$_POST['option3']?><?=$_POST['option4']?><?=$_POST['option5']?>;pentapoll.com/share.php?poll_id=<?=$poll_id ?>" "=" id="whatsapp">Whatsapp</a></li>
  	</ul>
	</div>
	<a href="index.php"><button class="custom-button-1 col-xs-6 col-sm-3">Home</button></a>';
	<div id="share"></div>
<?php	
date_default_timezone_set('Asia/Kolkata');
$poll_date=date("ymd");
$poll_time=time();
	


//-------------------------------------------------------------
	$q="insert into polldetail
	(poll_id,user_id,emobile,date,time,tag,question,option1,option2,option3,option4,option5,poll_pic)
	values
	({$_POST['poll_id']},
	{$_SESSION["user_id"]},
	'{$_SESSION['emobile']}',
	'$poll_date','$poll_time',
	'{$_POST["tag"]}',
	'{$_POST["question"]}',
	'{$_POST["option1"]}',
	'{$_POST["option2"]}',
	'{$_POST["option3"]}',
	'{$_POST["option4"]}',
	'{$_POST["option5"]}',
	'{$_POST['file_to_saved']}')";
mysqli_query($con,$q);// or die(mysqli_error($con));
			
//-----------------------------------------------------------


$q="INSERT INTO `count`(poll_id,user_id,emobile,question,tag,state,country)
values(
{$_POST['poll_id']},
{$_SESSION["user_id"]},
'{$_SESSION['emobile']}',
'{$_POST["question"]}',
'{$_POST["tag"]}',
'{$_SESSION['state']}',
'{$_SESSION['country']}' )";
mysqli_query($con,$q);// or die(mysqli_error($con));

$q="INSERT INTO `poller`(poll_id,emobile,question)
values({$_POST['poll_id']},
'{$_SESSION['emobile']}','{$_POST["question"]}')";
mysqli_query($con,$q) ;//or die(mysqli_error($con));

$q="INSERT INTO `notification`(poll_id,emobile,question)
values({$_POST['poll_id']},
'{$_SESSION['emobile']}','{$_POST["question"]}')";
mysqli_query($con,$q) ;//or die(mysqli_error($con));

//---------------------------------------------

	
	
$_SESSION['POLL_POST']=1;
	
?>
<!----------------------------------------------->
<script>
$("#facebook").click(function(){
	
	alert('hii');
	var poll_id=<?=$_POST['poll_id'] ?>;
	$.post("share.php?poll_id=<?=$_POST['poll_id'] ?>",function(data){
		 $("#share").html(data);
	
	});
	
});
	
	
	
	
	
$("#twitter").click(function(){
	alert('hii');
});
	$("#whatsapp").click(function(){
	alert('hii');
});
</script>


<!------------------------------------>
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=241923952952099';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!--------------------------------->


<?php
	
}
?>








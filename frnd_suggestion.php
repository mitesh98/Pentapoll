<html>
<script type="text/javascript" src="jquery.js"></script>
</html>

<?php
include "database.php";
session_start();
$q1="SELECT * FROM `signup` WHERE emobile = '{$_SESSION['emobile']}' ";
$res1=mysqli_query($con,$q1)OR die(mysqli_error($con));
$record=mysqli_fetch_assoc($res1);
if($record['state']=='')
{
echo '<a href="">Add State For Good Pollmates Suggestion</a><br>';
}
$offset=rand(0,200);
$q2="SELECT * FROM `signup` WHERE emobile != '{$_SESSION['emobile']}' LIMIT 50 OFFSET $offset";
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
	
echo '<h2>
<a href="profile.php?user_id='.$rec2['user_id'].'">'.$rec2['username'].'</a> 
<div id = "send_request_btn'.$rec2['user_id'].'"><div>
<button id="add_pollmates_btn'.$rec2['user_id'].'">+Add pollmate</button>
</div>
<br>
</h2>';
	}
?>

<script>
$("<?= '#add_pollmates_btn'.$rec2['user_id']?>").click(function(){
	var user_id='<?= $rec2['user_id']?>';
	$.post("request_send.php",{user_id:user_id},function(data){
		$("#add_pollmates_btn<?= $rec2['user_id'] ?>").hide();
		 $("#send_request_btn<?= $rec2['user_id'] ?>").html(data);
		 });
	
})
</script>
<?php
}
	

?>
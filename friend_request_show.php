<html>
<script type="text/javascript" src="jquery.js"></script>
</html>
<?php
include "database.php";
session_start();
$q1="SELECT * FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res1=mysqli_query($con,$q1);
$rec1=mysqli_fetch_assoc($res1);
$q2="SELECT * FROM `friend_request` WHERE `to_user_id`='{$rec1['user_id']}'";
$res2=mysqli_query($con,$q2);
$x=mysqli_num_rows($res2);
while($rec2=mysqli_fetch_assoc($res2))
{
if( $x>0 && $rec2['accept']==0)
{
$q3="SELECT * FROM `signup` WHERE `user_id`='{$rec2['from_user_id']}'";
$res3=mysqli_query($con,$q3);
$rec3=mysqli_fetch_assoc($res3);
	
echo '<h2>'.$rec3['username'].'</h2><br>
<button id="accept'.$rec2['from_user_id'].'">Accept</button>
<button id="reject'.$rec2['from_user_id'].'">Not Now</button>
<div id="accepted'.$rec2['from_user_id'].'"></div>';
	?>

<script>
$("#accept<?= $rec2['from_user_id']?>").click(function(){

	var from_user_id='<?= $rec2['from_user_id']?>';
	
	$.post("friend_accept.php",{from_user_id:from_user_id},function(data){
		$("#accept<?= $rec2['from_user_id'] ?>").hide();
		$("#reject<?= $rec2['from_user_id'] ?>").hide();
		 $("#accepted<?= $rec2['from_user_id'] ?>").html(data);
		 });
	});
	
	
$("#reject<?= $rec2['from_user_id']?>").click(function(){
var from_user_id='<?= $rec2['from_user_id']?>';
	$.post("friend_reject.php",{from_user_id:from_user_id},function(data){
		$("#accept<?= $rec2['from_user_id'] ?>").hide();
		$("#reject<?= $rec2['from_user_id'] ?>").hide();
		 $("#accepted<?= $rec2['from_user_id'] ?>").html(data);
		 });
});

</script>
<?php
}
	
}

?>
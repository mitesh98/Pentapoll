<?php
include "database.php";
session_start();

$q1="SELECT `user_id` FROM `signup` WHERE `emobile`='{$_SESSION['emobile']}'";
$res=mysqli_query($con,$q1);
$rec=mysqli_fetch_assoc($res);
?>
<html>
	<script type="text/javascript" src="jquery.js"></script>
<form action="cab_success.php" method="post" enctype="multipart/form-data">
	
	<input type='file' id="poll_image" accept="images" name="cab_pic" style="display:none">
	 <div id="poll_pic_upload" class="custom-image col-md-12 text-center"> <p style="margin-top:10.5rem;">click here to upload image</p>
		 <img  class="img-responsive custom-poll-image"  id="blah"></div>
	
	Cab Name:<input type="text"  name="cab_name" required><br>
<?php
$que1="SELECT * FROM `pollmates` WHERE `first_user_id`='{$rec['user_id']}' OR `second_user_id`='{$rec['user_id']}' ";
$res1=mysqli_query($con,$que1);
while($rec1=mysqli_fetch_assoc($res1))
{
	?>
	
	<?php
	if($rec1['first_user_id']!=$rec['user_id'])
	{
		$que2="SELECT * FROM `signup` WHERE `user_id`='{$rec1['first_user_id']}'";
		$res2=mysqli_query($con,$que2);
		$rec2=mysqli_fetch_assoc($res2);
		?>
		<input type="checkbox" name="cab_list[]" value="<?= $rec2['user_id'] ?>">
	<?php
		echo '
		
		<a href="profile.php?user_id='. $rec2['user_id'].'"><h2>'.$rec2['username'].'</h2><br>';
	}
	else if($rec1['second_user_id']!=$rec['user_id'])
	{
		$que2="SELECT * FROM `signup` WHERE `user_id`='{$rec1['second_user_id']}'";
		$res2=mysqli_query($con,$que2);
		$rec2=mysqli_fetch_assoc($res2);
		?>
		<input type="checkbox" name="cab_list[]" value="<?= $rec2['user_id'] ?>">
	<?php
		echo '<a href="profile.php?user_id='. $rec2['user_id'].'"><h2>'.$rec2['username'].'</h2><br>';
	}
	?>
	<br>
	
	<?php
}


?>
	<input type="submit" name="new_cab_btn" value="create">
	</form>
	
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













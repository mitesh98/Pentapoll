<?php
include 'database.php';
?>
<script type="text/javascript" src="jquery.js"></script>

<?php
if($_POST['password']==$_POST['text'])
	{
	 echo'<div id="set_password">
	New Password:<input type="password" name="new_password" id="new_password" placeholder="Enter new password" required>
	<div id="new_password_error"></div>
	Confirm Password:<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
	<input type="submit" id="forget" name="forget" value="set password">
	</div>
	<div id="confirm_password_error"></div>'
		 ;

?>
<script>
	var email='<?= $_POST['email']?>';
	$("#forget").click(function(){
	var newpassword=$("#new_password").val();	
	var confirm_password=$("#confirm_password").val();	
		$.post("forgot_password_update.php",{newpassword:newpassword,confirm_password:confirm_password,email:email},function(data){
		$("#confirm_password_error").html(data);
	 });
});


</script>

<?php
	
	}
else
echo "The text u entered is not Correct";
?>








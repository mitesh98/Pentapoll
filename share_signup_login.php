<html>
<?php
	$poll_id=$_POST['poll_id'];
echo "You have not registered     ";
	?>
	
<a href="signup.php?poll_id=<?=$poll_id ?>"> Signup Now !!</a>
	
<a href="login.php?poll_id=<?=$poll_id ?>" > Login</a>
	<?php
echo "<br><br>Or you have not been login     ";
	?>
	<?php
echo "<br><br>Then Come to this page and try again";
	?>
	</html>

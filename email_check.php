<?php
//error_reporting(0);
session_start();
include 'database.php';

//echo $_POST['email'];
?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="jquery.js"></script>
<!--	
//if($_POST['username_error_value']=true)
//	echo "error";
//echo "h -->
</html>



	<?php
$query="SELECT * FROM signup WHERE emobile='{$_POST['email']}' "; 
$result = mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
$record=mysqli_fetch_array($result);
if($rowcount>=1)
{
echo "Email id already registered";
	?>
	<script>
	//$('#signup').prop('disabled',true);
		//alert(1);
</script>
<?php
}
else
{
	echo "";
	?>
	<script>
	//$('#signup').prop('disabled',false);
		</sript>
<?php
}


//echo $_SESSION['flag'];
?>


